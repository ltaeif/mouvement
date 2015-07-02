<?php

/**
 * Controller for table demande
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Default_DemandeController extends Zend_Controller_Action
{	
	
	protected $auth =null;
	protected $_etudiantstore = null;
	
	public function init()
	{
		$auth = Zend_Auth::getInstance();
		$this->_helper->layout()->setLayout("home");
		
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		
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
    
	
	
	 public function creerAction()
    {
        //Vérifier si une demande : date de cette année+CIN est déposé 
		
		$type = $this->_getParam('type', 0);
		$auth = Zend_Auth::getInstance();
		
		
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		
	
		$tableDemande = new Application_Mytables_Demande();
		
		$res=$tableDemande->lookfordemande($this->_etudiantstore['cin'],date("Y"));
		
		$this->view->demandeexist=$res;
		
		
		//Si une demande exist pour cette année
		if($res)
		{
			//$this->_helper->redirector('details');
		
			$this->_helper->redirector('details', 'Demande', 'default', array('demande_codedem' => $res['codedem'],
								'type' => $res['type_demande']
					));
		}
		else
		{
			
			
			//sinon on crée une demande
			$form = new Application_Myforms_EditDemande();
			//echo $type ;
			$data = array( 'type_demande' => $type  );
			$form->populate($data);
			/*if($type!=0)
			{$tableDemande = new Application_Model_Demande_DbTable();
			 $row = $tableDemande->getDbSelectByParams(array('type_demande'=>$type));
			 $form->populate($row->toArray());
			
			}*/
			
			
			if ($this->_request->isPost()) {
				if ($form->isValid($this->_request->getPost())) {
					$values = $form->getValues();
						
					$tableDemande = new Application_Model_Demande_DbTable();
					$tableDemande->insert($values);
						
					//$this->_helper->redirector('details');
					$this->_helper->redirector('details', 'Demande', 'default', array('demande_codedem' => $res['codedem'],
								'type' => $type
					));
					exit;
				}
			}
			
			$this->view->form = $form;
		}
		
    }
	
	
	 public function detailsAction()
    {
	
		$auth = Zend_Auth::getInstance();
		
		
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		
	
		//Toutjours chosir la demande de l'année en cours
		$tableDemande = new Application_Mytables_Demande();
		
		$res=$tableDemande->lookfordemande($this->_etudiantstore['cin'],date("Y"));
		
		$this->view->demandeexist=$res;
		
		
			//update db with images in CIN directory
			$auth = Zend_Auth::getInstance();
			$this->_etudiantstore =(array)$auth->getStorage()->read();
			$config = new Zend_Config_Ini(APPLICATION_PATH ."/modules/default/configs/uploadfile.ini");
			$type = $this->_getParam('type', $res['type_demande']);
			$demande_codedem = $this->_getParam('demande_codedem', $res['codedem']);
			
			
			$CIN=$this->_etudiantstore['cin'];
		
			
			/*$dirdemande= $config->pathfiles.$CIN."/demandes/".strtolower($type).'/';
				//Liste le contenu du répertoire dans un tableau
			//$dir_content = scandir($dirdemande);
			 $tableDoc = new Application_Mytables_DocumentsDemande();
			
			
			 //Liste le contenu du répertoire dans un tableau
				 $dir_content = scandir($dirdemande);
				 //Est-ce bien un répertoire?
				 if($dir_content !== FALSE){
					//Pour chaque entrée du répertoire
					  foreach ($dir_content as $entry)
					  {
					   //Raccourcis symboliques sous Unix, on passe
						   if(!in_array($entry, array('.','..'))){
								//On retrouve le chemin par rapport au début
								$entry = $dirdemande . '/' . $entry;
								//Cette entrée n'est pas un dossier: on l'efface
								if(!is_dir($entry)){
									if($tableDoc->look_for_image_demande($entry, $demande_codedem)==false)
									{
										$values = array('demande_codedem'=>$demande_codedem,'file'=>$entry ,'date_upload'=>'Now()');
										$tableDoc = new Application_Model_DocumentsDemande_DbTable();
										$tableDoc->insert($values);
									}
									//echo $entry;
								 
								}
								//Cette entrée est un dossier, on recommence sur ce dossier
								else{
								
								}
						   }
					  }
				 }*/
				
			
			
			
			  
		
		
        
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
            $tableDemande = new Application_Model_Demande_DbTable();
            $tableDemande->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
		
	 public function gestionfichierAction()
    {	
		$auth = Zend_Auth::getInstance();
		$this->_etudiantstore =(array)$auth->getStorage()->read();
		$config = new Zend_Config_Ini(APPLICATION_PATH ."/modules/default/configs/uploadfile.ini");
    	$type = $this->_getParam('type', 0);
		$demande_codedem = $this->_getParam('demande_codedem', 0);
    	$CIN=$this->_etudiantstore['cin'];
    	
		$dir= $config->pathfiles."/".$CIN."/";
		
		$dircin= $config->pathfiles."/".$CIN."/docs/cin";
		$dirdemande= $config->pathfiles.$CIN."/demandes/".strtolower($type).'/';
		
		$directories=array('dircin'=>$dircin,'dirdemande'=>$dirdemande,'cin'=>$CIN,'demande_codedem'=>$demande_codedem);
		
		$this->view->directories=$directories;
		
		
		 
	
    }
	
	
	
	
	

	
	
	
    
}