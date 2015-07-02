<?php

/**
 * Row definition class for table universite.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Universite_Row setFromArray($data)
 *
 * @property integer $iduniversite
 */
abstract class Application_Model_Universite_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'iduniversite' field
     *
     * @param integer $Iduniversite
     *
     * @return Application_Model_Universite_Row
     */
    public function setIduniversite($Iduniversite)
    {
        $this->iduniversite = $Iduniversite;
        return $this;
    }

    /**
     * Get value of 'iduniversite' field
     *
     * @return integer
     */
    public function getIduniversite()
    {
        return $this->iduniversite;
    }

    /**
     * Get a list of rows of Etablissement.
     *
     * @return Application_Model_Etablissement_Rowset
     */
    public function getEtablissementRowsByUniversite()
    {
        return $this->findDependentRowset('Application_Model_Etablissement_DbTable', 'universite');
    }

    /**
     * Get a list of rows of UniversiteLang.
     *
     * @return Application_Model_UniversiteLang_Rowset
     */
    public function getUniversiteLangRowsByUniversiteIduniversite()
    {
        return $this->findDependentRowset('Application_Model_UniversiteLang_DbTable', 'universite_iduniversite');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->iduniversite;
    }
}
