<?php

namespace Drupal\vinvit\Form;

/**
 * @file
 * Contains \Drupal\vinvit\Form\DeleteForm.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Cats delete form class.
 */
class DeleteForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'cats_del_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL): array {
    $form['question'] = [
      '#markup' => '<p class="delete-question">' . $this->t('You really want ot delete it?') . '</p>',
    ];
    $form['actions']['delete'] = [
      '#type' => 'submit',
      '#value' => $this->t("Delete"),
    ];
    $form['id'] = [
      '#type' => 'hidden',
      '#value' => $id,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $id = $form_state->getValue('id');

    $conn = \Drupal::database()->delete('vinvit');
    $conn->condition('id', $id);
    $conn->execute();

    $form_state->setRedirect('vinvit.main');
    \Drupal::messenger()->addStatus($this->t("Delete successful"));
  }

}
