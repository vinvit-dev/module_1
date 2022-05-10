<?php

namespace Drupal\vinvit\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

/**
 * Cats list admin/structure page controller class.
 */
class CatsListController extends ControllerBase {

  /**
   * Returns a page.
   *
   * @return array
   *   A renderer array.
   */
  public function content(): array {
    $conn = \Drupal::database()->select('vinvit', 'v');
    $conn->fields('v', ['id', 'cat_name', 'email', 'cat_image', 'date']);
    $conn->orderBy('date', 'DESC');
    $results = $conn->execute()->fetchAll();

    return [
      '#theme' => 'cats-list',
      '#cats' => $results,
      '#markup' => 'Hello! Here you can edit cats list items!',
    ];
  }

  /**
   * Returns delete form into modal dialog window.
   */
  public function deleteAll(): AjaxResponse {
    $response = new AjaxResponse();

    $delete_form = \Drupal::formBuilder()->getForm('Drupal\vinvit\Form\DeleteForm');
    $response->addCommand(new OpenModalDialogCommand('Delete', $delete_form, ['width' => 350]));

    return $response;
  }

}
