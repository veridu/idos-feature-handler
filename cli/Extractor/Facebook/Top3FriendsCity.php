<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class Top3FriendsCity extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $distribution = $this->worker->rawBuffer->waitData('_locationDistribution');

        if (empty($distribution['city'])) {
            return;
        }

        $cities = array_keys($distribution['city']);

        if (empty($cities[2])) {
            return;
        }

        return $cities[2];
    }
}
