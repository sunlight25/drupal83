<?php

namespace Drupal\custom_ser\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Provides a 'CustomSer' migrate source.
 *
 * @MigrateSource(
 *  id = "custom_ser"
 * )
 */
class CustomSer extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {

    // Source data is queried from 'curling_games' table.
    $query = $this->select('test', 'ts')
      ->fields('ts', [
          'id',
          'title',
          'body',
        ]);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
     $fields = [
      'id' => $this->t('id'),
      'title'   => $this->t('title'),
      'place'   => $this->t('body'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'ts',
      ],
    ];
  }
  
  /**
   * {@inheritdoc}
   */
  /*public function prepareRow(Row $row) {
    // This example shows how source properties can be added in
    // prepareRow(). The source dates are stored as 2017-12-17
    // and times as 16:00. Drupal 8 saves date and time fields
    // in ISO8601 format 2017-01-15T16:00:00 on UTC.
    // We concatenate source date and time and add the seconds.
    // The same result could also be achieved using the 'concat'
    // and 'format_date' process plugins in the migration
    // definition.
    $date = $row->getSourceProperty('date');
    $time = $row->getSourceProperty('time');
    $datetime = $date . 'T' . $time . ':00';
    $row->setSourceProperty('datetime', $datetime);
    return parent::prepareRow($row);
  }*/

}
