<?php

/**
 * Controller for table etudes
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_EtudesController extends Zend_Controller_Action
{	

	public function init()
    {
       $this->_helper->layout()->setLayout("home"); 
    }
	
    public function indexAction()
    {	
		$cin = $this->_getParam('cin', 1);
		if($cin!=1){}
		else  		
    		$this->_helper->redirector("espace","etudiant","default");
		
		
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableEtudes = new Application_Mytables_Etudes();
        $gridSelect = $tableEtudes->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
		
		$cin = $this->_getParam('cin', 1);
		if($cin!=1){}
		else  		
    		$this->_helper->redirector("espace","etudiant","default");
			
        $form = new Application_Myforms_EditEtudes();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableEtudes = new Application_Model_Etudes_DbTable();
                $tableEtudes->insert($values);
                    
               $this->_helper->redirector("index","etudes","default",array('cin'=>$cin));
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {	
	
	$cin = $this->_getParam('cin', 1);
		if($cin!=1){}
		else  		
    		$this->_helper->redirector("espace","etudiant","default");
			
        //$tableEtudes = new Application_Model_Etudes_DbTable();
		$tableEtudes = new Application_Model_Etudes_DbTable();
		
        //$form = new Application_Form_EditEtudes();
		$form = new Application_Myforms_EditEtudes();
		
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableEtudes->find($id)->current();

        if (!$row) {
		
                $this->_helper->redirector("index","etudes","default",array('cin'=>$cin));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('idetudes = ?' => $id);
        
                $tableEtudes->update($values, $where);
                    
                    $this->_helper->redirector("index","etudes","default",array('cin'=>$cin));
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
        
		$auth = Zend_Auth::getInstance();
		
		$ids = $this->_getParam('del_id', array());
        
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        
        if (!empty($ids)) {
            $tableEtudes = new Application_Model_Etudes_DbTable();
            $tableEtudes->deleteMultipleIds($ids);
        }
        
      $this->_helper->redirector("index","etudes","default",array('cin'=>$auth->getStorage()->read()->cin));
        exit;
    }
	
	/*
	   public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableEtudes = new Application_Model_Etudes_DbTable();
        $gridSelect = $tableEtudes->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
	*/
}