<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Amazon;

use Cli\Extractor\AbstractExtractor;

class FirstNameInitial extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $fullName = $this->parsedBuffer->waitData('fullName');

        if ($fullName === null) {
            return;
        }

        return $this->worker->nameParser->firstNameInitial($fullName);
    }
}
