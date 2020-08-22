<?php


namespace App\Models\Response\Guest;


use App\Models\CoreObject;
use App\Models\Response\ResponseInterface;

class MaleFemale extends CoreObject implements ResponseInterface
{
    /**
     * @var int|null
     */
    private $id;
    /**
     * @var int|null
     */
    private $userId;
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $surname;
    /**
     * @var string|null
     */
    private $phone;
    /**
     * @var string|null
     */
    private $email;

    public function __construct($customers = null)
    {
        if ($customers)
            $this->convertToObject($customers);
    }

    public function convertToObject($customers)
    {
        $this->setId($customers->getId());
        $this->setUserId($customers->getUser()->getId());
        $this->setName($customers->getUser()->getName());
        $this->setSurname($customers->getUser()->getSurname());
        $this->setPhone($customers->getUser()->getPhone());
        $this->setEmail($customers->getUser()->getEmail());
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
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     */
    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
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
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}