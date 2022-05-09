<?php

namespace Drupal\pets\Form;

/**
 * @file
 * Contains \Drupal\vinvit\Form\CatsDeleteForm.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Cats delete form class.
 */
class CatsDeleteForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId(): string {
    return 'cats_delete_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['text'] = [
      '#markup' => '<div id="delete_text">' . $this->t('You realy wont to delete it?') . '</div>',
    ];

    $form['actions']['delete'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete'),
      '#attributes' => [
        'class' => ['btn-delete'],
      ],
    ];

    $form['cat_id'] = [
      '#type' => 'hidden',
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}
