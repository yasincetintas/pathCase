<?php


namespace App\Models\Response\Guest;


use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Company extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $slug;
    /**
     * @var string|null
     */
    private $logo;
    /**
     * @var string|null
     */
    private $address;
    /**
     * @var string|null
     */
    private $latitude;
    /**
     * @var string|null
     */
    private $longitude;

    public function __construct($company=null)
    {
        if ($company)
            $this->convertToObject($company);
    }

    public function convertToObject($company)
    {
        $this->setId($company->getId());
        $this->setName($company->getName());
        $this->setSlug($company->getSlug());
        $this->setLogo($company->getLogo());
        $this->setAddress($company->getAddressText());
        $this->setLatitude($company->getLatitude());
        $this->setLongitude($company->getLongitude());
    }
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string|null $logo
     */
    public function setLogo(?string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param string|null $latitude
     */
    public function setLatitude(?string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param string|null $longitude
     */
    public function setLongitude(?string $longitude): void
    {
        $this->longitude = $longitude;
    }
}