<?php


namespace App\Models\Response\Guest;

use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Theme extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $name;

    public function __construct($theme = null)
    {
        if ($theme)
            $this->convertToObject($theme);
    }

    public function convertToObject($theme)
    {
        $this->setId($theme->getId());
        $this->setName($theme->getName());
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
}