<?php

namespace Drupal\learning_hello;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class HelloSalutation.
 */
class HelloSalutation {

  use StringTranslationTrait;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * HelloSalutation constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * Returns the salutation.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup|string
   *   The salutation.
   */
  public function getSalutation() {
    $config = $this->configFactory->get('learning_hello.custom_salutation');
    $salutation = $config->get('salutation');

    if ($salutation !== "" && $salutation) {
      return $salutation;
    }

    $time = new \DateTime();
    if ((int) $time->format('G') >= 0 && (int) $time->format('G') < 12) {
      return $this->t('Good morning world');
    }
    elseif ((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      return $this->t('Good afternoon world');
    }
    else {
      return $this->t('Good evening world');
    }
  }
}
