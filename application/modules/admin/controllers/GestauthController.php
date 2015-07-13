<?php

class Admin_GestauthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		
    }

    public function indexAction()
    {
        // action body
    }	

public function loginAction()
    {	
	
	$authstr = Zend_Auth::getInstance();

    //$namespace="Zend_Auth_Admin";
    //$authstr->setStorage(new Zend_Auth_Storage_Session($namespace));

	
	if($authstr->getStorage()->read()!=null)
	{	$this->_helper->redirector("home","index","admin");}

	
	
    	//$this->_helper->layout()->disableLayout(); 
    	$this->_helper->layout()->setLayout("auth"); 
    	$auth=new Application_Myforms_Authentification();
		$this->view->error=$this->_getParam("error");
    	$this->view->authform=$auth;
    
    	if ($this->_request->isPost())
    	{
    		 
    		$formData = $this->_request->getPost();
    		 
    		if ($auth->isValid($formData)) {
    
    			$DbAdapter=Zend_Db_Table::getDefaultAdapter();
    
    			$authAdapter = new Zend_Auth_Adapter_DbTable($DbAdapter);
    			$authAdapter->setTableName('authentif');
    			$authAdapter->setIdentityColumn('login');
    			$authAdapter->setCredentialColumn('password');
    
    			// Set the input credential values to authenticate against
    			$authAdapter->setIdentity($formData["email"]);
    			$authAdapter->setCredential($formData["password"]);
    
    			// do the authentication

    			 
    			$result = $authstr->authenticate($authAdapter);
    			

				
    			//	die();
    			if ($result->isValid()) {
    				// success: store database row to auth's storage
    				// system. (Not the password though!)
    				$data = $authAdapter->getResultRowObject(null, 'password');


                    //print_r($data);
                    $authstr->getStorage()->write($data);





    				/*****************init annee scolaire*****************/  
    				try {
    					try {
    						if(!Zend_Session::isStarted()) {
    							// register session
    							Zend_Session::start();
    						}
    					}
    					catch (Exception $e) {
    						echo $e->getMessage();
    					}
    				}
    				catch (Exception $e) {
    					echo $e->getMessage();
    					 
    				}
    				 
    				 
    				/***************************/
    				
    				 // interrogation de la table personnel
    				 //si login est dans personnel pirect module personnel
    				
    				// interrogation de la table inscription
    				//si login est dans personnel redirect module etudiant
    				
    				$this->_helper->redirector("home","index","admin");

    		
    					
    		 
                   // $this->_helper->redirector("index","demande","uma");
    			} else {
    				// failure: clear database row from session
                    $authstr->clearIdentity();
    				
					$this->_helper->redirector("login","gestauth","admin",array('error'=>"err")); 
    				
    				 
    			}
    
    
    		}
    	}
    	
    	
    	$this->view->title="Authentification";
    	$this->view->authform=$auth;
    }
    
    public function logoutAction()
    {
        $this->_helper->layout()->disableLayout();
     	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$auth = Zend_Auth_Admin::getInstance();
    	$auth->clearIdentity(); 
    	$this->_helper->redirector("login","gestauth","admin");
    }
	
	public function nouvelleinscriptAction(){
    	$this->_helper->layout()->disableLayout();
    	
    	$form=new Application_Myforms_Creationcompte();
    	$this->view->form=$form; 
    	
    	$this->view->operation=$this->_getParam("operation");
    }
	public function validermailAction(){
	 }
	
	  
   
    public function verifuserAction(){
    
    	$this->_helper->layout()->disableLayout();
    
    	$user= new Application_Mytables_Etudiant();
    	
    	$mail=(isset($_POST['id']) && $_POST['typedata']=="email") ? $_POST['id'] : "";
    	$cin=(isset($_POST['id'])  && $_POST['typedata']=="cin")? $_POST['id'] : "";
    	$row=$user->lookforuser($cin,$mail);
		
    	$this->view->user=$row;
		
    
    
    }	
	
	
	
	


}







