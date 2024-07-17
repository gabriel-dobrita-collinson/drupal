<?php

namespace Drupal\learning_hello\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\learning_hello\HelloSalutation;

class HelloController extends ControllerBase {

  /**
   * @var HelloSalutation
   */
  protected $helloSalutation;

  /**
   * HelloController constructor.
   *
   * @param HelloSalutation $helloSalutation
   */
  public function __construct(HelloSalutation $helloSalutation) {
    $this->helloSalutation = $helloSalutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('learning_hello.salutation')
    );
  }

  /**
   * Return a salutation.
   */
  public function hello() {
    return [
      '#markup' => $this->helloSalutation->getSalutation(),
    ];
  }
}
