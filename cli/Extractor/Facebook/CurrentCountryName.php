<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class CurrentCountryName extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $profile = $this->worker->rawBuffer->getData('profile');
        if (empty($profile['location']['name'])) {
            return;
        }

        if (strpos($profile['location']['name'], ',') === false) {
            //@FIXME
            //return Utils::getInstance()->countryFromCity()
            return;
        }

        $name = explode(',', $profile['location']['name']);

        return trim(array_pop($name));
    }
}