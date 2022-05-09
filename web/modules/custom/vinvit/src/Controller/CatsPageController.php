<?php

namespace Drupal\vinvit\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;

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

  /**
   * Return modal window with delete form.
   */
  public function delete($id): AjaxResponse {
    $response = new AjaxResponse();

    $delete_form = \Drupal::formBuilder()->getForm('Drupal\vinvit\Form\DeleteForm', $id);
    $response->addCommand(new OpenModalDialogCommand('Delete', $delete_form, ['width' => 600]));

    return $response;
  }

}
