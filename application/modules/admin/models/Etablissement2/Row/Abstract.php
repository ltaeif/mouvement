<?php

/**
 * Row definition class for table etablissement2.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etablissement2_Row setFromArray($data)
 *
 * @property integer $idetablissement
 * @property integer $universite_iduniversite
 */
abstract class Application_Model_Etablissement2_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idetablissement' field
     *
     * @param integer $Idetablissement
     *
     * @return Application_Model_Etablissement2_Row
     */
    public function setIdetablissement($Idetablissement)
    {
        $this->idetablissement = $Idetablissement;
        return $this;
    }

    /**
     * Get value of 'idetablissement' field
     *
     * @return integer
     */
    public function getIdetablissement()
    {
        return $this->idetablissement;
    }

    /**
     * Set value for 'universite_iduniversite' field
     *
     * @param integer $UniversiteIduniversite
     *
     * @return Application_Model_Etablissement2_Row
     */
    public function setUniversiteIduniversite($UniversiteIduniversite)
    {
        $this->universite_iduniversite = $UniversiteIduniversite;
        return $this;
    }

    /**
     * Get value of 'universite_iduniversite' field
     *
     * @return integer
     */
    public function getUniversiteIduniversite()
    {
        return $this->universite_iduniversite;
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->idetablissement;
    }
}
