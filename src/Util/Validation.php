<?php


/**
 * Class Validation
 * @package App\Utils
 * @author Yasin CETINTAS <ysnctnts@gmail.com>
 */

namespace App\Util;

use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class Validation
{
    /**
     * @var TranslatorInterface
     */
    private $translator;
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(TranslatorInterface $translator, ValidatorInterface $validator, LoggerInterface $logger)
    {
        $this->translator = $translator;
        $this->validator = $validator;
        $this->logger = $logger;
    }

    /**
     * @param $data
     * @param $entity
     * @return array
     */
    public function valid($data, $entity)
    {
        $checkValid = $this->checkValid($data, $entity);
        if (!empty($checkValid) && count($checkValid)) {
            $this->logger->error('Validation Error: ' . json_encode($checkValid) . ' Request :' . json_encode($data));
            return $checkValid;
        }
        return [];
    }

    /**
     * @param $data || request json
     * @param $valid
     * @return array
     */
    public function checkNullable($data, $valid)
    {
        $notKey = array();

        if (is_null($data)) {
            return $valid;
        }

        foreach ($valid as $key) {
            if (!property_exists($data, $key)) {
                $notKey[] = ($this->translator->trans('messages.error.required.' . $key));
            }
        }
        return $notKey;
    }

    /**
     * @param $data
     * @param $valid
     * @return mixed
     */
    public function checkDataType($data, $valid)
    {
        $notKey = array();
        if (is_null($data)) {
            return $valid;
        }
        foreach ($valid as $key => $value) {
            if (!property_exists($data, $key)) {
                $notKey[] = ($this->translator->trans('messages.error.required.' . $key));
            }
            if (gettype($data->{$key}) != $value["type"]){
                $notKey[] = ($this->translator->trans('messages.error.type.' . $key));
            }
        }
        return $notKey;
    }

    /**
     * @param $data
     * @param $entity
     * @return array
     */
    private function checkValid($data, $entity)
    {
        foreach ($data as $key => $value) {
            if (method_exists($entity, $key)) {
                $entity->{'set' . ucwords($key)}($value);
            }
        }
        $errors = $this->validator->validate($entity);
        if (count($errors) > 0) {
            $notKey = array();
            foreach ($errors as $error) {
                $message = $error->getConstraint()->message ?? 'messages.error.valid.' . $error->getPropertyPath();
                $notKey[] = $this->translator->trans($message);
            }
            return $notKey;
        }
    }
}
