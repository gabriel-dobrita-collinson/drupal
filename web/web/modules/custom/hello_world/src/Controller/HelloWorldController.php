<?php

namespace Drupal\hello_world\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloWorldController {
  public function content() {
    return new Response('Hello,sssssss World!');
  }

  public function secondRoute() {
    return new Response('This is thsse second route.');
  }
}
