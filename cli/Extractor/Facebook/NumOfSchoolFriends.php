<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfSchoolFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        $friends = $this->worker->rawBuffer->getData('friends');

        if (empty($profile['education']) || empty($friends)) {
            return 0;
        }

        $educations = [];
        foreach ($profile['education'] as $education) {
            if (isset($education['school']['id'], $education['type']) && $education['type'] === 'High School') {
                $educations[] = $education['school']['id'];
            }
        }

        $_friends = $this->worker->rawBuffer->waitData('_friends');
        $return   = 0;
        foreach ($_friends as $friend) {
            if (empty($friend['education'])) {
                continue;
            }

            foreach ($friend['education'] as $education) {
                if (isset($education['school']['id']) && in_array($education['school']['id'], $educations)) {
                    $return++;
                }
            }
        }

        return $return;
    }
}