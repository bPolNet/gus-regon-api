<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi\Model;

interface GusInfoInterface
{
    public const TYPE_DESCRIPTION = [
        'P' => 'Typ jednostki – jednostka prawna',
        'F' => 'Typ jednostki – jednostka fizyczna (os. fizyczna prowadząca działalnośd gospodarczą)',
        'LP' => 'Typ jednostki – jednostka lokalna jednostki prawnej',
        'LF' => 'Typ jednostki – jednostka lokalna jednostki fizycznej',
    ];
}
