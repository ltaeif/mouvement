<?php

/**
 * Row definition class for table detailconsultproc.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Detailconsultproc_Row setFromArray($data)
 *
 * @property integer $cin
 * @property integer $codeproclm
 */
abstract class Application_Model_Detailconsultproc_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'cin' field
     *
     * @param integer $Cin
     *
     * @return Application_Model_Detailconsultproc_Row
     */
    public function setCin($Cin)
    {
        $this->cin = $Cin;
        return $this;
    }

    /**
     * Get value of 'cin' field
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set value for 'codeproclm' field
     *
     * @param integer $Codeproclm
     *
     * @return Application_Model_Detailconsultproc_Row
     */
    public function setCodeproclm($Codeproclm)
    {
        $this->codeproclm = $Codeproclm;
        return $this;
    }

    /**
     * Get value of 'codeproclm' field
     *
     * @return integer
     */
    public function getCodeproclm()
    {
        return $this->codeproclm;
    }

    /**
     * Get a row of Etudiant.
     *
     * @return Application_Model_Etudiant_Row
     */
    public function getEtudiantRowByCin()
    {
        return $this->findParentRow('Application_Model_Etudiant_DbTable', 'cin');
    }

    /**
     * Get a row of Proclamation.
     *
     * @return Application_Model_Proclamation_Row
     */
    public function getProclamationRowByCodeproclm()
    {
        return $this->findParentRow('Application_Model_Proclamation_DbTable', 'codeproclm');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->cin;
    }
}
