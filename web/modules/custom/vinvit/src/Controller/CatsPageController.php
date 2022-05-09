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

    $conn = \Drupal::database()->select('vinvit', 'v');
    $conn->fields('v', ['id', 'cat_name', 'email', 'cat_image', 'date']);
    $conn->orderBy('date', 'DESC');
    $results = $conn->execute()->fetchAll();

    return [
      '#theme' => 'cats',
      '#add_form' => $add_form,
      '#cats' => $results,
      '#markup' => 'Hello! You can add here a photo of your cat.',
    ];
  }

}
