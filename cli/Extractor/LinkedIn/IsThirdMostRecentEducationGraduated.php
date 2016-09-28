<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\LinkedIn;

use Cli\Extractor\AbstractExtractor;

class IsThirdMostRecentEducationGraduated extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->rawBuffer['profile'];

        if (empty($profile['educations']) || empty($profile['educations']['values'])) {
            return;
        }

        $education = (array) $this->rawBuffer['_education'];

        if (empty($education[2]) || empty($education[2]['end_year'])) {
            return;
        }

        return $education[2]['end_year'] < date('Y');
    }
}
