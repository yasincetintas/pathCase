<?php


namespace App\Models\Request\Guest;

use Symfony\Component\Validator\Constraints as Assert;

class GetSite
{
    /**
     * @var string
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    public $customerSlug;
    /**
     * @var string
     * @Assert\Type("string")
     */
    public $guestSlug;

}