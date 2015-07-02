<?php

class Application_Mytables_Authentif extends Application_Model_Authentif_DbTable
{	

	public static function getCurrent(){
		$etudiantstore =null;
		$auth = Zend_Auth_Admin::getInstance();
		$etudiantstore=(array)$auth->getStorage()->read();
		return $etudiantstore;
	
	}



			
}





