<?php


namespace App\Models\Request\Order;


use Symfony\Component\Validator\Constraints as Assert;

class CreateOrder
{
    /**
     * @var int
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    public $productId;
    /**
     * @var int
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    public $quantity;
    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    public $address;
    /**
     * @Assert\DateTime
     * @var string A "Y-m-d H:i:s" formatted value
     */
    public $shippingDate;

}