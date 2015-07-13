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
        $select=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);

        $select->setIntegrityCheck(false);

        $select->join("etudiant", "etudiant.cin=demande.cin");
        $select->join("demande",  "mutation.codedem=demande.codedem");
        $select->join("mutation", "mutation.codedem=demande.codedem");
        $select->joinLeft("etablissement_lang",  "etablissement_lang.etablissement_idetablissement=demande.etablissement_actuel");
        $select->joinLeft("parcours",  "parcours.code=mutation.secion_demande");
        $select->columns(array(
            "cin"=>"etudiant.cin",
            "nom"=>"etudiant.nom",
            "prenom"=>"etudiant.prenom",
            "etablissement_actuel"=>"etablissement_lang.intitule",
            "niveau_actuel"=>"mutation.niveau_actuelle",
            "etablissement_demande"=>"mutation.etablissement_demande",
            "section_demande"=>"parcours.code",
            "cause"=>"mutation.cause",
            "description_sanction"=>"mutation.description_sanction",
            "type_sanction"=>"mutation.type_sanction",
            "etat"=>"demande.etat"));


        $select->where('etablissement_lang.lang_idlang = ?', "2");


        //set the params
        if ($sortField != '' && $sortOrder != '') {
            if ('desc' === strtolower($sortOrder)) {
                $sortOrder = 'DESC';
            } else {
                $sortOrder = 'ASC';
            }
            $select->order("$sortField $sortOrder");
        }

        if (isset($params['codedem']) && !empty($params['codedem'])) {
            $select->where('codedem = ?', $params['codedem']);
        }

        if (isset($params['type_demande']) && !empty($params['type_demande'])) {
            $select->where('type_demande = ?', $params['type_demande']);
        }

        if (isset($params['annee_universitaire']) && !empty($params['annee_universitaire'])) {
            $select->where('annee_universitaire = ?', $params['annee_universitaire']);
        }

        if (isset($params['CIN']) && !empty($params['CIN'])) {
            $select->where('CIN = ?', $params['CIN']);
        }

        if (isset($params['etat']) && !empty($params['etat'])) {
            $select->where('etat = ?', $params['etat']);
        }

        if (isset($params['descriptif']) && !empty($params['descriptif'])) {
            $select->where('descriptif = ?', $params['descriptif']);
        }

        if (isset($params['date_demande']) && !empty($params['date_demande'])) {
            $select->where('date_demande = ?', $params['date_demande']);
        }

        if (isset($params['deleted']) && !empty($params['deleted'])) {
            $select->where('deleted = ?', $params['deleted']);
        }

        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';

            if ('all' === $searchMode || 'descriptif' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('descriptif LIKE ?', "%$keywords%");
            }

            if (!empty($searchWheres)) {
                $select->where(implode(' OR ', $searchWheres));
            }
        }

        //end conditions
		
		$records=$this->fetchAll($select);
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
        $selector->join("demande",  "mutation.codedem=demande.codedem");
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
		//$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","sectionact"=>"chparcours.sectionorigine","niveau"=>"chparcours.niveauorigine","sectiondem"=>"chparcours.sectiondem","niveaudem"=>"chparcours.niveauorigine"));
	
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
			//$selector->columns(array("cin"=>"etudiant.cin","nom"=>"etudiant.nom","etablissement"=>"etudiant.etablissement","niveau"=>"report.niveau","section"=>"report.section","cause"=>"report.causereport","raisonpers"=>"report.causerepperso","raisonmedic"=>"report.causerepsante"));
		
			$records=$this->fetchAll($selector);
			if($records)
			{
				return $records;
			}else{
				return null;
			}
		}
			
}





