<?php

namespace App\DataFixtures;

use App\Parser\RecordParser;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;

class StreetnameFixtures extends AbstractFixture implements ORMFixtureInterface, FixtureInterface, OrderedFixtureInterface
{
    private $dataFile = __DIR__ . '/../../../data/BAF_20191116.dat';

    private $recordParser;

    public function __construct(
        RecordParser $recordParser
    ) {
        $this->recordParser = $recordParser;
    }

    public function load(ObjectManager $manager)
    {
        $recordParser = new RecordParser();
        
        $handle = fopen($this->dataFile, 'r');

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if (mb_strlen($line, 'ISO-8859-1') >= 256) {
                    $streetname = $recordParser->parse($line);
                    $streetname->convertObjectToUtf8();
                    $manager->persist($streetname);
                }
            }
            fclose($handle);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
