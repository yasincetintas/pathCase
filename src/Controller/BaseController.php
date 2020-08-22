<?php
/**
 * Class BaseController
 * @package App\Controller
 * @author Yasin CETINTAS <ysnctnts@gmail.com>
 */

namespace App\Controller;

use App\Exceptions\ValidationException;
use App\Response\ApiPagination;
use App\Response\RepositoryResponse;
use App\Util\Request\Request;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Response\ApiResponse;

class BaseController extends Controller
{
    public const CONTENT_TYPE = 'application/json';
    private const RESPONSE_FORMAT = 'json';

    /**
     * @var TranslatorInterface
     */
    public $translator;
    /**
     * @var
     */
    public $redis;
    /**
     * @var null
     */
    private $contextGroups = null;
    /**
     * @var string
     */
    private $responseType = null;
    /**
     * @var array
     */
    private $errors = [];
    /**
     * @var ApiResponse
     */
    private $apiResponse;
    /**
     * @var int
     */
    private $perPage = 10;
    /**
     * @var int
     */
    private $offset = 0;
    /**
     * @var int
     */
    private $recordCount = 0;
    /**
     * @var bool
     */
    private $single = false;
    /**
     * @var Request
     */
    private Request $requestUtil;

    /**
     * BaseController constructor.
     * @param TranslatorInterface $translator
     * @param ApiResponse $apiResponse
     * @param Request $requestUtil
     */
    public function __construct(
        TranslatorInterface $translator,
        ApiResponse $apiResponse,
        Request $requestUtil
    )
    {
        $this->translator = $translator;
        $this->apiResponse = $apiResponse;
        $this->requestUtil = $requestUtil;
    }

    /**
     * @param $data
     * @param int $httpStatusCode
     * @param null $message
     * @return Response
     */
    public function response($data, $httpStatusCode = 200, $message = null)
    {
        if (count($this->errors) > 0) {
            $this->apiResponse->setErrors($this->errors);
        }
        $resultSet = $data instanceof RepositoryResponse ? $data->getResultSet() : $data;
        $resultSet = $this->single && is_array($resultSet) ? $resultSet[0] : $resultSet;
        $pagination = $this->recordCount == 0 || count($this->errors) > 0 ? null : (new ApiPagination($this->perPage, $this->recordCount, $this->offset))->getConvertObject();
        if ($this->contextGroups) {
            $this->apiResponse->setGroups($this->contextGroups);
        }
        return $this->apiResponse
            ->setPagination($pagination)
            ->setResponseType($this->responseType)
            ->responseView(
                $resultSet,
                $httpStatusCode,
                $this->translator->trans($message)
            );
    }

    /**
     * @param $request
     * @param null $recordCount
     * @return mixed
     */
    public function queryToFilter($request, $recordCount = null)
    {
        if ($recordCount) {
            $this->recordCount = $recordCount;
        }
        $filter['limit'] = $this->perPage;
        foreach ($request->query->all() as $key => $value) {
            $filter[$key] = $value;
        }
        $filter['offset'] = isset($filter['offset']) ? $filter['offset'] : 0;
        $this->offset = $filter['offset'];
        $filter['limit'] = intval($filter['limit']) == 0 ? null : $filter['limit'];
        $this->perPage = $filter['limit'];
        return $filter;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setResponseType($type)
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
        $this->errors[] = $this->translator->trans($error);
        return $this;
    }

    /**
     * @param $entity
     * @return ObjectRepository
     */
    public function getRepo($entity)
    {
        return $this->getDoctrine()->getRepository($entity);
    }

    /**
     * @param string $contentType
     */
    protected function validateContentType(string $contentType): void
    {
        if (self::CONTENT_TYPE !== $contentType) {
            throw new ValidationException(
                $this->translator->trans('messages.critical.content_type'),
                Response::HTTP_UNSUPPORTED_MEDIA_TYPE
            );
        }
    }

    /**
     * @param $data
     * @param $model
     */
    protected function validateRequest($data, $model)
    {
        $this->requestUtil->validate($data,$model);
    }
}
