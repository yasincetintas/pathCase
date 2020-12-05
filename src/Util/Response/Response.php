<?php

namespace App\Util\Response;

use Symfony\Component\Serializer\SerializerInterface;

class Response
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Response constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer
    ) {
        $this->serializer = $serializer;
    }

    /**
     * @param object $model
     * @return string
     */
    public function serialize(object $model): string
    {
        return $this->serializer->serialize($model, 'json');
    }
}