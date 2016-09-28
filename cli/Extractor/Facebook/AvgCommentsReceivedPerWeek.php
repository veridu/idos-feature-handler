<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class AvgCommentsReceivedPerWeek extends AbstractExtractor {
    /**
     * {@inheritdoc}
     */
    public function execute() {
        $comments = [];
        foreach (['links', 'photos', 'posts', 'statuses', 'tagged'] as $property) {
            if (! isset($this->rawBuffer[$property])) {
                continue;
            }

            $data = $this->rawBuffer[$property];
            if (empty($data)) {
                continue;
            }

            foreach ($data as $item) {
                if (empty($item['comments']['data'])) {
                    continue;
                }

                if (empty($item['created_time'])) {
                    $ts = strtotime($item['updated_time']);
                } else {
                    $ts = strtotime($item['created_time']);
                }

                if ($ts === false) {
                    continue;
                }

                if (! isset($comments[date('Y', $ts)])) {
                    $comments[date('Y', $ts)] = [];
                }

                if (! isset($comments[date('Y', $ts)][date('n', $ts)])) {
                    $comments[date('Y', $ts)][date('n', $ts)] = 0;
                }

                $comments[date('Y', $ts)][date('n', $ts)] += count($item['comments']['data']);
            }
        }

        $current = [
            'year'  => date('Y'),
            'month' => date('n')
        ];

        foreach ($comments as $year => &$months) {
            for ($i = 1; $i < 13; $i++) {
                if (($year == $current['year']) && ($i > $current['month'])) {
                    break;
                }

                if (isset($months[$i])) {
                    $months[$i] = round($months[$i] / 4, 2);
                } else {
                    $months[$i] = 0;
                }
            }

            ksort($months);
        }

        ksort($comments);

        return $comments;
    }
}
