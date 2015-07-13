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
                $namespace="Zend_Auth";
                $authstr->setStorage(new Zend_Auth_Storage_Session($namespace));
    			 
    			$result = $auth->authenticate($authAdapter);
    			
    			
    			//	die();
    			if ($result->isValid()) {
    				// success: store database row to auth's storage
    				// system. (Not the password though!)
    				$data = $authAdapter->getResultRowObject(null, 'password');

                    //test de if user confirm its profile or not

                        $user_model=new Application_Mytables_Etudiant();

                        $data_user=$user_model->find($data->cin)->current();

                        if($data_user['actif']=='Non'){
                            $auth = Zend_Auth::getInstance();
                            $auth->clearIdentity();

                            $this->_helper->redirector("envoyervalidermail","gestauth","default");
                            //echo  Zend_Json_Encoder::encode(array('status' => 'erreur','message'=>'valider votre compte'));
                            return;
                        }
    				
    				
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



    public function validermailAction()
    {


    }

    public function envoyervalidermailAction()
    {

        $this->urlconfirmer='';

    }

    public function saisircinAction()
    {


    }

    public function getinfosAction()
    {

        $id= rtrim($this->_getParam('email','')) ;
        $cin= rtrim($this->_getParam('cin','')) ;

        if($id=='')
        {
            $this->view->email='';

        }
        else
        {



            $this->view->email=$id;
            $this->view->cin=$cin;

            //after submit cin et email

            if ($this->_request->isPost())
            {

                $db = Zend_Db_Table::getDefaultAdapter();
                $db->beginTransaction();

                $user_model = new Application_Mytables_Etudiant();
                $data_user=null;
                $row=null;
                $row = $user_model->fetchRow(" login='" . rtrim($id) . "' and cin=".$cin);


                if($row==null)
                {

                    $this->view->errors="Cin et Email incompatibles";
                }
                else
                {

                    $data_user=$row->toArray();

                    try {
                        $user = array(
                          "id" => $id
                        , "nom" => $data_user['nom']
                        , "prenom" => $data_user['prenom']
                        , "email" => $data_user['login']
                        );

                        $mail_text = "' Bonjour {NOM} {PRENOM},\r\n L''université de Manouba vous demande de Connecter a travers l''url suivant : {URL}\r\n\r\nCoordialement";
                        $mail_text = str_ireplace("{NOM}", $data_user['nom'], $mail_text);
                        $mail_text = str_ireplace("{PRENOM}", $data_user['prenom'], $mail_text);
                        $url = $this->view->serverUrl();
                        //	$encryptdata=   $this->getEnc($id) ;
                        $encryptdata = Myhelper_Utils_Library::crypt((int)$data_user['cin']);
                        $urlt = $url . "/mouvement/public/gestauth/confirmer/id/$encryptdata";
                        $mail_text = str_ireplace("{URL}", $urlt, $mail_text);

                        $this->SendMailValidinscription($user, $mail_text, array('sujet' => "Lien d'authentification"));
                        $this->view->success="envoie avec succés";


                    } catch (Zend_Db_Exception $e) {
                        $this->view->messages = array('DbError' => $e->getMessage());
                        $db->rollBack();
                        return;
                    }
                    $db->commit();


                }



            }
            else
            {


            }




        }


    }

    public function confirmerAction()
    {

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id= $this->_getParam('id') ;

        try{
            $id= (Myhelper_Utils_Library::decrypt ( urldecode($id) ))  ;
            $candidat=new Application_Mytables_Etudiant();
            $id= rtrim($id);

            $candidat->update(array("actif" => 'Oui'), "cin=".rtrim($id) ) ;

            $row= $candidat->fetchRow( "cin=".rtrim($id))->toArray();

            $mailtype=array(
                "sujet" => "bienvenue"
            );

            $user=array(
             "id"=> $id
            ,"nom"=> $row['nom']
            ,"prenom"=> $row['prenom']
            ,'email' =>  $row['login']
            );



            $mail_text="Bonjour {NOM} {PRENOM};\r\nL’université de Manouba vous invite à visiter son site web http://www.uma.rnu.tn .\r\nNous vous remercions pour la confiance que vous nous accorde et on vous souhaite une bonne chance dans votre demande\r\nCordialement \r\nUniversité de Manouba \r\n";
            $mail_text=str_ireplace("{NOM}", $row['nom'], $mail_text);
            $mail_text=str_ireplace("{PRENOM}", $row['prenom'], $mail_text);
            $this->SendMailValidinscription($user,$mail_text,array('sujet'=>'Bienvenu'));


            try{
                //connexion automatique à l'espace de mouvement


                 $auth = Zend_Auth::getInstance();

                $user_model=new Application_Mytables_Etudiant();
                $data_user=  $user_model->fetchRow( "cin=".rtrim($id))->toArray();
                $dataobj=(object) $data_user;

                $auth->getStorage()->write($dataobj);

                $this->_helper->redirector("home","index","default");



            }catch(Zend_Exception $e ){
                echo $e->getMessage();
                die();
            }





        }catch(Zend_Db_Exception $e){

            echo  $e->getMessage();

        }

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
                        ,"actif"=>"Non"
				) ;
				
				$etudiant->insert($data);
				
				$this->dossierupload((int)$formData['CIN']);


             //Envoi de l'email de validation



                                 try{
                                     $user=array(
                                     "id"=> $id
                                     ,"nom"=>$formData['nom']
                                     ,"prenom"=>$formData['prenom']
                                     ,"email"=>$formData['email']
                                     );

                                     $mail_text="' Bonjour {NOM} {PRENOM},\r\n L''université de Manouba  vous remerci de votre confiance et vous demande de confirmer votre inscription a notre réseau à travers l''url suivant : {URL}\r\n\r\nCoordialement";
                                     $mail_text=str_ireplace("{NOM}", $formData['nom'], $mail_text);
                                     $mail_text=str_ireplace("{PRENOM}", $formData['prenom'], $mail_text);
                                     $url=$this->view->serverUrl();
                                     //	$encryptdata=   $this->getEnc($id) ;
                                     $encryptdata=Myhelper_Utils_Library::crypt((int)$formData['CIN']);
                                     $urlt  =$url."/inscription/gestauth/confirmer/id/$encryptdata" ;
                                     $mail_text=str_ireplace("{URL}", $urlt, $mail_text);

                                     $this->SendMailValidinscription($user,$mail_text,array('sujet'=>"Confirmation d'inscription"));


                                 }catch (Zend_Db_Exception $e) {
                                     $this->view->messages = array('DbError' => $e->getMessage());
                                     $db->rollBack();
                                     return;
                                 }
                                 $db->commit();
                                 $this->_helper->redirector("validermail","gestauth","inscription");
		
		
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


    ///used for decript url
    private function hex2bin($h)
    {
        if (!is_string($h)) return null;
        $r='';
        for ($a=0; $a<strlen($h); $a+=2) {
            $r.=chr(hexdec($h{$a}.$h{($a+1)}));
        }
        return $r;
    }


    private   function getEnc($input)
    {
        $encrypt = new  Zend_Filter_Encrypt(array( 'algorithm'=>$this->algo, 'adapter'=>'mcrypt','key' => $this->key,'vector'=>$this->vector));
        $encrypted = $encrypt->filter($input);
        return bin2hex($encrypted);
    }

    private   function getDec($input)
    {

        $decrypt = new Zend_Filter_Decrypt(array( 'algorithm'=>$this->algo, 'adapter'=>'mcrypt','key' => $this->key,'vector'=>$this->vector));
        return   $decrypt->filter($this->hex2bin($input)) ;
    }

    private function SendMailValidinscription($user,$sujet,$typemail=NULL,$idcompteuser=""){

        /*
        $bootstrap = $this->getInvokeArg('bootstrap');
        $aConfig = $bootstrap->getOptions();
        echo $aConfig['email']['username'];exit;
        $_aMailConfig = array(

        'username' => $aConfig['email']['username']
        ,'password' => $aConfig['email']['password']
        ,'ssl' => $aConfig['email']['ssl']
        ,'port' => $aConfig['email']['port']);

        $_strSmtp = $aConfig['email']['server'];

        $transport = new Zend_Mail_Transport_Smtp($_strSmtp, $_aMailConfig);
        */

        $mail = new Zend_Mail();

        $mail->setBodyText($sujet);
        $mailfrom="uma.mouvement@gmail.com";
        $mail->setFrom("<$mailfrom>", 'UMA Scolarité');
        $emailto=$user['email'];
        $mail->addTo("<$emailto>", 'un destinataire');
        $mail->setSubject($typemail['sujet'] );
        $mail_sended=$mail->send();
        if($mail_sended ){

        }

    }




}







