<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Personal;

use Cli\Extractor\AbstractExtractor;

class IsFantasyName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->parsedBuffer->waitData('fullName');

        if (empty($fullName)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->isFantasyName($fullName);
        return;
    }
}
