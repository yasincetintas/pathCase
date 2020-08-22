<?php

/**
 * Class ApiResponse
 * @package App\Response
 * @author Yasin CETINTAS <ysnctnts@gmail.com>
 */

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var array
     */
    private $contextGroups = array();

    /**
     * @var null
     */
    private $responseType = null;

    /**
     * @var array
     */
    private $errors = null;

    /**
     * @var null
     */
    private $pagination = null;

    /**
     * @var null
     */
    private $nextPage = null;

    /**
     * ApiResponse constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $resultSet
     * @param $code
     * @param string $message
     * @param array $headers
     * @return Response
     */
    public function responseView($resultSet, $code = 200, $message = null, $headers = array())
    {
        $data = array();

        if (!is_null($message) && $message !== '') {
            $data = array('message' => $message);
        }

        if (!is_null($this->errors) && count($this->errors) > 0) {
            $data['errors'] = $this->errors;
        }

        if ((is_array($resultSet) && count($resultSet) > 0) || is_object($resultSet)) {
            if (!is_null($this->responseType)) {
                $data[$this->responseType] = $resultSet;
            } else {
                $data = $resultSet;
            }
        }

        if ($this->pagination) {
            $data['pagination'] = $this->pagination;
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode($code);

        if ($this->container->has('serializer')) {

            $json = $this->container->get('serializer')->serialize($data, 'json', array_merge([
                'json_encode_options' => JsonResponse::DEFAULT_ENCODING_OPTIONS,
            ], $this->contextGroups));

            $response->setContent($json);
            return $response;
        }

        $response->setContent($data);

        return $response;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setResponseType($type = 'set')
    {
        $this->responseType = $type;
        return $this;
    }

    /**
     * @param array $groups
     * @return $this
     */
    public function setGroups(array $groups)
    {
        $this->contextGroups = $groups;
        return $this;
    }

    /**
     * @param $error
     * @return $this
     */
    public function setErrors($error)
    {
        $this->errors = $error;
        return $this;
    }

    /**
     * @param $pagination
     * @return $this
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
        return $this;
    }
}
