<?php

/**
 * Controller for table directeur
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_DirecteurController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->layout()->setLayout("home");

    }

    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableDirecteur = new Application_Model_Directeur_DbTable();
        $gridSelect = $tableDirecteur->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
        $paginator = Zend_Paginator::factory($gridSelect);
        $paginator->setItemCountPerPage(20)
            ->setCurrentPageNumber($pageNumber);
            
        $this->view->assign(array(
            'paginator' => $paginator,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'pageNumber' => $pageNumber,
        ));
        
        foreach ($this->_getAllParams() as $paramName => $paramValue)
        {
            // prepend 'param' to avoid error of setting private/protected members
            $this->view->assign('param' . $paramName, $paramValue);
        }
    }
    
    public function createAction()
    {
        $form = new Application_Form_EditDirecteur();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableDirecteur = new Application_Model_Directeur_DbTable();
                $tableDirecteur->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableDirecteur = new Application_Model_Directeur_DbTable();
        $form = new Application_Form_EditDirecteur();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableDirecteur->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('id = ?' => $id);
        
                $tableDirecteur->update($values, $where);
                    
                $this->_helper->redirector('index');
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
    }
    
    public function deleteAction()
    {
        $ids = $this->_getParam('del_id', array());
        
        if (!is_array($ids)) {
            $ids = array($ids);
        }

        try{

            if (!empty($ids)) {
                $tableDirecteur = new Application_Model_Directeur_DbTable();
                $tableDirecteur->deleteMultipleIds($ids);
            }


        } catch(Zend_Db_Statement_Exception  $e) {
            $this->_helper->redirector('index');
        }
        
        $this->_helper->redirector('index');
        exit;
    }
}