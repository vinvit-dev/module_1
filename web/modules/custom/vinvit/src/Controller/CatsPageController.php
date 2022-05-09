<?php

namespace Drupal\vinvit\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Cats page controller class.
 */
class CatsPageController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderer array.
   */
  public function content(): array {
    $add_form = \Drupal::formBuilder()->getForm('Drupal\vinvit\Form\CatsForm');
    return [
      '#theme' => 'cats',
      '#add_form' => $add_form,
      '#markup' => 'Hello! You can add here a photo of your cat.',
    ];
  }

}
