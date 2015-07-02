<?php

class Application_Mytables_Parcours extends Application_Model_Parcours_DbTable
{	

	public function lookforparcours($idetablissement=null, $annee=null)
	{
		$constraint="";
		if(!empty($idetablissement)){
			$constraint=" parcours.etablissement = $idetablissement";
		}
		if(!empty($annee)){
			$constraint.=!empty($constraint) ? " AND  parcours.annee_universitaire = $annee" :"parcours.annee_universitaire = $annee" ;
		}
		
		
		$select=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		$select->join("domaine", "domaine.id_domaine=parcours.domaine");
		$select->join("mention", "mention.id_mention=parcours.mention");
		$select->join("diplome", "diplome.id_diplome=parcours.diplome_specialite");
		
		
		$select->columns(array(
		"ldomaine"=>"domaine.libelle",
		"lmention"=>"mention.libelle",
		"ldiplome"=>"diplome.libelle",
		"specialite"=>"diplome.specialite",
		"etablissement"=>"parcours.etablissement",
		));
		
		
		$select->setIntegrityCheck(false);
		
		
		
		$select->where($constraint);
		
		$records = $this->fetchAll($select);
		
		//print_r($records->toArray());
		if($records){
			return $records->toArray();
		}else{
			return false;
		}
	}
	
	
	public function fetchPairsExtended($rowname=null,$where = null, $order = null, $count = null, $offset = null)
	{
		$constraint="";
		
		$constraint= '';
		if($where!=null) 
		{
		$constraint.=!empty($constraint) ? " AND  parcours.annee_universitaire = ".$where['annee_universitaire'] :"parcours.annee_universitaire = ".$where['annee_universitaire'] ;
		}
		
		
		
		$select=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		$select->join("domaine", "domaine.id_domaine=parcours.domaine");
		$select->join("mention", "mention.id_mention=parcours.mention");
		$select->join("diplome", "diplome.id_diplome=parcours.diplome_specialite");
		
		
		$select->columns(array(
		"ldomaine"=>"domaine.libelle",
		"lmention"=>"mention.libelle",
		"ldiplome"=>"diplome.libelle",
		"specialite"=>"diplome.specialite",
		"etablissement"=>"parcours.etablissement",
		));
		
		$select->setIntegrityCheck(false);
		
		if(!empty($constraint)) 	$select->where($constraint);
		
		
		
		
		
		$records = $this->fetchAll($select);
		
		$tabs=array();
		if($records)
		{
			$tabs= $records->toArray();
		}else{
			return null;
		}
	
		foreach ($tabs as $row)
        {
		$return[$row['id']] = $row['domaine'].''.$row['mention'].''.$row['diplome_specialite'].'- -'.$row['ldiplome'].' - '.$row['specialite'];
		}

	
		return $return;
	}
	
			
}





