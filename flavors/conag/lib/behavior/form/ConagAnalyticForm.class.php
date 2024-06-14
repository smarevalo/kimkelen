<?php

/**
 * Analytic form.
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
class ConagAnalyticForm extends AnalyticForm
{
  public function configure()
  {
      parent::configure();
      $this->unsetFields();
      //$this->setWidget('observations', new sfWidgetFormInput());
      $this->setWidget('matriz', new sfWidgetFormInput(array('label' => 'Matriz:')));
      $this->setWidget('folio', new sfWidgetFormInput(array('label' => 'Folio:')));
      $this->setWidget('cue', new sfWidgetFormInput(array('label' => 'C.U.E.:')));
      $this->setWidget('egreso', new sfWidgetFormInput(array('label' => 'Egreso/Pase:')));
  }
  
  public function unsetFields()
  {
    unset(
      $this['description'],
      $this['id'],
      $this['career_student_id'],
      $this['certificate'],
      $this['created_at'],
      $this['certificate_number'],
      $this['observations'],
      $this['matriz'],
      $this['folio'],
      $this['cue'], 
      $this['egreso']   
    );
  }
}
