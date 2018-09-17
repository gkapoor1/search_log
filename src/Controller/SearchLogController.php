<?php

namespace Drupal\search_log\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * Search_log.
   *
   * @return string
   *   Return Hello string.
   */
  public function search_log() {
    $query = \Drupal::database()->select('search_log', 'search_log');
    $query->fields('search_log', ['searchterm', 'language', 'qid', 'counter', 'result']);

    $results = $query->execute()->fetchAll();;
    foreach ($results as $key => $value) {
      $row[] = [$value->qid, $value->searchterm, $value->language, $value->counter, $value->result];
    }
    return [
      '#type' => 'table',
      '#caption' => $this->t('search_log_list'),
      '#header' => [
        $this->t('qid'),
        $this->t('searchterm'),
        $this->t('language'),
        $this->t('counter'),
        $this->t('result'),
      ],
      '#rows' => $row,
    ];
  }

  /**
   * Search_history.
   *
   * @return string
   *   Return Hello string.
   */
  public function search_history() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: search_history'),
    ];
  }

}
