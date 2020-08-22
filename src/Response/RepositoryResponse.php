<?php
/**
 * Class RepositoryResponse
 * @package App\Response
 * @author Yasin CETINTAS <ysnctnts@gmail.com>
 */

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class RepositoryResponse
{

    private $resultSet;

    /**
     * @var int
     */
    private $totalRecords;

    public function __construct($resultSet, int $totalRecords = 1)
    {
        $this->resultSet = $resultSet;
        $this->totalRecords = $totalRecords;
    }

    /**
     * @return mixed
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }

    /**
     * @param mixed $resultSet
     */
    public function setResultSet($resultSet): void
    {
        $this->resultSet = $resultSet;
    }

    /**
     * @return int
     */
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }


    /**
     * @param int $totalRecords
     * @return $this
     */
    public function setTotalRecords(int $totalRecords)
    {
        $this->totalRecords = $totalRecords;
        return $this;
    }
}