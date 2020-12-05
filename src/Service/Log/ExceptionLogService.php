<?php

namespace App\Service\Log;

use Psr\Log\LoggerInterface;

class ExceptionLogService implements CustomLogInterface
{
    /**
     * @var LoggerInterface 
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function add($level, $message)
    {
        $this->logger->$level($message);
    }
}