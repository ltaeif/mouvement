<?php

/**
 * Controller for table parcours
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_ParcoursController extends Zend_Controller_Action
{	
	public function init()
	{$this->_helper->layout()->setLayout("home"); 
	}
	
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableParcours = new Application_Model_Parcours_DbTable();
        $gridSelect = $tableParcours->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
		
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
       // $this->getFrontController()->getRequest()->setParams($_GET);
        $parametablissement = $this->_getParam('etablissement', '');
        $this->view->assign('parametablissement' , $parametablissement);

        $form = new Application_Myforms_EditParcours();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                $diplome=new Application_Mytables_Diplome();
                $rowdiplome=$diplome->find($values ['diplome_specialite'])->current();
                $tablibelle=array();
                $tablibelle=explode(' ',$rowdiplome->getLibelle());
                $values ['code']=$tablibelle[0][0].$tablibelle[1][0].'/'.$values ['domaine'].'/'.$values ['mention'].'/'.$values ['diplome_specialite'];
                //print_r($values);exit;

                    
                $tableParcours = new Application_Model_Parcours_DbTable();
                $tableParcours->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableParcours = new Application_Model_Parcours_DbTable();
        $form = new Application_Myforms_EditParcours();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableParcours->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $diplome=new Application_Mytables_Diplome();
                $rowdiplome=$diplome->find($values ['diplome_specialite'])->current();
                $tablibelle=array();
                $tablibelle=explode(' ',$rowdiplome->getLibelle());
                $values ['code']=$tablibelle[0][0].$tablibelle[1][0].'/'.$values ['domaine'].'/'.$values ['mention'].'/'.$values ['diplome_specialite'];
                //print_r($values);exit;


                $where = array('id = ?' => $id);
        
                $tableParcours->update($values, $where);
                    
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
            $tableParcours = new Application_Model_Parcours_DbTable();
            $tableParcours->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
}