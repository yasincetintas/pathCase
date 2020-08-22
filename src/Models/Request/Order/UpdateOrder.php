<?php


namespace App\Models\Request\Order;


use Symfony\Component\Validator\Constraints as Assert;

class UpdateOrder
{
    /**
     * @var int
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    public $productId;
    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    public $orderCode;
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
}