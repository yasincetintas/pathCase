<?php

namespace App\Models\Response\Guest;

use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Content extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $maleText;
    /**
     * @var string|null
     */
    private $malePhoto;
    /**
     * @var string|null
     */
    private $femaleText;
    /**
     * @var string|null
     */
    private $femalePhoto;
    /**
     * @var string|null
     */
    private $titleText;
    /**
     * @var string|null
     */
    private $historyTitle;
    /**
     * @var string|null
     */
    private $historyText;
    /**
     * @var string|null
     */
    private $headerPhoto;
    /**
     * @var string|null
     */
    private $defaultBackgroundPhoto;
    /**
     * @var string|null
     */
    private $ownerTitle;
    /**
     * @var string|null
     */
    private $timelineTitle;
    /**
     * @var string|null
     */
    private $sweetTitle;
    /**
     * @var string|null
     */
    private $familyTitle;
    /**
     * @var string|null
     */
    private $placeTitle;
    /**
     * @var string|null
     */
    private $attentionTitle;
    /**
     * @var string|null
     */
    private $galleryTitle;

    public function __construct($content=null)
    {
        if ($content)
            $this->convertToObject($content);
    }

    public function convertToObject($content)
    {
        $this->setId($content->getId());
        $this->setMaleText($content->getMaleText());
        $this->setMalePhoto($content->getMalePhoto());
        $this->setFemaleText($content->getFemaleText());
        $this->setFemalePhoto($content->getFemalePhoto());
        $this->setTitleText($content->getTitleText());
        $this->setHistoryText($content->getHistoryText());
        $this->setHistoryTitle($content->getHistoryTitle());
        $this->setHeaderPhoto($content->getHeaderPhoto());
        $this->setDefaultBackgroundPhoto($content->getDefaultBackgroundPhoto());
        $this->setOwnerTitle($content->getOwnerTitle());
        $this->setTimelineTitle($content->getTimelineTitle());
        $this->setSweetTitle($content->getSweetTitle());
        $this->setFamilyTitle($content->getFamilyTitle());
        $this->setPlaceTitle($content->getPlaceTitle());
        $this->setAttentionTitle($content->getAttentionTitle());
        $this->setGalleryTitle($content->getGalleryTitle());
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
    public function getMaleText(): ?string
    {
        return $this->maleText;
    }

    /**
     * @param string|null $maleText
     */
    public function setMaleText(?string $maleText): void
    {
        $this->maleText = $maleText;
    }

    /**
     * @return string|null
     */
    public function getMalePhoto(): ?string
    {
        return $this->malePhoto;
    }

    /**
     * @param string|null $malePhoto
     */
    public function setMalePhoto(?string $malePhoto): void
    {
        $this->malePhoto = $malePhoto;
    }

    /**
     * @return string|null
     */
    public function getFemaleText(): ?string
    {
        return $this->femaleText;
    }

    /**
     * @param string|null $femaleText
     */
    public function setFemaleText(?string $femaleText): void
    {
        $this->femaleText = $femaleText;
    }

    /**
     * @return string|null
     */
    public function getFemalePhoto(): ?string
    {
        return $this->femalePhoto;
    }

    /**
     * @param string|null $femalePhoto
     */
    public function setFemalePhoto(?string $femalePhoto): void
    {
        $this->femalePhoto = $femalePhoto;
    }

    /**
     * @return string|null
     */
    public function getTitleText(): ?string
    {
        return $this->titleText;
    }

    /**
     * @param string|null $titleText
     */
    public function setTitleText(?string $titleText): void
    {
        $this->titleText = $titleText;
    }

    /**
     * @return string|null
     */
    public function getHistoryTitle(): ?string
    {
        return $this->historyTitle;
    }

    /**
     * @param string|null $historyTitle
     */
    public function setHistoryTitle(?string $historyTitle): void
    {
        $this->historyTitle = $historyTitle;
    }

    /**
     * @return string|null
     */
    public function getHistoryText(): ?string
    {
        return $this->historyText;
    }

    /**
     * @param string|null $historyText
     */
    public function setHistoryText(?string $historyText): void
    {
        $this->historyText = $historyText;
    }

    /**
     * @return string|null
     */
    public function getHeaderPhoto(): ?string
    {
        return $this->headerPhoto;
    }

    /**
     * @param string|null $headerPhoto
     */
    public function setHeaderPhoto(?string $headerPhoto): void
    {
        $this->headerPhoto = $headerPhoto;
    }

    /**
     * @return string|null
     */
    public function getDefaultBackgroundPhoto(): ?string
    {
        return $this->defaultBackgroundPhoto;
    }

    /**
     * @param string|null $defaultBackgroundPhoto
     */
    public function setDefaultBackgroundPhoto(?string $defaultBackgroundPhoto): void
    {
        $this->defaultBackgroundPhoto = $defaultBackgroundPhoto;
    }

    /**
     * @return string|null
     */
    public function getOwnerTitle(): ?string
    {
        return $this->ownerTitle;
    }

    /**
     * @param string|null $ownerTitle
     */
    public function setOwnerTitle(?string $ownerTitle): void
    {
        $this->ownerTitle = $ownerTitle;
    }

    /**
     * @return string|null
     */
    public function getTimelineTitle(): ?string
    {
        return $this->timelineTitle;
    }

    /**
     * @param string|null $timelineTitle
     */
    public function setTimelineTitle(?string $timelineTitle): void
    {
        $this->timelineTitle = $timelineTitle;
    }

    /**
     * @return string|null
     */
    public function getSweetTitle(): ?string
    {
        return $this->sweetTitle;
    }

    /**
     * @param string|null $sweetTitle
     */
    public function setSweetTitle(?string $sweetTitle): void
    {
        $this->sweetTitle = $sweetTitle;
    }

    /**
     * @return string|null
     */
    public function getFamilyTitle(): ?string
    {
        return $this->familyTitle;
    }

    /**
     * @param string|null $familyTitle
     */
    public function setFamilyTitle(?string $familyTitle): void
    {
        $this->familyTitle = $familyTitle;
    }

    /**
     * @return string|null
     */
    public function getPlaceTitle(): ?string
    {
        return $this->placeTitle;
    }

    /**
     * @param string|null $placeTitle
     */
    public function setPlaceTitle(?string $placeTitle): void
    {
        $this->placeTitle = $placeTitle;
    }

    /**
     * @return string|null
     */
    public function getAttentionTitle(): ?string
    {
        return $this->attentionTitle;
    }

    /**
     * @param string|null $attentionTitle
     */
    public function setAttentionTitle(?string $attentionTitle): void
    {
        $this->attentionTitle = $attentionTitle;
    }

    /**
     * @return string|null
     */
    public function getGalleryTitle(): ?string
    {
        return $this->galleryTitle;
    }

    /**
     * @param string|null $galleryTitle
     */
    public function setGalleryTitle(?string $galleryTitle): void
    {
        $this->galleryTitle = $galleryTitle;
    }
}