<?php

/**
 * Controller for table retrait
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_RetraitController extends Zend_Controller_Action
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
		
	
		$tableDemande = new Application_Model_Retrait_DbTable();
		
		 $row = $tableDemande->find($id)->current();

        if (!$row) {
                $this->_helper->redirector("create","Retrait","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
		
		 $this->_helper->redirector("updatedemande","Retrait","default",array('demande_codedem'=>$id,'type'=>$type));
	}
	
	
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableRetrait = new Application_Model_Retrait_DbTable();
        $gridSelect = $tableRetrait->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
		$form = new Application_Form_EditRetrait();
		$data = array( 'codedem' => $id  );
		$form->populate($data); 
		
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableRetrait = new Application_Model_Retrait_DbTable();
                $tableRetrait->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableRetrait = new Application_Model_Retrait_DbTable();
        $form = new Application_Form_EditRetrait();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableRetrait->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableRetrait->update($values, $where);
                    
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
            $tableRetrait = new Application_Model_Retrait_DbTable();
            $tableRetrait->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	
	public function updatedemandeAction()
    {
        $tableRetrait = new Application_Model_Retrait_DbTable();
        $form = new Application_Myforms_EditRetrait();
        $id = (int) $this->_getParam('demande_codedem', 0);
        $type = $this->_getParam('type', 0);
		
        $row = $tableRetrait->find($id)->current();

        if (!$row) {
            $this->_helper->redirector("create","Retrait","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableRetrait->update($values, $where);
                    
                $this->_helper->redirector("details","Demande","default",array('demande_codedem'=>$id,'type'=>$type));
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
		$this->view->type=$type;
    }
}