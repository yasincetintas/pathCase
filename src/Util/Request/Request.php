<?php


namespace App\Util\Request;


use App\Exceptions\ValidationException;
use App\Util\Violation\ViolationInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Request implements RequestModelInterface
{
    private $serializer;
    private $validator;
    private $violator;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        ViolationInterface $violator
    )
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->violator = $violator;
    }

    /**
     * @param string $data
     * @param string $model
     * @return object
     */
    public function validate(string $data, string $model): object
    {
        if (!$data) {
            throw new ValidationException('messages.warning.invalid_parameter', Response::HTTP_BAD_REQUEST);//Empty body.
        }

        try {
            $object = $this->serializer->deserialize($data, $model, 'json');
        } catch (Exception $e) {
            throw new ValidationException('messages.warning.invalid_parameter', Response::HTTP_BAD_REQUEST); //'Invalid body
        }

        $errors = $this->validator->validate($object);
        if ($errors->count()) {
            throw new ValidationException(json_encode($this->violator->build($errors)), Response::HTTP_BAD_REQUEST);
        }

        return $object;
    }
}