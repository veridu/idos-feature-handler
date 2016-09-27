<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\OAuth\Personal;

class PhoneCountryCode extends \Thread {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $phone = $this->worker->rawBuffer->getData('phone');

        if (empty($phone)) {
            return;
        }

        //@FIXME
        //return Utils::getInstance()->phoneCountryCode($phone);
    }
}
