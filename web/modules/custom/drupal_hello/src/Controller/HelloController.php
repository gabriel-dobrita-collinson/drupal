<?php

namespace Drupal\drupal_hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  public function hello() {
    return [
      '#markup' => $this->t('Hello, World!'),
    ];
  }
}
