<?php


namespace App\Models\Response\Guest;


use App\Entity\EvleniyorCo\Timelines;
use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Timeline extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $title;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var \DateTime|null
     */
    private $actionDate;
    /**
     * @var string|null
     */
    private $photo;
    /**
     * @var string|null
     */
    private $addressDetail;
    /**
     * @var string|null
     */
    private $latitude;
    /**
     * @var string|null
     */
    private $longitude;


    public function __construct($timeline = null)
    {
        if ($timeline instanceof Timelines)
            $this->convertToObject($timeline);
    }

    public function convertToObject($timeline)
    {
        $this->setId($timeline->getId());
        $this->setTitle($timeline->getTitle());
        $this->setDescription($timeline->getDescription());
        $this->setActionDate($timeline->getActionDate());
        $this->setPhoto($timeline->getPhoto());
        $this->setAddressDetail($timeline->getAddressDetail());
        $this->setLatitude($timeline->getLatitude());
        $this->setLongitude($timeline->getLongitude());
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime|null
     */
    public function getActionDate(): ?\DateTime
    {
        return $this->actionDate;
    }

    /**
     * @param \DateTime|null $actionDate
     */
    public function setActionDate(?\DateTime $actionDate): void
    {
        $this->actionDate = $actionDate;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string|null
     */
    public function getAddressDetail(): ?string
    {
        return $this->addressDetail;
    }

    /**
     * @param string|null $addressDetail
     */
    public function setAddressDetail(?string $addressDetail): void
    {
        $this->addressDetail = $addressDetail;
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