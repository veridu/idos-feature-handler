<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Spotify;

use Cli\Extractor\AbstractExtractor;

class NumTracksPublicPlaylists extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $playlists = $this->worker->rawBuffer->waitData('_playlists');

        $return = 0;
        foreach ($playlists as $playlist) {
            if ($playlist['public']) {
                $return += $playlist['total_tracks'];
            }
        }

        return $return;
    }
}