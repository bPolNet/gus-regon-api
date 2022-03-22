<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi;

use GusApi\SearchReport;
use Primotly\GusRegonApi\Model\GusInfo;

class Transformer implements TransformerInterface
{
    public function searchReport2GusInfo(SearchReport $report, array $fullReport): GusInfo
    {
        $info = new GusInfo();

        $info->setRegon($report->getRegon())
            ->setName($report->getName())
            ->setState($report->getProvince())
            ->setRegion($report->getDistrict())
            ->setBorough($report->getCommunity())
            ->setCity($report->getCity())
            ->setZipCode($report->getZipCode())
            ->setStreet($report->getStreet())
            ->setTypeId(strtoupper($report->getType()))
            ->setTaxId($report->getNip())
        ;

        if (0 === strlen(trim($report->getActivityEndDate()))) {
            $info->setIsActive(true);
        } else {
            $info->setIsActive(false);
        }

        if (strlen(trim($report->getPropertyNumber())) > 0) {
            $info->setBuildingNumber($report->getPropertyNumber());
        }

        if (strlen(trim($report->getApartmentNumber())) > 0) {
            $info->setFlatNumber($report->getApartmentNumber());
        }

        if (array_key_exists('praw_numerWRejestrzeEwidencji', $fullReport)) {
            if (strlen(trim($fullReport['praw_numerWRejestrzeEwidencji'])) > 0) {
                $info->setNationalCourtRegisterId($fullReport['praw_numerWRejestrzeEwidencji']);
            }
        }

        return $info;
    }
}
