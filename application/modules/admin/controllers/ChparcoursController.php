<?php

/**
 * Controller for table chparcours
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_ChparcoursController extends Zend_Controller_Action
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

       //print_r($this->_getAllParams());
        
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
        $form = new Application_Form_EditChparcours();
            
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
	
	
		
	 public function detailsAction()
    {	
	
	
		$tableChparcours = new Application_Model_Chparcours_DbTable();
        $form = new Application_Myforms_EditChparcours();
        $id = (int) $this->_getParam('id', 0);
        
		
        $row = $tableChparcours->find($id)->current();
		
		//var_dump( $row);exit;
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