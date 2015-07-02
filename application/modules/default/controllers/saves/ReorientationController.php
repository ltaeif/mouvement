<?php

/**
 * Controller for table reorientation
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_ReorientationController extends Zend_Controller_Action
{
    public function init()
	{
	
	$this->_helper->layout()->setLayout("home"); 
	//On teste si une autre demande est déposée le meme année : requete sql_regcase
	
	
	
	//si oui 
	
		//on redirect vers la demande crée auparvant et on affiche vous avez créez une demande ....
	
	
	//Si non
	
		//on redirect vers create ReorientationController
	
	}
	
	public function verifAction()
	{
		$type = $this->_getParam('type', 0);
		$id = $this->_getParam('demande_codedem', 0);
		$auth = Zend_Auth::getInstance();
		
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		
	
		$tableDemande = new Application_Model_Reorientation_DbTable();
		
		 $row = $tableDemande->find($id)->current();

        if (!$row) {
                $this->_helper->redirector("create","Reorientation","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
		
		 $this->_helper->redirector("updatedemande","Reorientation","default",array('demande_codedem'=>$id,'type'=>$type));
	}
	
	public function indexAction()
    {
		
	    $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableReorientation = new Application_Model_Reorientation_DbTable();
        $gridSelect = $tableReorientation->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
		
		
		
        $form = new Application_Myforms_EditReorientation();
        $data = array( 'codedem' => $id  );
		$form->populate($data); 
		
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableReorientation = new Application_Model_Reorientation_DbTable();
                $tableReorientation->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableReorientation = new Application_Model_Reorientation_DbTable();
        $form = new Application_Form_EditReorientation();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableReorientation->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableReorientation->update($values, $where);
                    
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
            $tableReorientation = new Application_Model_Reorientation_DbTable();
            $tableReorientation->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	
	
	public function updatedemandeAction()
    {
        $tableReorientation = new Application_Model_Reorientation_DbTable();
        $form = new Application_Myforms_EditReorientation();
        $id = (int) $this->_getParam('demande_codedem', 0);
        $type = $this->_getParam('type', 0);
		
        $row = $tableReorientation->find($id)->current();

        if (!$row) {
            $this->_helper->redirector("create","Reorientation","default",array('demande_codedem'=>$id,'type'=>$type));
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableReorientation->update($values, $where);
                    
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