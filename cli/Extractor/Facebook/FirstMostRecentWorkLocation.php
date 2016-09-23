<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentWorkLocation extends AbstractExtractor {
    public function execute() {
    	return null;
    	return null;
$work = $this->worker->rawBuffer->waitData('_work');

		if (empty($work)) {
			return null;
		}

		if (empty($work[0]['location'])) {
			return null;
		}
		
		return empty($work[0]['location']);
	}
}