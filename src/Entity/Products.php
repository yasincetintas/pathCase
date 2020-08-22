<?php


namespace App\Entity;


use App\Traits\EntityDateInformationTrait;
use App\Traits\SoftDeletableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 * @ORM\Table(name="products",schema="path")
 * @ORM\HasLifecycleCallbacks
 */
class Products
{
    use EntityDateInformationTrait;
    use SoftDeletableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="name",type="string",nullable=false,length=255)
     */
    private $name;
    /**
     * @ORM\Column(name="available_pieces",type="integer",nullable=false,options={"default" :0})
     */
    private $availablePieces;

    /**
     * @var Orders|null
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="product")
     * @ORM\JoinColumn(nullable=true)
     */
    private $orders;

    public function __construct()
    {
        $this->availablePieces = 0;
        $this->orders = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAvailablePieces()
    {
        return $this->availablePieces;
    }

    /**
     * @param mixed $availablePieces
     */
    public function setAvailablePieces($availablePieces): void
    {
        $this->availablePieces = $availablePieces;
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
            $orders->setProduct($this);
        }
        return $this;
    }
}