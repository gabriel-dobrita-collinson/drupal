<?php

namespace Drupal\learning_rest_api\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a Learning Resource.
 *
 * @RestResource(
 *   id = "learning_resource",
 *   label = @Translation("Learning Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/hello"
 *   }
 * )
 */
class LearningResource extends ResourceBase {

  /**
   * Responds to entity GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {
    $response = ['message' => 'Hello, this is a rest service'];
    return new ResourceResponse($response);
  }

}
