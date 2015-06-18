<?php
namespace Systagi\Phalcon\Loggin\Adapter\Monolog;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LogstashFormatter;


class Logstash extends MonoLog {
  public function __construct($appId, $serverId, $level, $path) {
    // construct the monolog
    $monolog = new Logger();
    $handler = new StreamHandler($path, $level);
    $formatter = new LogstashFormatter($appId, $serverId);

    $handler->setFormatter($formatter);
    $logger->pushHandler($handler);

    $this->monolog = $monolog;
  }
}