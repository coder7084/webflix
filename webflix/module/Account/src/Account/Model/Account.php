<?php

namespace Account\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

 class Account implements InputFilterAwareInterface
 {
     public $id;
     public $first_name;
     public $middle_initial;
     public $last_name;
     public $street, $apt_no, $city, $state, $zip;
     public $exp_date, $eff_date, $balance;
     public $last_accessed;
     public $movie_id_1, $movie_id_2, $movie_id_3;
     protected $inputFilter;

     //Changes Table Column names to $data index/value pairs
     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->first_name = (!empty($data['first_name'])) ? $data['first_name'] : null;
         //$this->middle_initial =  (!empty($data['middle_initial'])) ? $data['middle_initial'] : null;
         $this->last_name  = (!empty($data['last_name'])) ? $data['last_name'] : null;
         $this->street  = (!empty($data['street'])) ? $data['street'] : null;
         $this->apt_no  = (!empty($data['apt_no'])) ? $data['apt_no'] : null;
         $this->city  = (!empty($data['city'])) ? $data['city'] : null;
         $this->state  = (!empty($data['state'])) ? $data['state'] : null;
         $this->zip  = (!empty($data['zip'])) ? $data['zip'] : null;
         $this->eff_date  = (!empty($data['eff_date'])) ? $data['eff_date'] : null;
         $this->exp_date  = (!empty($data['exp_date'])) ? $data['exp_date'] : null;
         $this->balance  = (!empty($data['balance'])) ? $data['balance'] : null;
         $this->last_accessed  = (!empty($data['last_accessed'])) ? $data['last_accessed'] : null;
         $this->movie_id_1 = (!empty($data['movie_id_1'])) ? $data['movie_id_1'] : null;
         $this->movie_id_2 = (!empty($data['movie_id_2'])) ? $data['movie_id_2'] : null;      
         $this->movie_id_3 = (!empty($data['movie_id_3'])) ? $data['movie_id_3'] : null;      
     }
     
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     
       public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'digits',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 11,
                             'max'      => 11,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'first_name',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 50,
                         ),
                     ),
                 ),
             ));
             
            /*  $inputFilter->add(array(
                 'name'     => 'middle_initial',
                 'required' => false,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 0,
                             'max'      => 1,
                         ),
                     ),
                 ),
             ));
            */

             $inputFilter->add(array(
                 'name'     => 'last_name',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 50,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'street',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 50,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'apt_no',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'digits',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 10,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'city',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 20,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'state',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 5,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'zip',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 50,
                         ),
                     ),
                 ),
             ));
             
              $inputFilter->add(array(
                 'name'     => 'eff_date',
                 'required' => false,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'date',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 10,
                         ),
                     ),
                 ),
             ));
             
              $inputFilter->add(array(
                 'name'     => 'exp_date',
                 'required' => false,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'date',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 10,
                         ),
                     ),
                 ),
             ));
             
              $inputFilter->add(array(
                 'name'     => 'balance',
                 'required' => false,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'digits',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 10,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }