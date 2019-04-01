<?php

namespace Drupal\custom_ser\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CustomBlock' block.
 *
 * @Block(
 *  id = "custom_block",
 *  admin_label = @Translation("Custom Block"),
 * )
 */
class CustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#title' => 'Websolutions Agency',
      '#description' => 'Websolutions Agency is the industry leading Drupal development agency in Croatia'
    ];
  }
}
