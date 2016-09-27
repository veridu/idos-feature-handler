<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class NumOwnedPlaylists extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $playlists = $this->worker->rawBuffer->waitData('_ownedPlaylists');

        if (empty($playlists)) {
            return 0;
        }

        return count($playlists);
    }
}