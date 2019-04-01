<?php

namespace Drupal\custom_ser\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * Class EmployeeRegister.
 */
class EmployeeRegister extends FormBase {

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;
  /**
   * Constructs a new EmployeeRegister object.
   */
  public function __construct(
    AccountProxyInterface $current_user
  ) {
    $this->currentUser = $current_user;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'employee_register';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['type'] = array(
        '#type' => 'radios',
        '#options' => array(
            '0' =>t('DOC'),
            '1' =>t('PDF')
        ),
    );
    $form['pid'] = array(
        '#type' => 'textfield',
        '#title' => t('ID:'),
        '#required' => FALSE
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
        '#attributes'=> ['class'=>['glyphicon', 'glyphicon-search']],
    );

    $form['#theme'] = 'my_awesome_form';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
