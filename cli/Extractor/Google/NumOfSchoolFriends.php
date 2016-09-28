<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Google;

use Cli\Extractor\AbstractExtractor;

class NumOfSchoolFriends extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $plus    = $this->rawBuffer->getData('plus');
        $circles = $this->rawBuffer->getData('circles');

        if (empty($plus['organizations']) || empty($circles)) {
            return 0;
        }

        $educations = [];
        $colleagues = [];
        foreach ($plus['organizations'] as $organization) {
            if ($organization['type'] === 'school' && ! empty($organization['name'])) {
                $educations[] = $organization['name'];
            }
        }

        $_circles = $this->rawBuffer->waitData('_circles');
        foreach ($_circles as $circle) {
            if (empty($circle['organizations'])) {
                continue;
            }

            foreach ($circle['organizations'] as $organization) {
                if ($organization['type'] === 'school' && ! empty($organization['name']) && in_array($organization['name'], $educations)) {
                    $colleagues[$circle['id']] = true;
                }
            }
        }

        return count($colleagues);
    }
}
