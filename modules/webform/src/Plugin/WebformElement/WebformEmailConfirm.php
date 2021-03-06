<?php

namespace Drupal\webform\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'email_confirm' element.
 *
 * @WebformElement(
 *   id = "webform_email_confirm",
 *   label = @Translation("Email confirm"),
 *   description = @Translation("Provides a form element for double-input of email addresses."),
 *   category = @Translation("Advanced elements"),
 *   states_wrapper = TRUE,
 * )
 */
class WebformEmailConfirm extends Email {

  /**
   * {@inheritdoc}
   */
  public function getDefaultProperties() {
    $default_properties = parent::getDefaultProperties() + [
      // Email confirm settings.
      'confirm__title' => '',
      'confirm__description' => '',
      'confirm__placeholder' => '',
    ];
    unset($default_properties['multiple']);
    return $default_properties;
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $form['email_confirm'] = [
      '#type' => 'details',
      '#title' => $this->t('Email confirm settings'),
      '#open' => TRUE,
    ];
    $form['email_confirm']['confirm__title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email confirm title'),
    ];
    $form['email_confirm']['confirm__description'] = [
      '#type' => 'webform_html_editor',
      '#title' => $this->t('Email confirm description'),
    ];
    $form['email_confirm']['confirm__placeholder'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email confirm placeholder'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function getElementSelectorInputsOptions(array $element) {
    return [
      'mail_1' => $this->getAdminLabel($element) . '1 [' . $this->t('Email') . ']',
      'mail_2' => $this->getAdminLabel($element) . ' 2 [' . $this->t('Email') . ']',
    ];
  }

}
