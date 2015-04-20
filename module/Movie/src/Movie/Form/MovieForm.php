<?php

namespace Movie\Form;

use Zend\Form\Form;

 class MovieForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('movie');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         
         $this->add(array(
             'name' => 'title',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Title',
             ),
         ));
         $this->add(array(
             'name' => 'year',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Year',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));     
         
        /*  $this->add(array(
             'name' => 'selected_1',
             'type' => 'checkbox'              
         ));
         
          $this->add(array(
             'name' => 'selected_2',
             'type' => 'checkbox'
             
         ));
         
          $this->add(array(
             'name' => 'selected_3',
             'type' => 'checkbox'
             
         )); */
         
         
         for ($i=1; $i<=50; $i++ )
         {
           $this->add(array(
             'name' => 'selected_'.$i,
             'type' => 'checkbox'              
         ));
           
           $this->add(array(
             'name' => 'movie_id_' .$i,
             'type' => 'Hidden'             
           ));
         }
         
        /* $this->add(array(
             'name' => 'movie_id_2',
             'type' => 'Hidden'             
         ));
         
         $this->add(array(
             'name' => 'movie_id_3',
             'type' => 'Hidden'             
         )); */
     }
 }