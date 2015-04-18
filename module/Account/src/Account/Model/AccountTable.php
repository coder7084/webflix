<?php

namespace Account\Model;

use Zend\Db\TableGateway\TableGateway;

class AccountTable
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

    public function getAccount($id)
    {
        //$id  = (String) $id;
        //var_dump($id);
        $rowset = $this->tableGateway->select(array('id' => $id));
        //var_dump($rowset);exit;
        $row = $rowset->current();  
            
        if (!$row) {
           // throw new \Exception("Could not find row $id");
            return FALSE;    
        } 
          
        return $row;
    }

    public function saveAccount(Account $account)
    {   
        date_default_timezone_set('US/Central');  
        
        $data = array(
        'id' => $account->id,
        'first_name' => $account->first_name,
        //'middle_initial' => $account->middle_initial,
        'last_name'  => $account->last_name,
        'street' => $account->street,
        'apt_no' => $account->apt_no,
        'city' => $account->city,
        'state' => $account->state,
        'zip' => $account->zip,         
        'last_accessed' => date('Y-m-d H:i:s', time()),
        'eff_date' => date('Y-m-d'),
         'exp_date' => '99991231', //date('Y-m-d', strtotime('+1 month')),
         'balance' => '10.00',
         'movie_id_1' => $account->movie_id_1,
         'movie_id_2' => $account->movie_id_2,
         'movie_id_3' => $account->movie_id_3,
        ); 
        
        $id = (String) $account->id;
        //var_dump($id); exit;
        
       if ( $this->getAccount($id) === FALSE ) 
        {
            //Only for new accounts
            /* array_push($data, array(
              'eff_date' => date('Y-m-d'),
              'exp_date' => '99991231', //date('Y-m-d', strtotime('+1 month')),
              'balance' => '10.00',
            )); */
            
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAccount($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Account id does not exist');
            }
        }
    }


    public function deleteAccount($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}