<?php

/**
 * Controller for table mutation
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_MutationController extends Zend_Controller_Action
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
        
        $tableMutation = new Application_Model_Mutation_DbTable();
        $gridSelect = $tableMutation->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
        $form = new Application_Form_EditMutation();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableMutation = new Application_Model_Mutation_DbTable();
                $tableMutation->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableMutation = new Application_Model_Mutation_DbTable();
        $form = new Application_Form_EditMutation();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableMutation->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableMutation->update($values, $where);
                    
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
            $tableMutation = new Application_Model_Mutation_DbTable();
            $tableMutation->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
	
	  public function detailsAction()
    {
	
	 $tableMutation = new Application_Model_Mutation_DbTable();
        $form = new Application_Myforms_EditMutation();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableMutation->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('codedem = ?' => $id);
        
                $tableMutation->update($values, $where);
                    
                $this->_helper->redirector('index');
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
		
		
		//Fichiers
		  
        $tableDemande = new Application_Model_Demande_DbTable();
    
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableDemande->find($id)->current();
		$auth = Zend_Auth::getInstance();
		
		$config = new Zend_Config_Ini(APPLICATION_PATH ."/modules/default/configs/uploadfile.ini");
    	$type = $this->_getParam('type_demande', 0);
		$demande_codedem = $this->_getParam('id', 0);
		$ar=$row->toArray();
    	$CIN=$ar['CIN'];
    	
		$dir= $config->pathfiles."/".$CIN."/";
		
		$dircin= $config->pathfiles."/".$CIN."/docs/cin";
		$dirdemande= $config->pathfiles.$CIN."/demandes/".strtolower($type).'/';
		
		$directories=array('dircin'=>$dircin,'dirdemande'=>$dirdemande,'cin'=>$CIN,'demande_codedem'=>$demande_codedem);
		
		$this->view->directories=$directories;
		
		
	}
}