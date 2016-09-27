<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumOfFriendsWorkingAtSecondMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        $friends = $this->worker->rawBuffer->getData('friends');

        if (empty($profile['education']) || empty($friends)) {
            return 0;
        }

        $_education = $this->worker->rawBuffer->waitData('_education');

        if (empty($_education[1]['id'])) {
            return 0;
        }

        $_friends = $this->worker->rawBuffer->waitData('_friends');
        $return   = 0;
        foreach ($friends as $friend) {
            if (empty($friend['work'])) {
                continue;
            }

            foreach ($friend['work'] as $work) {
                if (isset($work['employer']['id']) && $work['employer']['id'] === $_education[1]['id']) {
                    $return++;
                    break;
                }
            }
        }

        return $return;
    }
}