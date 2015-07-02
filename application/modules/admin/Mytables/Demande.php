<?php

class Application_Mytables_Demande extends Application_Model_Demande_DbTable
{	
	
	public function lookfordemande($cin="", $annee="")
	{
		$constraint="";
		if(!empty($cin)){
			$constraint=" demande.CIN = '$cin'";
		}
		if(!empty($mail)){
			$constraint.=!empty($constraint) ? " AND  demande.annee_universitaire = $annee" :"demande.annee_universitaire = $annee" ;
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
	
	public function getdemandeMutation(){
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		 
		$selector->setIntegrityCheck(false);
		 
		$selector->join("etudiant", "etudiant.cin=demande.cin");
		$selector->join("mutation", "mutation.codedem=demande.codedem");
		$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","niveau"=>"mutation.niveau","niveaudem"=>"mutation.nivdem","etablissementdem"=>"mutation.etablissdem","sectiondem"=>"mutation.sectiondem","cause"=>"mutation.cause","sanction"=>"mutation.sanction","typesanc"=>"mutation.typesanc"));
		
		$records=$this->fetchAll($selector);
		if($records)
		{
			return $records;
		}else{
			return null;
		}
		
	}
	
	public function getdemandeReorientation(){
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
			
		$selector->setIntegrityCheck(false);
			
		$selector->join("etudiant", "etudiant.cin=demande.cin");
		$selector->join("reorientation", "reorientation.codedem=demande.codedem");
		$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","sectionact"=>"reorientation.section","codesectdem"=>"reorientation.codesd","sectiondem"=>"reorientation.sectdemande","etablissementdem"=>"reorientation.etabdemande"));
	
		$records=$this->fetchAll($selector);
		if($records)
		{
			return $records;
		}else{
			return null;
		}
		
		
	}
		
		public function getdemandeRetrait(){
			$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
				
			$selector->setIntegrityCheck(false);
				
			$selector->join("etudiant", "etudiant.cin=demande.cin");
			$selector->join("retrait", "retrait.codedem=demande.codedem");
			$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","retrait"=>"retrait.cause"));
		
			$records=$this->fetchAll($selector);
			if($records)
			{
				return $records;
			}else{
				return null;
			}
		
	}
	
	
	public function getdemandeChparcours(){
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
			
		$selector->setIntegrityCheck(false);
			
		$selector->join("etudiant", "etudiant.cin=demande.cin");
		$selector->join("chparcours", "chparcours.codedem=demande.codedem");
		$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","sectionact"=>"chparcours.sectionorigine","niveau"=>"chparcours.niveauorigine","sectiondem"=>"chparcours.sectiondem","niveaudem"=>"chparcours.niveauorigine"));
	
		$records=$this->fetchAll($selector);
		if($records)
		{
			return $records;
		}else{
			return null;
		}
		
	}
		public function getdemandeReport(){
			$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
				
			$selector->setIntegrityCheck(false);
				
			$selector->join("etudiant", "etudiant.cin=demande.cin");
			$selector->join("report", "report.codedem=demande.codedem");
			$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","niveau"=>"report.niveau","section"=>"report.section","cause"=>"report.causereport","raisonpers"=>"report.causerepperso","raisonmedic"=>"report.causerepsante"));
		
			$records=$this->fetchAll($selector);
			if($records)
			{
				return $records;
			}else{
				return null;
			}
		}
			
}





