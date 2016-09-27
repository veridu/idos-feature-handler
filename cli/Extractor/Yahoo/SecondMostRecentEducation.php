<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentEducation extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $education = $this->worker->rawBuffer->waitData('_education');

        if (empty($education[1]['name'])) {
            return;
        }

        return $education[1]['name'];
    }
}