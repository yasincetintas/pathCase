<?php


namespace App\Models\Response\Guest;

use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Template extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var bool|null
     */
    private $owner;
    /**
     * @var bool|null
     */
    private $timeline;
    /**
     * @var bool|null
     */
    private $sweetMessage;
    /**
     * @var bool|null
     */
    private $familyInfo;
    /**
     * @var bool|null
     */
    private $gallery;
    /**
     * @var bool|null
     */
    private $service;
    /**
     * @var string|null
     */
    private $color;
    /**
     * @var
     */
    private $theme;
    /**
     * @var
     */
    private $font;

    public function __construct($template=null)
    {
        if ($template)
            $this->convertToObject($template);
    }

    public function convertToObject($template)
    {
        $this->setId($template->getId());
        $this->setOwner($template->isOwner());
        $this->setTimeline($template->isTimeline());
        $this->setSweetMessage($template->isSweetMessage());
        $this->setFamilyInfo($template->isFamilyInfo());
        $this->setGallery($template->isGallery());
        $this->setService($template->isService());
        $this->setColor($template->getColor());
        $this->setTheme($template->getTheme());
        $this->setFont($template->getFont());
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
     * @return bool|null
     */
    public function getOwner(): ?bool
    {
        return $this->owner;
    }

    /**
     * @param bool|null $owner
     */
    public function setOwner(?bool $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return bool|null
     */
    public function getTimeline(): ?bool
    {
        return $this->timeline;
    }

    /**
     * @param bool|null $timeline
     */
    public function setTimeline(?bool $timeline): void
    {
        $this->timeline = $timeline;
    }

    /**
     * @return bool|null
     */
    public function getSweetMessage(): ?bool
    {
        return $this->sweetMessage;
    }

    /**
     * @param bool|null $sweetMessage
     */
    public function setSweetMessage(?bool $sweetMessage): void
    {
        $this->sweetMessage = $sweetMessage;
    }

    /**
     * @return bool|null
     */
    public function getFamilyInfo(): ?bool
    {
        return $this->familyInfo;
    }

    /**
     * @param bool|null $familyInfo
     */
    public function setFamilyInfo(?bool $familyInfo): void
    {
        $this->familyInfo = $familyInfo;
    }

    /**
     * @return bool|null
     */
    public function getGallery(): ?bool
    {
        return $this->gallery;
    }

    /**
     * @param bool|null $gallery
     */
    public function setGallery(?bool $gallery): void
    {
        $this->gallery = $gallery;
    }

    /**
     * @return bool|null
     */
    public function getService(): ?bool
    {
        return $this->service;
    }

    /**
     * @param bool|null $service
     */
    public function setService(?bool $service): void
    {
        $this->service = $service;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = new Theme($theme);
    }

    /**
     * @return mixed
     */
    public function getFont()
    {
        return $this->font;
    }

    /**
     * @param mixed $font
     */
    public function setFont($font): void
    {
        $this->font = new Font($font);
    }
}