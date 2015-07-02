<?php

class Application_Mytables_DocumentsDemande extends Application_Model_DocumentsDemande_DbTable
{	
	public function look_for_image_demande($file="", $demande_codedem="")
	{
		$constraint="";
		if(!empty($file)){
			$constraint=" documents_demande.file = '$file'";
		}
		if(!empty($mail)){
			$constraint.=!empty($constraint) ? " AND  documents_demande.demande_codedem = $demande_codedem" :"documents_demande.demande_codedem = $demande_codedem" ;
		}
		
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		
		$selector->setIntegrityCheck(false);
		
		
		$selector->where($constraint);
		
		$record =$this->fetchRow($selector);
		if($record){
			return $record->toArray();
		}else{
			return false;
		}
	}

	
			
}





