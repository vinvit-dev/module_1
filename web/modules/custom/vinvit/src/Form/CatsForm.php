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
      '#attributes' => [
        'title' => $this->t('Minimal length is 2 and maximum length is 32 characters')
      ],
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Your email:'),
      '#required' => true,
      '#attributes' => [
        'title' => $this->t('The email can only contain Latin letters, an underscore, or a hyphen.')
      ],
      '#ajax' => [
        'event' => 'change',
        'callback' => '::emailAjax'
      ]
    ];

    $form['cat_image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Your cat’s image:'),
      '#required' => true,
      '#attributes' => [
        'title' => $this->t('Valid extensions: jpeg, jpg, png. Max file size 2MB'),
      ],
      '#upload_location' => 'public://vinvit/cats',
      '#upload_validators' => [
        'file_validate_extensions' => ['jpeg jpg png'],
        'file_validate_size' => [2100000]
      ],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add cat'),
      '#ajax' => [
        'callback' => '::ajaxSubmit'
      ]
    ];
    return $form;
  }


  /**
   * Ajax callback function for email
   *
   * @param array $form
   * @param FormStateInterface $form_state
   * @return AjaxResponse
   */
  public function emailAjax(array &$form, FormStateInterface $form_state): AjaxResponse
  {
    $response = new AjaxResponse();

    if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new MessageCommand($this->t('Invalid email'), null, ["type" => "error"]));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '2px solid red']));
    } else {
      $response->addCommand(new MessageCommand(null));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '1px solid black']));
    }

    return $response;
  }

  /**
   * Ajax callback function for submit
   *
   * @param array $form
   * @param FormStateInterface $form_state
   * @return AjaxResponse
   */
  public function ajaxSubmit(array &$form, FormStateInterface $form_state): AjaxResponse
  {
    $response = new AjaxResponse();

    if (strlen($form_state->getValue('cat_name')) < 2 || strlen($form_state->getValue('cat_name')) > 32) {
      $response->addCommand(new MessageCommand($this->t('Invalid name length'), null, ["type" => "error"]));
    } elseif (preg_match('/[^-_@.A-Za-z]/', $form_state->getValue('email'))) {
      $response->addCommand(new MessageCommand($this->t('The email can only contain Latin letters, an underscore, or a hyphen.'), null, ["type" => "error"]));
      $response->addCommand(new CssCommand('#edit-email', ['border' => '2px solid red']));
    } else {
      $response->addCommand(new CssCommand('#edit-email', ['border' => '1px solid black']));
      $response->addCommand(new MessageCommand($this->t('All good')));
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
  }
}
