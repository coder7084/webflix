<?php

namespace Movie\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

 class Movie implements InputFilterAwareInterface
 {
     public $id;
     public $year;
     public $title;
     public $price;
     protected $inputFilter;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->year = (!empty($data['year'])) ? $data['year'] : null;
         $this->title  = (!empty($data['title'])) ? $data['title'] : null;
         $this->price  = (!empty($data['price'])) ? $data['price'] : null;
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
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'year',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                    
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
                 'name'     => 'title',
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
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'price',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Float'),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }