<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi;

use GusApi\SearchReport;
use Primotly\GusRegonApi\Model\GusInfo;

interface TransformerInterface
{
    public function searchReport2GusInfo(SearchReport $report, array $fullReport): GusInfo;
}
