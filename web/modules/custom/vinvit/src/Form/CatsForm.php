<?php

namespace Drupal\vinvit\Form;

/**
 * @file
 * Contains \Drupal\vinvit\Form\CatsForm.
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Cats form class
 */
class CatsForm extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId(): string
  {
    return 'cats_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array
  {
    $form['cat_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#required' => true,
      '#maxlength' => 32,
      '#atribute' => [
        'title' => 'Minimal length is 2 and maximum length is 32 characters'
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    if(strlen($form_state->getValue('cat_name')) < 2 || strlen($form_state->getValue('cat_name')) > 32) {
      $form_state->setErrorByName('cat_name', "Invalid cat name length!");
    } else
    {
      \Drupal::messenger()->addStatus("All good!");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
  }
}
