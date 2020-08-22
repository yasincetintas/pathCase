<?php


namespace App\Entity;

use App\Traits\EntityDateInformationTrait;
use App\Traits\SoftDeletableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 *
 * @ORM\Table(name="customers", schema="path")
 * @ORM\Entity(repositoryClass="App\Repository\CustomersRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Customers implements UserInterface
{
    use EntityDateInformationTrait;
    use SoftDeletableTrait;

    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=500)
     */
    private $password;
    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;
    /**
     * @var string|null
     *
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    private $confirmationToken;
    /**
     * @ORM\Column(name="roles", type="array" ,nullable=true)
     */
    private $roles = [];
    /**
     * @ORM\Column(name="is_active", type="boolean",options={"default" :true})
     */
    private $isActive;
    /**
     * @var Orders|null
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="customer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $orders;

    public function __construct()
    {
        $this->isActive = true;
        $this->roles = array();
        $this->orders = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
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
    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    /**
     * @param string|null $confirmationToken
     */
    public function setConfirmationToken(?string $confirmationToken): void
    {
        $this->confirmationToken = $confirmationToken;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
    /**
     * @return Collection|Orders[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Orders $orders
     * @return $this
     */
    public function addOrders(Orders $orders): self
    {
        if (!$this->orders->contains($orders)) {
            $this->orders[] = $orders;
            $orders->setCustomer($this);
        }
        return $this;
    }
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}