<?php

/**
 * Row definition class for table proclamation.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Proclamation_Row setFromArray($data)
 *
 * @property integer $codeproclm
 * @property string $typeproclm
 * @property string $decision
 * @property integer $idpersonnel
 */
abstract class Application_Model_Proclamation_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codeproclm' field
     *
     * @param integer $Codeproclm
     *
     * @return Application_Model_Proclamation_Row
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
     * Set value for 'typeproclm' field
     *
     * @param string $Typeproclm
     *
     * @return Application_Model_Proclamation_Row
     */
    public function setTypeproclm($Typeproclm)
    {
        $this->typeproclm = $Typeproclm;
        return $this;
    }

    /**
     * Get value of 'typeproclm' field
     *
     * @return string
     */
    public function getTypeproclm()
    {
        return $this->typeproclm;
    }

    /**
     * Set value for 'decision' field
     *
     * @param string $Decision
     *
     * @return Application_Model_Proclamation_Row
     */
    public function setDecision($Decision)
    {
        $this->decision = $Decision;
        return $this;
    }

    /**
     * Get value of 'decision' field
     *
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * Set value for 'idpersonnel' field
     *
     * @param integer $Idpersonnel
     *
     * @return Application_Model_Proclamation_Row
     */
    public function setIdpersonnel($Idpersonnel)
    {
        $this->idpersonnel = $Idpersonnel;
        return $this;
    }

    /**
     * Get value of 'idpersonnel' field
     *
     * @return integer
     */
    public function getIdpersonnel()
    {
        return $this->idpersonnel;
    }

    /**
     * Get a row of Personnel.
     *
     * @return Application_Model_Personnel_Row
     */
    public function getPersonnelRowByIdpersonnel()
    {
        return $this->findParentRow('Application_Model_Personnel_DbTable', 'idpersonnel');
    }

    /**
     * Get a list of rows of Etudiant.
     *
     * @return Application_Model_Etudiant_Rowset
     */
    public function getEtudiantRowset()
    {
        return $this->findManyToManyRowset('Application_Model_Etudiant_DbTable', 'Application_Model_Detailconsultproc_DbTable', 'cin');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->typeproclm;
    }
}
