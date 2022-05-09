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
    $response->addCommand(new OpenModalDialogCommand('', $delete_form,
      [
        'width' => 350,
        'height' => 80,
      ]
    ));

    return $response;
  }

  /**
   * Return modal window with edit form.
   */
  public function edit($id): AjaxResponse {
    $response = new AjaxResponse();

    $conn = \Drupal::database()->select('vinvit', 'v');
    $conn->fields('v', ['id', 'cat_name', 'email', 'cat_image']);
    $conn->condition('id', $id);
    $results = $conn->execute()->fetchAssoc();

    $edit_form = \Drupal::formBuilder()->getForm('Drupal\vinvit\Form\CatsForm', $results);
    $response->addCommand(new OpenModalDialogCommand('', $edit_form, ['width' => 500]));

    return $response;
  }

}
