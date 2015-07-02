<?php

/**
 * Controller for table report
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_ReportController extends Zend_Controller_Action
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
		
	
		$tableDemande = new Application_Model_Report_DbTable();
		
		 $row = $tableDemande->find($id)->current();

        if (!$row) {
                $this->_helper->redirector("create","Report","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
		
		 $this->_helper->redirector("updatedemande","Report","default",array('demande_codedem'=>$id,'type'=>$type));
	}
	
	
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableReport = new Application_Model_Report_DbTable();
        $gridSelect = $tableReport->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
		$form = new Application_Myforms_EditReport();
		$data = array( 'codedem' => $id  );
		$form->populate($data); 
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableReport = new Application_Model_Report_DbTable();
                $tableReport->insert($values);
                    
                $this->_helper->redirector("details","Demande","default",array('demande_codedem'=>$id,'type'=>$type));
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableReport = new Application_Model_Report_DbTable();
        $form = new Application_Myforms_EditReport();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableReport->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableReport->update($values, $where);
                    
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
            $tableReport = new Application_Model_Report_DbTable();
            $tableReport->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	
	public function updatedemandeAction()
    {
        $tableReport = new Application_Model_Report_DbTable();
        $form = new Application_Myforms_EditReport();
        $id = (int) $this->_getParam('demande_codedem', 0);
        $type = $this->_getParam('type', 0);
		
        $row = $tableReport->find($id)->current();

        if (!$row) {
            $this->_helper->redirector("create","Report","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableReport->update($values, $where);
                    
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