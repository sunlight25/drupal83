<?php

namespace Drupal\custom_ser\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Provides a 'CustomMGProcess' migrate process plugin.
 *
 * @MigrateProcessPlugin(
 *  id = "custom_mgprocess"
 * )
 */
class CustomMGProcess extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Plugin logic goes here.
  }

}
