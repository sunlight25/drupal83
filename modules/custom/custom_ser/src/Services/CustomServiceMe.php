<?php


namespace Drupal\custom_ser\Services\CustomServiceMe;

/**
 * Class CustomServiceMe.
 */
class CustomServiceMe implements DrupaliseMeInterface {
  /*
   * @var \Drupal\Core\Database\Connection $database
   */
  protected $database;

  /**
   * Constructs a new DrupaliseMe object.
   * @param \Drupal\Core\Database\Connection $connection
   */
  public function __construct(Connection $connection) {
    $this->database = $connection;
  }

  public function Drupalise () {
    $query = $this->database->query('SELECT nid FROM {node}');
    $result = $query->fetchAssoc();
    return $result;
  }
}

