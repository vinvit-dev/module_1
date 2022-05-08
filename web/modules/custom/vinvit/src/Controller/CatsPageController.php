<?php

namespace Drupal\vinvit\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Cats page controller class.
 */
class CatsPageController extends ControllerBase
{

  /**
   * Returns a page.
   *
   * @return array
   *   A renderer array.
   */
    public function content(): array
    {
        return [
          '#theme' => 'cats',
          '#markup' => 'Hello! You can add here a photo of your cat.',
        ];
    }
}
