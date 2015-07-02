<?php

/**
 * Controller for table chparcours
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class ChparcoursController extends Zend_Controller_Action
{
    	public function init()
	{$this->_helper->layout()->setLayout("home"); 
	}
			public function verifAction()
	{
		$type = $this->_getParam('type', 0);
		$id = $this->_getParam('demande_codedem', 0);
		$auth = Zend_Auth::getInstance();
		
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		
	
		$tableDemande = new Application_Model_Chparcours_DbTable();
		
		 $row = $tableDemande->find($id)->current();

        if (!$row) {
                $this->_helper->redirector("create","Chparcours","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
		
		 $this->_helper->redirector("updatedemande","Chparcours","default",array('demande_codedem'=>$id,'type'=>$type));
	}
	
	
	public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableChparcours = new Application_Model_Chparcours_DbTable();
        $gridSelect = $tableChparcours->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
        
		
		$type = $this->_getParam('type', 0);
		$id = $this->_getParam('demande_codedem', 0);
		$form = new Application_Form_EditChparcours();
		$data = array( 'codedem' => $id  );
		$form->populate($data); 
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableChparcours = new Application_Model_Chparcours_DbTable();
                $tableChparcours->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableChparcours = new Application_Model_Chparcours_DbTable();
        $form = new Application_Form_EditChparcours();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableChparcours->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableChparcours->update($values, $where);
                    
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
        
        if (!empty($ids)) {
            $tableChparcours = new Application_Model_Chparcours_DbTable();
            $tableChparcours->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	
	
	public function updatedemandeAction()
    {
        $tableChparcours = new Application_Model_Chparcours_DbTable();
        $form = new Application_Myforms_EditChparcours();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableChparcours->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableChparcours->update($values, $where);
                    
                $this->_helper->redirector('index');
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
    }
}