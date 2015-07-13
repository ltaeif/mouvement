<?php

class Admin_IndexController extends Zend_Controller_Action
{
	
	
	public function init()
	{
		/* Initialize action controller here */ 
		$this->_helper->layout()->setLayout("home"); 
		
	}
	
    public function indexAction()
    {
		 $tableDemande = new Application_Mytables_Demande();
	   $this->view->demandes= $tableDemande->fetchALL();
	  $tableDemande = new Application_Mytables_Etudiant();
		 $this->view->etudiants= $tableDemande->fetchALL();


    }
    
    public function quituesAction(){
    	
    }
	
	
	public function homeAction(){
	 $tableDemande = new Application_Mytables_Demande();
	$this->view->demandes= $tableDemande->fetchALL();
	  $tableDemande = new Application_Mytables_Etudiant();
        $this->view->etudiants= $tableDemande->fetchALL();






    }
	
	public function dashboardAction(){
	
    	
    }
}
