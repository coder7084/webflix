<?php

 namespace Movie\Model;

 use Zend\Db\TableGateway\TableGateway;

 class MovieTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getMovie($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         //var_dump($rowset); exit; 
         $row = $rowset->current();
         
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveMovie(Movie $movie)
     {
         $data = array(
             'year' => $movie->year,
             'title'  => $movie->title,
         );

         $id = (int) $movie->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getMovie($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Movie id does not exist');
             }
         }
     }

     public function deleteMovie($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }