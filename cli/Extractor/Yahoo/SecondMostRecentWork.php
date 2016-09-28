<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Yahoo;

use Cli\Extractor\AbstractExtractor;

class SecondMostRecentWork extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $work = $this->rawBuffer->waitData('_work');

        if (empty($work[1]['name'])) {
            return;
        }

        return $work[1]['name'];
    }
}
