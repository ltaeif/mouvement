<?php

class Application_Mytables_Etablissement extends Application_Model_Etablissement_DbTable
{	

		public function findbyidJoin($id=""){
		
		
		$selector=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		
		$selector->join("etablissement_lang", "etablissement_lang.etablissement_idetablissement=etablissement.idetablissement");
		$selector->where('etablissement_lang.lang_idlang = ?', 2);
		$selector->where('etablissement_lang.etablissement_idetablissement = ?', $id);
		
		
		
		$selector->setIntegrityCheck(false);
		
		
		$record =$this->fetchRow($selector);
		if($record){
			return $record['intitule'];
		}else{
			return false;
		}
	}
	
	
	
	  /**
     * Used to fetch a rowset and build an associative array from it.
     *
     * The first column is used as key and the second column is used as corresponding value.
     *
     * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
     * @param string|array                      $order  OPTIONAL An SQL ORDER clause.
     * @param int                               $count  OPTIONAL An SQL LIMIT count.
     * @param int                               $offset OPTIONAL An SQL LIMIT offset.
     * @return array
     */
    public function fetchPairsExtended($rowname=null,$where = null, $order = null, $count = null, $offset = null)
    {
		$return = array();
	
		$select=$this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
		 
		$select->setIntegrityCheck(false);
		 
		$select->join("etablissement_lang", "etablissement_lang.etablissement_idetablissement=etablissement.idetablissement");
		
		$select->columns(array(
		"idetablissement"=>"etablissement.idetablissement",
		"intitule"=>"etablissement_lang.intitule"));
		$constraint= '';
		if($where!=null) 
		{$constraint= 'etablissement.universite='.$where['universite'];
		$constraint.= ' AND etablissement_lang.lang_idlang=2';}
		else
		{
		$constraint.= 'etablissement_lang.lang_idlang=2';
		}
		
		
		$select->where($constraint);
		
		$records=$this->fetchAll($select);
		$tabs=array();
		if($records)
		{
			$tabs= $records->toArray();
		}else{
			return null;
		}
	
		
		
        foreach ($tabs as $row)
        {
			if($rowname)
            $return[$row[$rowname[0]]] = $row[$rowname[1]];
			else
			$return[$row['idetablissement']] = $row['intitule'];
			
        }

	
		return $return;
	
	
	
	}
			
}





