<?php
namespace Systagi\Phalcon\Logger\Adapter\Monolog;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LogstashFormatter;


class Logstash extends MonologAdapter {
  public function __construct($channel, $appId, $serverId, $path, $level = Logger::INFO) {
    // construct the monolog
    $monolog = new Logger($channel);
    $handler = new StreamHandler($path, $level);
    $formatter = new LogstashFormatter($appId, $serverId);

    $handler->setFormatter($formatter);
    $monolog->pushHandler($handler);

    $this->monolog = $monolog;
  }
}