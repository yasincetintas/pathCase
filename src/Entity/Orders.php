<?php


namespace App\Entity;

use App\Traits\EntityDateInformationTrait;
use App\Traits\SoftDeletableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="orders", schema="path")
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Orders
{
    use EntityDateInformationTrait;
    use SoftDeletableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"Order"})
     */
    private $id;
    /**
     * @ORM\Column(name="order_code",type="string",nullable=false,length=150)
     * @Groups({"Order"})
     */
    private $orderCode;
    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products" ,inversedBy="orders")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"Order"})
     */
    private Products $product;
    /**
     * @var Customers
     * @ORM\ManyToOne(targetEntity="Customers" ,inversedBy="orders")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"Order"})
     */
    private Customers $customer;
    /**
     * @ORM\Column(name="address",type="text",nullable=false)
     * @Groups({"Order"})
     */
    private $address;
    /**
     * @ORM\Column(name="shipping_date",type="datetime",nullable=true)
     * @Groups({"Order"})
     */
    private $shippingDate;
    /**
     * @ORM\Column(name="quantity",type="integer",nullable=false,options={"default" :1})
     * @Groups({"Order"})
     */
    private int $quantity;

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
    public function getOrderCode()
    {
        return $this->orderCode;
    }

    /**
     * @param mixed $orderCode
     */
    public function setOrderCode($orderCode): void
    {
        $this->orderCode = $orderCode;
    }

    /**
     * @return Products
     */
    public function getProduct(): Products
    {
        return $this->product;
    }

    /**
     * @param Products $product
     */
    public function setProduct(Products $product): void
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param mixed $shippingDate
     */
    public function setShippingDate($shippingDate): void
    {
        $this->shippingDate = $shippingDate;
    }

    /**
     * @return Customers
     */
    public function getCustomer(): Customers
    {
        return $this->customer;
    }

    /**
     * @param Customers $customer
     */
    public function setCustomer(Customers $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}