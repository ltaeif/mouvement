<?php

class Application_Mytables_Etudiant extends Application_Model_Etudiant_DbTable
{	

	public static function getCurrent(){
		$etudiantstore =null;
		$auth = Zend_Auth::getInstance();
		$etudiantstore=(array)$auth->getStorage()->read();
		
		return $etudiantstore;
	
	}


	public function lookforuser($cin="", $mail=""){
		$constraint="";
		if(!empty($cin)){
			$constraint=" etudiant.cin = '$cin'";
		}
		if(!empty($mail)){
			$constraint.=!empty($constraint) ? " AND  etudiant.login = '$mail'" :"etudiant.login = '$mail'" ;
		}
		
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		
		$selector->setIntegrityCheck(false);
		
		/*$selector->join("inscription", "inscription.cin=etudiant.cin");
		
		//$selector->columns(array("cin"=>"etudiant.cin","login"=>"etudiant.login","cin2"=>"inscription.cin","login2"=>"inscription.login"));
		
		$constraint2="";
		if(!empty($cin)){
			$constraint2=" AND inscription.cin = '$cin'";
		}
		if(!empty($mail)){
			$constraint2.=!empty($constraint) ? " AND  inscription.login = '$mail'" :"inscription.login = '$mail'" ;
		}
		*/
		//$constraint.=$constraint2;
		
		$selector->where($constraint);
		
		$record =$this->fetchRow($selector);
		if($record){
			return $record->toArray();
		}else{
			return false;
		}
	}
			
}





