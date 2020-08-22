<?php


namespace App\Models\Response\Guest;


use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class Font extends CoreObject implements ResponseInterface
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
    private $path;

    public function __construct($font = null)
    {
        if ($font)
            $this->convertToObject($font);
    }

    public function convertToObject($font)
    {
        $this->setId($font->getId());
        $this->setName($font->getName());
        $this->setPath($font->getPath());
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
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     */
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }
}