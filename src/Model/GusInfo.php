<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi\Model;

class GusInfo
{
    /**
     * @var string|null
     */
    private $name;                                  // nazwa

    /**
     * @var string|null
     */
    private $state;                                // województwo

    /**
     * @var string|null
     */
    private $region;                               // powiat

    /**
     * @var string|null
     */
    private $borough;                              // gmina

    /**
     * @var string|null
     */
    private $city;                                // miejscowość

    /**
     * @var string|null
     */
    private $zipCode;                            // kod pocztowy

    /**
     * @var string|null
     */
    private $street;                               // ulica

    /**
     * @var string|null
     */
    private $typeId;                                // typ

    /**
     * @var string|null
     */
    private $buildingNumber;                        // numer nieruchomości

    /**
     * @var string|null
     */
    private $flatNumber;                            // numer lokalu

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var string
     */
    private $regon;                                 // regon

    /**
     * @var string|null
     */
    private $taxId;                                 // nip

    /**
     * @var string|null
     */
    private $nationalCourtRegisterId;               // krs

    public function getTypeDescription(): string
    {
        $description = '';
        if (array_key_exists($this->typeId, GusClientInfoInterface::TYPE_DESCRIPTION)) {
            $description = GusClientInfoInterface::TYPE_DESCRIPTION[$this->typeId];
        }

        return $description;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;
        return $this;
    }

    public function getBorough(): ?string
    {
        return $this->borough;
    }

    public function setBorough(?string $borough): self
    {
        $this->borough = $borough;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getTypeId(): ?string
    {
        return $this->typeId;
    }

    public function setTypeId(?string $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    public function setBuildingNumber(?string $buildingNumber): self
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    public function getFlatNumber(): ?string
    {
        return $this->flatNumber;
    }

    public function setFlatNumber(?string $flatNumber): self
    {
        $this->flatNumber = $flatNumber;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function getRegon(): string
    {
        return $this->regon;
    }

    public function setRegon(string $regon): self
    {
        $this->regon = $regon;
        return $this;
    }

    public function getTaxId(): ?string
    {
        return $this->taxId;
    }

    public function setTaxId(?string $taxId): self
    {
        $this->taxId = $taxId;
        return $this;
    }

    public function getNationalCourtRegisterId(): ?string
    {
        return $this->nationalCourtRegisterId;
    }

    public function setNationalCourtRegisterId(?string $nationalCourtRegisterId): self
    {
        $this->nationalCourtRegisterId = $nationalCourtRegisterId;
        return $this;
    }
}
