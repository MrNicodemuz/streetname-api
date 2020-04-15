<?php

namespace App\Entity;

class Streetname
{
    private $id;

    private $type;

    private $date;

    private $postal_code;

    private $postal_code_name_finnish;

    private $postal_code_name_swedish;

    private $postal_code_abbreviation_finnish;

    private $postal_code_abbreviation_swedish;

    private $location_name_finnish;

    private $location_name_swedish;

    private $building_data_type;

    private $min_building_number_1;

    private $min_building_delivery_letter_1;

    private $min_punctuation_mark;

    private $min_building_number_2;

    private $min_building_delivery_letter_2;

    private $max_building_number_1;

    private $max_building_delivery_letter_1;

    private $max_punctuation_mark;

    private $max_building_number_2;

    private $max_building_delivery_letter_2;

    private $municipality_code;

    private $municipality_name_finnish;

    private $municipality_name_swedish;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStreetName()
    {
        return $this->getLocationNameFinnish();
    }

    public function getStreetNameAlt()
    {
        return $this->getLocationNameSwedish();
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getPostalCodeNameFinnish(): ?string
    {
        return $this->postal_code_name_finnish;
    }

    public function setPostalCodeNameFinnish(string $postal_code_name_finnish): self
    {
        $this->postal_code_name_finnish = $postal_code_name_finnish;

        return $this;
    }

    public function getPostalCodeNameSwedish(): ?string
    {
        return $this->postal_code_name_swedish;
    }

    public function setPostalCodeNameSwedish(string $postal_code_name_swedish): self
    {
        $this->postal_code_name_swedish = $postal_code_name_swedish;

        return $this;
    }

    public function getPostalCodeAbbreviationFinnish(): ?string
    {
        return $this->postal_code_abbreviation_finnish;
    }

    public function setPostalCodeAbbreviationFinnish(string $postal_code_abbreviation_finnish): self
    {
        $this->postal_code_abbreviation_finnish = $postal_code_abbreviation_finnish;

        return $this;
    }

    public function getPostalCodeAbbreviationSwedish(): ?string
    {
        return $this->postal_code_abbreviation_swedish;
    }

    public function setPostalCodeAbbreviationSwedish(string $postal_code_abbreviation_swedish): self
    {
        $this->postal_code_abbreviation_swedish = $postal_code_abbreviation_swedish;

        return $this;
    }

    public function getLocationNameFinnish(): ?string
    {
        return $this->location_name_finnish;
    }

    public function setLocationNameFinnish(string $location_name_finnish): self
    {
        $this->location_name_finnish = $location_name_finnish;

        return $this;
    }

    public function getLocationNameSwedish(): ?string
    {
        return $this->location_name_swedish;
    }

    public function setLocationNameSwedish(string $location_name_swedish): self
    {
        $this->location_name_swedish = $location_name_swedish;

        return $this;
    }

    public function getBuildingDataType(): ?string
    {
        return $this->building_data_type;
    }

    public function setBuildingDataType(string $building_data_type): self
    {
        $this->building_data_type = $building_data_type;

        return $this;
    }

    public function getMinBuildingNumber1(): ?string
    {
        return $this->min_building_number_1;
    }

    public function setMinBuildingNumber1(string $min_building_number_1): self
    {
        $this->min_building_number_1 = $min_building_number_1;

        return $this;
    }

    public function getMinBuildingDeliveryLetter1(): ?string
    {
        return $this->min_building_delivery_letter_1;
    }

    public function setMinBuildingDeliveryLetter1(string $min_building_delivery_letter_1): self
    {
        $this->min_building_delivery_letter_1 = $min_building_delivery_letter_1;

        return $this;
    }

    public function getMinPunctuationMark(): ?string
    {
        return $this->min_punctuation_mark;
    }

    public function setMinPunctuationMark(string $min_punctuation_mark): self
    {
        $this->min_punctuation_mark = $min_punctuation_mark;

        return $this;
    }

    public function getMinBuildingNumber2(): ?string
    {
        return $this->min_building_number_2;
    }

    public function setMinBuildingNumber2(string $min_building_number_2): self
    {
        $this->min_building_number_2 = $min_building_number_2;

        return $this;
    }

    public function getMinBuildingDeliveryLetter2(): ?string
    {
        return $this->min_building_delivery_letter_2;
    }

    public function setMinBuildingDeliveryLetter2(string $min_building_delivery_letter_2): self
    {
        $this->min_building_delivery_letter_2 = $min_building_delivery_letter_2;

        return $this;
    }

    public function getMaxBuildingNumber1(): ?string
    {
        return $this->max_building_number_1;
    }

    public function setMaxBuildingNumber1(string $max_building_number_1): self
    {
        $this->max_building_number_1 = $max_building_number_1;

        return $this;
    }

    public function getMaxBuildingDeliveryLetter1(): ?string
    {
        return $this->max_building_delivery_letter_1;
    }

    public function setMaxBuildingDeliveryLetter1(string $max_building_delivery_letter_1): self
    {
        $this->max_building_delivery_letter_1 = $max_building_delivery_letter_1;

        return $this;
    }

    public function getMaxPunctuationMark(): ?string
    {
        return $this->max_punctuation_mark;
    }

    public function setMaxPunctuationMark(string $max_punctuation_mark): self
    {
        $this->max_punctuation_mark = $max_punctuation_mark;

        return $this;
    }

    public function getMaxBuildingNumber2(): ?string
    {
        return $this->max_building_number_2;
    }

    public function setMaxBuildingNumber2(string $max_building_number_2): self
    {
        $this->max_building_number_2 = $max_building_number_2;

        return $this;
    }

    public function getMaxBuildingDeliveryLetter2(): ?string
    {
        return $this->max_building_delivery_letter_2;
    }

    public function setMaxBuildingDeliveryLetter2(string $max_building_delivery_letter_2): self
    {
        $this->max_building_delivery_letter_2 = $max_building_delivery_letter_2;

        return $this;
    }

    public function getMunicipalityCode(): ?string
    {
        return $this->municipality_code;
    }

    public function setMunicipalityCode(string $municipality_code): self
    {
        $this->municipality_code = $municipality_code;

        return $this;
    }

    public function getMunicipalityNameFinnish(): ?string
    {
        return $this->municipality_name_finnish;
    }

    public function setMunicipalityNameFinnish(string $municipality_name_finnish): self
    {
        $this->municipality_name_finnish = $municipality_name_finnish;

        return $this;
    }

    public function getMunicipalityNameSwedish(): ?string
    {
        return $this->municipality_name_swedish;
    }

    public function setMunicipalityNameSwedish(string $municipality_name_swedish): self
    {
        $this->municipality_name_swedish = $municipality_name_swedish;

        return $this;
    }

    public function convertObjectToUtf8()
    {
        $this->setPostalCodeNameFinnish(
            mb_convert_encoding($this->getPostalCodeNameFinnish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setPostalCodeNameSwedish(
            mb_convert_encoding($this->getPostalCodeNameSwedish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setPostalCodeAbbreviationFinnish(
            mb_convert_encoding($this->getPostalCodeAbbreviationFinnish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setPostalCodeAbbreviationSwedish(
            mb_convert_encoding($this->getPostalCodeAbbreviationSwedish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setLocationNameFinnish(
            mb_convert_encoding($this->getLocationNameFinnish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setLocationNameSwedish(
            mb_convert_encoding($this->getLocationNameSwedish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setMunicipalityCode(
            mb_convert_encoding($this->getMunicipalityCode(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setMunicipalityNameFinnish(
            mb_convert_encoding($this->getMunicipalityNameFinnish(), 'UTF-8', 'ISO-8859-1')
        );

        $this->setMunicipalityNameSwedish(
            mb_convert_encoding($this->getMunicipalityNameSwedish(), 'UTF-8', 'ISO-8859-1')
        );
    }

    public function getCity()
    {
        return $this->getPostalCodeNameFinnish();
    }

    public function getCityAlt()
    {
        return $this->getPostalCodeNameSwedish();
    }

    public function getMinApartmentNo()
    {
        return
            $this->getMinBuildingNumber1() .
            $this->getMinBuildingDeliveryLetter1() .
            ($this->getMinBuildingNumber2() ? $this->getMinPunctuationMark() : '') .
            $this->getMinBuildingNumber2() .
            $this->getMinBuildingDeliveryLetter2()
        ;
    }

    public function getMaxApartmentNo()
    {
        return
            $this->getMaxBuildingNumber1() .
            $this->getMaxBuildingDeliveryLetter1() .
            ($this->getMaxBuildingNumber2() ? $this->getMaxPunctuationMark() : '') .
            $this->getMaxBuildingNumber2() .
            $this->getMaxBuildingDeliveryLetter2()
        ;
    }
}
