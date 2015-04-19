<?php

namespace Account\Form;

use Zend\Form\Form;


 class AccountForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('account');

         $this->add(array(
             'name' => 'id',
             'type' => 'Text',
             'attributes' => array(
                 'disabled' => true,
                'class' => 'account_id'
             ),
              'options' => array(
                 'label' => 'Account # ',   
                 
             ), 
             
         ));
         $this->add(array(
             'name' => 'first_name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'First Name ',
             ),
         ));
        /* $this->add(array(
             'name' => 'middle_initial',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Middle Initial',
             ),
         )); */
         $this->add(array(
             'name' => 'last_name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Last Name ',
             ),
         ));
          $this->add(array(
             'name' => 'street',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Street ',
             ),
         ));
          $this->add(array(
             'name' => 'apt_no',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Apt # ',
             ),
         ));
          $this->add(array(
             'name' => 'city',
             'type' => 'Text',
             'options' => array(
                 'label' => 'City ',
             ), 
         ));
          $this->add(array(
             'name' => 'state',
             'type' => 'Text',
             'options' => array(
                 'label' => 'State ',
             ),
              
         ));
          $this->add(array(
             'name' => 'zip',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Zip ',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit ',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
           $this->add(array(
             'name' => 'movie_id_1',
             'type' => 'Hidden'             
         ));
         
         $this->add(array(
             'name' => 'movie_id_2',
             'type' => 'Hidden'             
         )); 
          $this->add(array(
             'name' => 'movie_id_3',
             'type' => 'Hidden'             
         )); 
          
       
     }
 }