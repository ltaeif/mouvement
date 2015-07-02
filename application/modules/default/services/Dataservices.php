<?php
 require_once('Zend/Loader.php');

class Application_Modules_Default_Service_Dataservices{
	

	
	public function __construct(){
		 Zend_Loader::registerAutoload();
	
	}
	
	public function __destruct(){
		
	}
	/**
	 * Roles method
	 *
	 * @param String $idrole
	 *
	 * @return String
	 */
	public function Roles($idrole){
		
		
    	$useralldroit=new Application_Model_Mapper_Compteuser();
    	
    	$alldroit=$useralldroit->getAllInforRoles($idrole);
    	
    	 
		
		
	 
	}
	
}