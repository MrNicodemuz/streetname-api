<?php

namespace App\Tests\Parser;

use App\Entity\Streetname;
use App\Parser\RecordParser;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 */
class RecordParserTest extends TestCase
{
    public function testRow1FromDataSet()
    {
        $line = 'KATUN2019111600002HELSINKI                      HELSINGFORS                   HKI         HFORS                                                                                           0                          091Helsinki            Helsingfors         ';

        $parser = new RecordParser();
        $output = $parser->parse($line);

        $this->assertNotEmpty($output);
        $this->assertInstanceOf(Streetname::class, $output);

        $this->assertEquals('KATUN', $output->getType());

        $expectedDate = new \DateTime();
        $expectedDate->setDate(2019, 11, 16)->setTime(0, 0, 0);

        $this->assertEquals($expectedDate, $output->getDate());

        $this->assertEquals('00002', $output->getPostalCode());
        $this->assertEquals('HELSINKI', $output->getPostalCodeNameFinnish());
        $this->assertEquals('HELSINGFORS', $output->getPostalCodeNameSwedish());
        $this->assertEquals('HKI', $output->getPostalCodeAbbreviationFinnish());
        $this->assertEquals('HFORS', $output->getPostalCodeAbbreviationSwedish());
        $this->assertEquals('', $output->getLocationNameFinnish());
        $this->assertEquals('', $output->getLocationNameSwedish());

        $this->assertEquals('0', $output->getBuildingDataType());

        $this->assertEquals('', $output->getMinBuildingNumber1());
        $this->assertEquals('', $output->getMinBuildingDeliveryLetter1());
        $this->assertEquals('', $output->getMinPunctuationMark());
        $this->assertEquals('', $output->getMinBuildingNumber2());
        $this->assertEquals('', $output->getMinBuildingDeliveryLetter2());

        $this->assertEquals('', $output->getMaxBuildingNumber1());
        $this->assertEquals('', $output->getMaxBuildingDeliveryLetter1());
        $this->assertEquals('', $output->getMaxPunctuationMark());
        $this->assertEquals('', $output->getMaxBuildingNumber2());
        $this->assertEquals('', $output->getMaxBuildingDeliveryLetter2());

        $this->assertEquals('091', $output->getMunicipalityCode());
        $this->assertEquals('Helsinki', $output->getMunicipalityNameFinnish());
        $this->assertEquals('Helsingfors', $output->getMunicipalityNameSwedish());
    }

    public function testRow81FromDataSetThatHasLocationData()
    {
        $line = 'KATUN2019111600100HELSINKI                      HELSINGFORS                   HKI         HFORS       Ateneuminkuja                 Ateneumgränden                                        1    1                     091Helsinki            Helsingfors         ';

        $parser = new RecordParser();
        $output = $parser->parse($line);

        $this->assertNotEmpty($output);
        $this->assertInstanceOf(Streetname::class, $output);

        $this->assertEquals('Ateneuminkuja', $output->getLocationNameFinnish());
        $this->assertEquals('Ateneumgränden', $output->getLocationNameSwedish());
    }

    public function testRow94FromDataSetThatHasBuildingData()
    {
        $line = 'KATUN2019111600100HELSINKI                      HELSINGFORS                   HKI         HFORS       Aleksanterinkatu              Alexandersgatan                                       2   30 -   34    52        091Helsinki            Helsingfors         ';

        $parser = new RecordParser();
        $output = $parser->parse($line);

        $this->assertNotEmpty($output);
        $this->assertInstanceOf(Streetname::class, $output);

        $this->assertEquals('2', $output->getBuildingDataType());

        $this->assertEquals('30', $output->getMinBuildingNumber1());
        $this->assertEquals('', $output->getMinBuildingDeliveryLetter1());
        $this->assertEquals('-', $output->getMinPunctuationMark());
        $this->assertEquals('34', $output->getMinBuildingNumber2());
        $this->assertEquals('', $output->getMinBuildingDeliveryLetter2());

        $this->assertEquals('52', $output->getMaxBuildingNumber1());
        $this->assertEquals('', $output->getMaxBuildingDeliveryLetter1());
        $this->assertEquals('', $output->getMaxPunctuationMark());
        $this->assertEquals('', $output->getMaxBuildingNumber2());
        $this->assertEquals('', $output->getMaxBuildingDeliveryLetter2());
    }
}
