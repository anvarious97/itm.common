<?php

namespace ITMobile\ITMobileCommon\Logging;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Psr\Log\LoggerInterface;
use Stringable;

class ServiceLogger implements LoggerInterface
{
    protected LoggerInterface $logger;

    protected static array $channels = [];

    protected function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function for(string $serviceName): static
    {
        $snake = Str::snake($serviceName);

        if (!isset(static::$channels[$snake])) {
            $dailyConfig = config('logging.channels.daily');

            static::$channels[$snake] = Log::build([
                'driver' => 'daily',
                'path' => storage_path("logs/services/{$snake}.log"),
                'level' => $dailyConfig['level'] ?? 'debug',
                'days' => $dailyConfig['days'] ?? 0,
                'replace_placeholders' => true,
            ]);
        }

        return new static(static::$channels[$snake]);
    }

    /* =======================
     * PSR-3 Proxy
     * ======================= */

    public function emergency(Stringable|string $message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }

    public function alert(Stringable|string $message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }

    public function critical(Stringable|string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    public function error(Stringable|string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    public function warning(Stringable|string $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    public function notice(Stringable|string $message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    public function info(Stringable|string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function debug(Stringable|string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    public function log($level, Stringable|string $message, array $context = []): void
    {
        $this->logger->log($level, $message, $context);
    }
}
