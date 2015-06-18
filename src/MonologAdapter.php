<?php

namespace Systagi\Phalcon\Logger\Adapter\Monolog;

use \Monolog\Logger as MLogger;
use \Monolog\Handler\StreamHandler;
use \Phalcon\Logger as PLogger;

class MonologAdapter extends \Phalcon\Logger\Adapter {

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

  public function log($type, $message = null, array $context = array()) {
    if ($message == null) {
      $message = $type;
      $type = PLogger::INFO;
    }
    $this->monolog->addRecord($this->levelMapping[$type], $message, $context);
  }
  public function logInternal($message, $type, $time, $context) {
    $this->monolog->addRecord($this->levelMapping[$type], $message, $context);
  }
  public function begin() {

  }

  public function commit() {}

  public function rollback() {}

  public function close() {}

  public function debug($message, array $context = array()) {
    $this->monolog->addDebug($message, $context);

  }
  public function error($message, array $context  = array()) {
    $this->monolog->addError($message, $context);
  }
  public function info($message, array $context = array()) {
    $this->monolog->addInfo($message, $context);
  }
  public function notice($message, array $context = array()) {
    $this->monolog->addNotice($message, $context);
  }
  public function warning($message, array $context = array()) {
    $this->monolog->addWarning($message, $context);
  }
  public function alert($message, array $context = array()) {
    $this->monolog->addAlert($message, $context);
  }
  public function emergency($message, array $context = array()) {
    $this->monolog->addEmergency($message, $context);
  }
}