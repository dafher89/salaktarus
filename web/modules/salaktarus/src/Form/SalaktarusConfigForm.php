<?php


namespace Drupal\salaktarus\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Class SalaktarusConfigForm
 *
 * @package Drupal\salaktarus\Form
 */
class SalaktarusConfigForm extends ConfigFormBase
{
  /**
   * @return string
   */
  public function getFormId()
  {
    return 'salaktarus_admin_settings';
  }

  /**
   * Gets the configuration names that will be editable
   *
   * @return array
   *  an array of configuration object name that are editable if called in conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames()
  {
    return [
      'salaktarus.settings',
    ];
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('salaktarus.settings');

    $form['message'] = [
      '#type'=> 'textarea',
      '#title'=> $this->t('Welcome message'),
      '#description'=>$this->t('welcome message display to ysers wheb they login'),
      '#default_value'=>$config->get('message'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $config = $this->config('salaktarus.settings');
    $config->set('message', $form_state->getValue('message'))->save();
  }

}
