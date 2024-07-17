<?php

namespace Drupal\learning_hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\learning_hello\HelloSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 */
class HelloController extends ControllerBase {

  /**
   * @var \Drupal\learning_hello\HelloSalutation
   */
  protected $helloSalutation;

  /**
   * HelloController constructor.
   *
   * @param \Drupal\learning_hello\HelloSalutation $helloSalutation
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
