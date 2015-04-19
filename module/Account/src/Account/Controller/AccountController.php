<?php

namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Account\Model\Account;
use Account\Form\AccountForm;
use Zend\Form\Element;

class AccountController extends AbstractActionController
{

    protected $accountTable;

    public function indexAction()
    {

        return new ViewModel(array(
            'accounts' => $this->getAccountTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new AccountForm();
        $form->get('submit')->setValue('Add');



        $element = new Element\Text('my-text');
        $element->setLabel('Please note your account #')
                ->setLabelAttributes(array('class' => 'note-label'));


        $request = $this->getRequest();
        if ($request->isPost())
        {
            $account = new Account();
            $form->setInputFilter($account->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid())
            {

                $account->exchangeArray($form->getData());
                $account->movie_id_1 = '';
                $account->movie_id_2 = '';
                $account->movie_id_3 = '';
                $this->getAccountTable()->saveAccount($account);

                // Redirect to list of Accounts
                return $this->redirect()->toRoute('movie', array(
                            'id' =>  $account->id,
                                //'action' => 'edit'                      
                ));
            }
        }
        return array('form' => $form, 'element' => $element);
    }

    public function editAction()
    {
        //var_dump($_POST); exit;

        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id)
        {
            return $this->redirect()->toRoute('account', array(
                        'action' => 'add'
            ));
        }

        // Get the Account with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $account = $this->getAccountTable()->getAccount($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('account', array(
                        'action' => 'index'
            ));
        }

        $form = new AccountForm();
        $form->bind($account);
        $form->get('submit')->setAttribute('value', 'Edit');


        $request = $this->getRequest();
        if ($request->isPost())
        {
            $form->setInputFilter($account->getInputFilter());
            //$form->setData($request->getPost());

            $k = 1;
            for ($i = 0; $i <= 50; $i++)
            {
                if ($request->getPost('selected_' . $i) == '1')
                {
                    if ($k <= 3)
                    {
                        $account->{'movie_id_' . $k} = $request->getPost('movie_id_' . $i);
                        $k++;
                    }
                }
                //echo $request->getPost('movie_id_'.$i);
            }

            //var_dump($account); exit;

            if ($form->isValid())
            {
                $this->getAccountTable()->saveAccount($account);

                // Redirect to list of accounts
                return $this->redirect()->toRoute('account');
            }
        }


        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        if (!$id)
        {
            return $this->redirect()->toRoute('account');
        }

        $request = $this->getRequest();
        if ($request->isPost())
        {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes')
            {
                $id = (int) $request->getPost('id');
                $this->getAccountTable()->deleteAccount($id);
            }

            // Redirect to list of accounts
            return $this->redirect()->toRoute('account');
        }

        return array(
            'id' => $id,
            'account' => $this->getAccountTable()->getAccount($id)
        );
    }

    public function getAccountTable()
    {
        if (!$this->accountTable)
        {
            $sm = $this->getServiceLocator();
            $this->accountTable = $sm->get('Account\Model\AccountTable');
        }

        //var_dump($this->accountTable); 
        return $this->accountTable;
    }

}
