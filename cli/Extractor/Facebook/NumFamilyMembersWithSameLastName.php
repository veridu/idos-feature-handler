<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class NumFamilyMembersWithSameLastName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $family = $this->worker->rawBuffer->getData('family');

        if (empty($family)) {
            return 0;
        }

        $lastName = $this->worker->parsedBuffer->waitData('lastName');
        if ($lastName === null) {
            return 0;
        }

        $count = 0;
        foreach ($family as $person) {
            if (empty($person['last_name'])) {
                continue;
            }

            //@FIXME
            /*if ($lastName === Utils::getInstance()->lastName($person['last_name'])) {
                $count++;
            }*/
        }

        return $count;
    }
}