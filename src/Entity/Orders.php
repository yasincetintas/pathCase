<?php


namespace App\Entity;

use App\Traits\EntityDateInformationTrait;
use App\Traits\SoftDeletableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="orders", schema="path")
 * @ORM\Entity
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
     */
    private $id;
    /**
     * @ORM\Column(name="order_code",type="string",nullable=false,length=150)
     */
    private $orderCode;
    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products" ,inversedBy="orders")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"Order"})
     */
    private $product;
    /**
     * @ORM\Column(name="address",type="text",nullable=false)
     */
    private $address;
    /**
     * @ORM\Column(name="shipping_date",type="datetime",nullable=true)
     */
    private $shippingDate;

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
}