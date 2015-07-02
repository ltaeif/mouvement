<?php

/**
 * Controller for table demande
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_DemandeController extends Zend_Controller_Action
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
        
        $tableDemande = new Application_Model_Demande_DbTable();
        $gridSelect = $tableDemande->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
        $form = new Application_Form_EditDemande();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableDemande = new Application_Model_Demande_DbTable();
                $tableDemande->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableDemande = new Application_Model_Demande_DbTable();
        $form = new Application_Form_EditDemande();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableDemande->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
				
                $where = array('codedem = ?' => $id);
        
                $tableDemande->update($values, $where);
                    
                $this->_helper->redirector("index","demande","admin");
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
       /* $ids = $this->_getParam('del_id', array());
        
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        
        if (!empty($ids)) {
            $tableDemande = new Application_Mytables_Demande();
            $tableDemande->deleteMultipleIds($ids);
        }
        
         $this->_helper->redirector("index","demande","admin");
        exit;
		*/
    }
	
	
	
	  public function desactiverAction()
    {
		/*$ids = $this->_getParam('del_id', array());
        
        if (!is_array($ids)) {
            $ids = array($ids);
			
			
        }
		//$str ="(";
		$str.= implode (", ", $ids);
        //$str .=")";
		
		//echo $str;exit;
		
        if (!empty($ids)) {
            $tableDemande = new Application_Mytables_Demande();
			
			$where = array('`codedem` in ?' => "(".$str.")");
			
			
			//$values =array('deleted'=> 1);
			$values =array('deleted' => '1');
			 
            $tableDemande->update($values,$where);
			exit;
        }
        
        $this->_helper->redirector("index","demande","admin");
        exit;*/
    }
	
	
	  public function decisionAction()
    {
        $tableDemande = new Application_Model_Demande_DbTable();
        $form = new Application_Myforms_EditDemande();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableDemande->find($id)->current();

        if (!$row) {
             $this->_helper->redirector("index","demande","admin");
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
				
                $where = array('codedem = ?' => $id);
        
                $tableDemande->update($values, $where);
                    
                $this->_helper->redirector("index","demande","admin");
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
    }
	
	 public function detailsAction()
    {
	
	}
    
}