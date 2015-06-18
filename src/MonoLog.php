<?php

namespace Systagi\Phalcon\Loggin\Adapter\Monolog;

use Monolog\Logger as MLogger;
use Monolog\Handler\StreamHandler;
use Phalcon\Logger as PLogger;

class MonologAdapter extends Phalcon\Logger\Adapter {

  protected $monolog;


  private $levelMapping = array(
    PLogger::DEBUG    => MLogger::DEBUG,
    PLogger::INFO     => MLogger::INFO,
    PLogger::NOTICE   => MLogger::NOTICE,
    PLogger::WARNING  => MLogger::WARNING,
    PLogger::ERROR    => MLogger::ERROR,
    PLogger::ALERT    => MLogger::ALERT,
    PLogger::EMERGENCY=> MLogger::EMERGENCY
  );


  public function __construct($monolog) {
    $this->monolog = $monolog;
  }

  public function setFormmater($formatter) {

  }

  public function getFormatter() {

  }

  public function setLogLevel($level = PLogger::INFO) {
    
  }

  public function getLogLevel() {

  }

  public function log($type, $message = "", $context = null) {
    $this->monolog->addRecord($this->levelMapping[$type], $message, $context);
  }

  public function begin() {

  }

  public function commit() {}

  public function rollback() {}

  public function close() {}

  public function debug($message, $context = null) {
    $this->monolog->addDebug($message, $context);

  }
  public function error($message, $context = null) {
    $this->monolog->addError($message, $context);
  }
  public function info($message, $context = null) {
    $this->monolog->addInfo($message, $context);
  }
  public function notice($message, $context = null) {
    $this->monolog->addNotice($message, $context);
  }
  public function warning($message, $context = null) {
    $this->monolog->addWarning($message, $context);
  }
  public function alert($message, $context = null) {
    $this->monolog->addAlert($message, $context);
  }
  public function emergency($message, $context = null) {
    $this->monolog->addEmergency($message, $context);
  }
}