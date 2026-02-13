<?php

namespace ITMobile\ITMobileCommon\Logging;

use Psr\Log\LoggerInterface;

trait LazyLogs
{
    protected ?LoggerInterface $logger = null;

    protected function logger(): LoggerInterface
    {
        if ($this->logger === null) {
            $className = class_basename($this);
            $this->logger = ServiceLogger::for($className);
        }

        return $this->logger;
    }
}
