<?php


namespace App\Models\Response\Guest;

use App\Entity\EvleniyorCo\Timelines;
use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class SiteData extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $slug;
    /**
     * @var string|null
     */
    private $url;
    /**
     * @var int|null
     */
    private $credit;
    /**
     * @var int|null
     */
    private $lastCredit;
    /**
     * @var \DateTime|null
     */
    private $actionDate;
    /**
     * @var
     */
    private $male;
    /**
     * @var
     */
    private $female;
    /**
     * @var
     */
    private $company;
    /**
     * @var
     */
    private $content;
    /**
     * @var
     */
    private $template;

    private $timeline = [];

    /**
     * SiteData constructor.
     * @param null $site
     */
    public function __construct($site = null)
    {
        if ($site)
            $this->convertToObject($site);
    }

    /**
     * @param $site
     */
    public function convertToObject($site)
    {
        $this->setId($site->getId());
        $this->setSlug($site->getSlug());
        $this->setUrl($site->getUrl());
        $this->setCredit($site->getCredit());
        $this->setLastCredit($site->getLastCredit());
        $this->setActionDate($site->getActionDate());
        $this->setMale($site->getMale());
        $this->setFemale($site->getFemale());
        $this->setCompany($site->getCompany());
        $this->setContent($site->getContent());
        $this->setTemplate($site->getTemplate());
        $this->setTimeline($site->getTimelines());
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
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return int|null
     */
    public function getCredit(): ?int
    {
        return $this->credit;
    }

    /**
     * @param int|null $credit
     */
    public function setCredit(?int $credit): void
    {
        $this->credit = $credit;
    }

    /**
     * @return int|null
     */
    public function getLastCredit(): ?int
    {
        return $this->lastCredit;
    }

    /**
     * @param int|null $lastCredit
     */
    public function setLastCredit(?int $lastCredit): void
    {
        $this->lastCredit = $lastCredit;
    }

    public function getActionDate()
    {
        if ($this->actionDate)
            return $this->actionDate->format('Y-m-d H:i:s');
        else
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
     * @return mixed
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * @param mixed $male
     */
    public function setMale($male): void
    {
        $this->male = new MaleFemale($male);
    }

    /**
     * @return mixed
     */
    public function getFemale()
    {
        return $this->female;
    }

    /**
     * @param mixed $female
     */
    public function setFemale($female): void
    {
        $this->female = new MaleFemale($female);
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = new Company($company);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = new Content($content);
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template): void
    {
        $this->template = new Template($template);
    }

    /**
     * @return array
     */
    public function getTimeline(): array
    {
        return $this->timeline;
    }

    public function setTimeline($timeline)
    {
        if ($timeline->getValues()[0] instanceof Timelines) {
            foreach ($timeline->getValues() as $timelines){
                $this->timeline[] = new Timeline($timelines);
            }
            return;
        }
        $this->timeline[] = new Timeline($timeline);
    }
}