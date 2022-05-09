<?php

namespace Drupal\vinvit\Form;

/**
 * @file
 * Contains \Drupal\vinvit\Form\CatsForm.
 */

use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\file\Entity\File;

/**
 * Cats form class.
 */
class CatsForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'cats_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $edit = NULL): array {
    $form['cat_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your cat’s name:'),
      '#required' => TRUE,
      '#maxlength' => 32,
      '#attributes' => [
        'title' => $this->t('Minimal length is 2 and maximum length is 32 characters'),
      ],
      '#default_value' => (isset($edit['cat_name'])) ? $edit['cat_name'] : '',
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#required' => TRUE,
      '#attributes' => [
        'title' => $this->t('The email can only contain Latin letters, an underscore, or a hyphen.'),
      ],
      '#default_value' => (isset($edit['email'])) ? $edit['email'] : '',
      '#ajax' => [
        'event' => 'change',
        'callback' => '::emailAjax',
      ],
    ];

    $form['cat_image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Your cat’s image:'),
      '#required' => TRUE,
      '#description' => $this->t('Valid extensions: jpeg, jpg, png. Max file size 2MB'),
      '#multiple' => FALSE,
      '#upload_location' => 'public://vinvit/cats',
      '#upload_validators' => [
        'file_validate_extensions' => ['jpeg jpg png'],
        'file_validate_size' => [2100000],
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#ajax' => [
        'callback' => '::ajaxSubmit',
      ],
      '#value' => (isset($edit['id'])) ? $this->t('Edit') : $this->t('Add cat'),
    ];
    return $form;
  }

  /**
   * Ajax callback function for email.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   JSON response object for AJAX requests.
   */
  public function emailAjax(array &$form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();

    if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new MessageCommand($this->t('Invalid email'), NULL, ["type" => "error"]));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '2px solid red']));
    }
    else {
      $response->addCommand(new MessageCommand(NULL));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '1px solid black']));
    }

    return $response;
  }

  /**
   * Ajax callback function for email.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   JSON response object for AJAX requests.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Exception
   */
  public function ajaxSubmit(array &$form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();

    if (strlen($form_state->getValue('cat_name')) < 2 || strlen($form_state->getValue('cat_name')) > 32) {
      $response->addCommand(new MessageCommand($this->t('Invalid name length'), NULL, ["type" => "error"]));
    }
    elseif (preg_match('/[^-_@.A-Za-z]/', $form_state->getValue('email'))) {
      $response->addCommand(new MessageCommand($this->t('The email can only contain Latin letters, an underscore, or a hyphen.'), NULL, ["type" => "error"]));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '2px solid red']));
    }
    else {

      $fields['cat_name'] = $form_state->getValue('cat_name');
      $fields['email'] = $form_state->getValue('email');

      $fid = $form_state->getValue('cat_image');
      $file = File::load($fid[0]);
      $file->setPermanent();
      $file->save();
      $path = $file->getFileUri();
      $fields['cat_image'] = file_create_url($path);

      $now = \Drupal::time()->getCurrentTime();
      $fields['date'] = \Drupal::service('date.formatter')->format($now, 'custom', 'Y/m/d H:i:s');

      $conn = \Drupal::database()->insert('vinvit');
      $conn->fields($fields)->execute();

      $response->addCommand(new CssCommand('#edit-email', ['border' => '1px solid black']));
      $response->addCommand(new MessageCommand($this->t('All good')));
    }
    return $response;
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
  }

}
