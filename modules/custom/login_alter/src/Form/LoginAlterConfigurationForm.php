<?php

namespace Drupal\login_alter\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TmsSmsConfigurationForm.
 */
class LoginAlterConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'login_alter.loginalterconfiguration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'login_alter_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('login_alter.loginalterconfiguration');
    $form['login_alter_configuration_fieldset'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('
       Configuration Details'),

    ];
    $form['login_alter_configuration_fieldset']['login_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Login URL'),
      '#maxlength' => 100,
      '#size' => 100,
      '#default_value' => $config->get('login_url'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) { 
    $form_values = $form_state->getValues();
    foreach ($form_values as $key => $value) {
      if (!$value || $value == NULL) {
        $form_state->setErrorByName($key, t('Fields cannot be empty.'));
      }
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('login_alter.loginalterconfiguration')
      ->set('login_url', $form_state->getValue('login_url'))
      ->save();
  }

}
