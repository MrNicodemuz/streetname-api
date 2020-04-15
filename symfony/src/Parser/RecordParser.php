<?php

namespace App\Parser;

use App\Entity\Streetname;

class RecordParser
{
    public function parse($line)
    {
        $streetname = new Streetname();

        $streetname->setType(mb_substr($line, 0, 5, 'ISO-8859-1'));

        $year = intval(mb_substr($line, 5, 4, 'ISO-8859-1'));
        $month = intval(mb_substr($line, 9, 2, 'ISO-8859-1'));
        $day = intval(mb_substr($line, 11, 2, 'ISO-8859-1'));

        $streetname->setDate((new \DateTime())->setDate($year, $month, $day)->setTime(0, 0, 0));

        $streetname->setPostalCode(mb_substr($line, 13, 5, 'ISO-8859-1'));

        $streetname->setPostalCodeNameFinnish(trim(mb_substr($line, 18, 30, 'ISO-8859-1')));
        $streetname->setPostalCodeNameSwedish(trim(mb_substr($line, 48, 30, 'ISO-8859-1')));

        $streetname->setPostalCodeAbbreviationFinnish(trim(mb_substr($line, 78, 12, 'ISO-8859-1')));
        $streetname->setPostalCodeAbbreviationSwedish(trim(mb_substr($line, 90, 12, 'ISO-8859-1')));

        $streetname->setLocationNameFinnish(trim(mb_substr($line, 102, 30, 'ISO-8859-1')));
        $streetname->setLocationNameSwedish(trim(mb_substr($line, 132, 30, 'ISO-8859-1')));

        $streetname->setBuildingDataType(trim(mb_substr($line, 186, 1, 'ISO-8859-1')));

        $streetname->setMinBuildingNumber1(trim(mb_substr($line, 187, 5, 'ISO-8859-1')));
        $streetname->setMinBuildingDeliveryLetter1(trim(mb_substr($line, 192, 1, 'ISO-8859-1')));
        $streetname->setMinPunctuationMark(trim(mb_substr($line, 193, 1, 'ISO-8859-1')));
        $streetname->setMinBuildingNumber2(trim(mb_substr($line, 194, 5, 'ISO-8859-1')));
        $streetname->setMinBuildingDeliveryLetter2(trim(mb_substr($line, 199, 1, 'ISO-8859-1')));

        $streetname->setMaxBuildingNumber1(trim(mb_substr($line, 200, 5, 'ISO-8859-1')));
        $streetname->setMaxBuildingDeliveryLetter1(trim(mb_substr($line, 205, 1, 'ISO-8859-1')));
        $streetname->setMaxPunctuationMark(trim(mb_substr($line, 206, 1, 'ISO-8859-1')));
        $streetname->setMaxBuildingNumber2(trim(mb_substr($line, 207, 5, 'ISO-8859-1')));
        $streetname->setMaxBuildingDeliveryLetter2(trim(mb_substr($line, 212, 1, 'ISO-8859-1')));

        $streetname->setMaxBuildingDeliveryLetter2(trim(mb_substr($line, 212, 1, 'ISO-8859-1')));

        $streetname->setMunicipalityCode(trim(mb_substr($line, 213, 3, 'ISO-8859-1')));
        $streetname->setMunicipalityNameFinnish(trim(mb_substr($line, 216, 20, 'ISO-8859-1')));
        $streetname->setMunicipalityNameSwedish(trim(mb_substr($line, 236, 20, 'ISO-8859-1')));

        return $streetname;
    }
}
