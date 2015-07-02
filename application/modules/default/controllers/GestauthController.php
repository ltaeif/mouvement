<?php

class Default_GestauthController extends Zend_Controller_Action
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
	if($authstr->getStorage()->read()!=null) 
	{	$this->_helper->redirector("home","index","default");}
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
    			$authAdapter->setTableName('etudiant');
    			$authAdapter->setIdentityColumn('login');
    			$authAdapter->setCredentialColumn('password');
    
    			// Set the input credential values to authenticate against
    			$authAdapter->setIdentity($formData["email"]);
    			$authAdapter->setCredential($formData["password"]);
    
    			// do the authentication
    			$auth = Zend_Auth::getInstance();
    			 
    			$result = $auth->authenticate($authAdapter);
    			
    			
    			//	die();
    			if ($result->isValid()) {
    				// success: store database row to auth's storage
    				// system. (Not the password though!)
    				$data = $authAdapter->getResultRowObject(null, 'password');
    			  
    				
    				
    				$auth->getStorage()->write($data); 
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
    				 //si login est dans personnel redirect module personnel 
    				
    				// interrogation de la table inscription
    				//si login est dans personnel redirect module etudiant
    				
    				$this->_helper->redirector("home","index","default");
    				 
    		
    					
    		 
                   // $this->_helper->redirector("index","demande","uma");
    			} else {
    				// failure: clear database row from session
    				$auth->clearIdentity();
    				
					$this->_helper->redirector("login","gestauth","default",array('error'=>"err")); 
    				
    				 
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
    	
    	$auth = Zend_Auth::getInstance();
    	$auth->clearIdentity(); 
    	$this->_helper->redirector("login","gestauth","default");
    }
	
	public function nouvelleinscriptAction(){
    	$this->_helper->layout()->disableLayout();
    	
    	$form=new Application_Myforms_Creationcompte();
    	$this->view->form=$form; 
    	
    	$this->view->operation=$this->_getParam("operation");
    }
	public function validermailAction(){
	 }
	
	  
    public function ajaxcreationcompteAction(){
	
    	$this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
    	
    	$etudiant = new Application_Model_Etudiant_DbTable();
    	$inscription = new Application_Model_Inscription_DbTable();
    	 try{
    	$formData = $this->_request->getPost();
		
		$db = Zend_Db_Table::getDefaultAdapter();
    	$db->beginTransaction();
				$data = array(
					"cin"=>$formData['CIN']
					,"nom"=>$formData['nom']
					,"prenom"=>$formData['prenom']
					,"login"=>$formData['email']
					,"password"=>$formData['password']
				) ;
				$id=$inscription->insert($data);
				
				
				$data = array(
						"cin"=>$formData['CIN']
						,"nom"=>$formData['nom']
						//,"code_inscription"=>$id
						,"prenom"=>$formData['prenom']
						,"ville"=>23 //Tunis
						,"pays"=>218 //Tunis
						,"etablissement"=>"4"
						,"login"=>$formData['email']
						,"password"=>$formData['password']
				) ;
				
				$etudiant->insert($data);
				
				$this->dossierupload((int)$formData['CIN']);
		
		
    	 }catch (Zend_Db_Exception $e){
    	 	//echo $e->getMessage();
			echo  Zend_Json_Encoder::encode(array('status' => 'Failed','message'=>'Erreur'.$e->getMessage()));
			$db->rollBack();
    				return;
    	 }
		$db->commit();
    	echo  Zend_Json_Encoder::encode(array('status' => 'success','message'=>'Veulliez consulter votre mail pour recuperer le mot de passe'));
    	
    }
    
    public function verifuserAction(){
    
    	$this->_helper->layout()->disableLayout();
    
    	$user= new Application_Mytables_Etudiant();
    	
    	$mail=(isset($_POST['id']) && $_POST['typedata']=="email") ? $_POST['id'] : "";
    	$cin=(isset($_POST['id'])  && $_POST['typedata']=="cin")? $_POST['id'] : "";
    	$row=$user->lookforuser($cin,$mail);
		
    	$this->view->user=$row;
		
    
    
    }	
	
	  private function dossierupload($CIN){
    	$config = new Zend_Config_Ini(APPLICATION_PATH ."/modules/default/configs/uploadfile.ini");
    	$images=explode(",",$config->images);
    	$docs=explode(",",$config->docs);
    	$demandes=explode(",",$config->demandes);
		$demandesthumb=explode(",",$config->demandes);
    	
    	$dir= $config->pathfiles."/".$CIN."/";
    	if(!(is_dir($dir)))
    	{
    		mkdir($dir, 0777, true);
    	}
    	$dir= $config->pathfiles."/".$CIN."/images/";
    	if(!(is_dir($dir)))
    	{
    		mkdir($dir, 0777, true);
    	}
    	
    	foreach ($images as $value){
    		$dir= $config->pathfiles."/".$CIN."/images/".$value."/";
    		if(!(is_dir($dir)))
    		{
    			mkdir($dir, 0777, true);
    		}
    	}
		
		$dir= $config->pathfiles."/".$CIN."/demandes/";
    	if(!(is_dir($dir)))
    	{
    		mkdir($dir, 0777, true);
    	}
		  	
    	foreach ($demandes as $value){
    		$dir= $config->pathfiles."/".$CIN."/demandes/".$value."/";
    		if(!(is_dir($dir)))
    		{
    			mkdir($dir, 0777, true);
    		}
			
			//on crée pour chaque demande son thumbnail
			$dir= $config->pathfiles."/".$CIN."/demandes/".$value."/"."thumbnail/";
			
			if(!(is_dir($dir)))
    		{
    			mkdir($dir, 0777, true);
    		}
    	}
    	
    	
    	$dir= $config->pathfiles."/".$CIN."/docs/";
    	if(!(is_dir($dir)))
    	{
    		mkdir($dir, 0777, true);
    	}
    	foreach ($docs as $value){
    		$dir= $config->pathfiles."/".$CIN."/docs/".$value."/";
    		if(!(is_dir($dir)))
    		{
    			mkdir($dir, 0777, true);
    		}
    	}
    }
	
	


}







