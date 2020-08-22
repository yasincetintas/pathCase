<?php

/**
 * Class ApiPagination
 * @package App\Response
 * @author Yasin CETINTAS <ysnctnts@gmail.com>
 */

namespace App\Response;

/**
 * @Serializer\ExclusionPolicy("none")
 */
class ApiPagination
{
    /**
     * @var int
     */
    private $pageCount = 1;

    /**
     * @var int
     */
    private $recordCount = 0;

    /**
     * @var int
     */
    private $itemsPerPage = 20;

    /**
     * @var string
     */
    private $firstLink = '';

    /**
     * @var string
     */
    private $lastLink = null;

    /**
     * @var string
     */
    private $prevLink = '';

    /**
     * @var string
     */
    private $nextLink = '';

    /**
     * @var int
     */
    private $currentPage = 1;

    /**
     * @var bool
     */
    private $circular = false;


    /**
     * ApiPagination constructor.
     * @param int|null $itemsPerPage
     * @param int|null $recordCount
     * @param int $offset
     * @param bool $circular
     */
    public function __construct(int $itemsPerPage = null, int $recordCount = null, int $offset = 0, bool $circular = false)
    {
        $this->itemsPerPage = (is_null($itemsPerPage) || $itemsPerPage == 0) ? 1 : $itemsPerPage;
        $this->recordCount = $recordCount ?? 0;
        $pageCalc = (int) ceil($this->recordCount / $this->itemsPerPage);
        $this->pageCount = $pageCalc <= 0 ? 1 : $pageCalc;
        $this->currentPage = $this->calculatePage($offset);
        $this->circular = $circular;
        $this->setFirstLink()->setLastLink()->setPrevLink()->setNextLink();
    }

    /**
     * @return int
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param $pageCount
     * @return $this
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecordCount()
    {
        return $this->recordCount;
    }

    /**
     * @param $recordCount
     * @return $this
     */
    public function setRecordCount($recordCount)
    {
        $this->recordCount = $recordCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstLink()
    {
        return $this->firstLink;
    }

    /**
     * @param string|null $firstLink
     * @return $this
     */
    public function setFirstLink(string $firstLink = null)
    {
        if (!is_null($firstLink)) {
            $this->firstLink = $firstLink;
            return $this;
        }
        if ($this->recordCount < $this->itemsPerPage) {
            $this->firstLink = null;
            return $this;
        }
        $this->firstLink = '?offset=0&limit='.$this->itemsPerPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastLink()
    {
        return $this->lastLink;
    }

    /**
     * @param string|null $lastLink
     * @return $this
     */
    public function setLastLink(string $lastLink = null)
    {
        if (!is_null($lastLink)) {
            $this->lastLink = $lastLink;
            return $this;
        }
        if ($this->recordCount < $this->itemsPerPage) {
            $this->lastLink = null;
            return $this;
        }
        $offset = ($this->pageCount - 1) * $this->itemsPerPage;
        $this->lastLink = '?offset='.$offset.'&limit='.$this->itemsPerPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrevLink()
    {
        return $this->prevLink;
    }

    /**
     * @param string|null $prevLink
     * @return $this
     */
    public function setPrevLink(string $prevLink = null)
    {
        if (!is_null($prevLink)) {
            $this->prevLink = $prevLink;
            return $this;
        }
        if ($this->currentPage == 1) {
            $this->prevLink = '';
            if ($this->circular) {
                $offset = ($this->pageCount - 1) * $this->itemsPerPage;
                $this->prevLink = '?offset='.$offset.'&limit='.$this->itemsPerPage;
            }
        } else {
            if (($this->currentPage) - 1 <= 0 && !is_null($this->currentPage)) {
                $this->prevLink = null;
            } else {
                $offset = ($this->currentPage - 2) * $this->itemsPerPage;
                $this->prevLink = '?offset='.$offset.'&limit='.$this->itemsPerPage;
            }
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getNextLink()
    {
        return $this->nextLink;
    }

    /**
     * @param string|null $nextLink
     * @return $this
     */
    public function setNextLink(string $nextLink = null)
    {
        if (!is_null($nextLink)) {
            $this->nextLink = $nextLink;
            return $this;
        }
        if ($this->currentPage == $this->pageCount) {
            $this->nextLink = '';
            if ($this->circular) {
                $this->nextLink = '?offset=0&limit='.$this->itemsPerPage;
            }
        } else {
            if ($this->currentPage == $this->pageCount) {
                $this->nextLink = null;
            } else {
                $offset = ($this->currentPage) * $this->itemsPerPage;
                $this->nextLink = '?offset='.$offset.'&limit='.$this->itemsPerPage;
            }
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @param int $itemsPerPage
     * @return $this
     */
    public function setItemsPerPage(int $itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCircular()
    {
        return $this->circular;
    }

    /**
     * @param bool $circular
     * @return $this
     */
    public function setCircular(bool $circular)
    {
        $this->circular = $circular;
        return $this;
    }

    /**
     * @param int $offset
     * @return int
     */
    protected function calculatePage(int $offset)
    {
        $pageCount = (int) ceil($this->recordCount / $this->itemsPerPage);
        $closerCount = $this->recordCount - $offset;

        if ($closerCount < $this->itemsPerPage) {
            return $pageCount == 0 ? 1 : $pageCount;
        }

        if ($offset < $this->itemsPerPage) {
            return (int) 1;
        }

        if ($offset >= $this->itemsPerPage) {
            $page = (int) round($offset / $this->itemsPerPage, 0, PHP_ROUND_HALF_UP) + 1;

            return $page;
        }

        $page = 1;

        return $page;
    }

    /**
     * @return array
     */
    public function getConvertObject()
    {

        $pagination = array();

        $pagination['totalPage']    = self::getPageCount();
        $pagination['totalResult']  = self::getRecordCount();
        $pagination['currentPage']  = self::getCurrentPage();
        //$pagination['itemsPerPage'] = self::getItemsPerPage();
        //$pagination['firstLink']    = self::getFirstLink();
        //$pagination['lastLink']     = self::getLastLink();
        //$pagination['prevLink']     = self::getPrevLink();
        //$pagination['nextLink']     = self::getNextLink();
        //$pagination['circular']     = self::getCircular();

        return $pagination;
    }
}