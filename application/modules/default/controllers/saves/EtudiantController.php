<?php

/**
 * Controller for table etudiant
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_EtudiantController extends Zend_Controller_Action
{	
	
	public function init()
    {
       $this->_helper->layout()->setLayout("home"); 
    }
	
	
	
	public function espaceAction()
    {
       
    }
	
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $gridSelect = $tableEtudiant->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
        $form = new Application_Myforms_EditEtudiant();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableEtudiant = new Application_Model_Etudiant_DbTable();
                $tableEtudiant->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {	
		$cin = $this->_getParam('cin', 0);
		if($cin!=0){}
		else  		
    		$this->_helper->redirector("espace","etudiant","default");
			
        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $form = new Application_Myforms_EditEtudiant();
      
        
        $row = $tableEtudiant->find($cin)->current();

        if (!$row) {
            $this->_helper->redirector("espace","etudiant","default",array('cin'=>$cin));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('cin = ?' => $cin);
        
                $tableEtudiant->update($values, $where);
                    
                $this->_helper->redirector("espace","etudiant","default",array('cin'=>$cin));
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
            $tableEtudiant = new Application_Model_Etudiant_DbTable();
            $tableEtudiant->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	
	
	
	 public function updateloginAction()
    {	
		$cin = $this->_getParam('cin', 0);
		if($cin!=0){}
		else  		
    		$this->_helper->redirector("espace","etudiant","default");
			
        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $form = new Application_Myforms_EditEtudiantLogin();
      
        
        $row = $tableEtudiant->find($cin)->current();

        if (!$row) {
            $this->_helper->redirector("espace","etudiant","default",array('cin'=>$cin));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('cin = ?' => $cin);
        
                $tableEtudiant->update($values, $where);
                    
                $this->_helper->redirector("espace","etudiant","default",array('cin'=>$cin));
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
    }
	
}