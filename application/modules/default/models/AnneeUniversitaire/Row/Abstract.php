<?php

/**
 * Row definition class for table annee_universitaire.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_AnneeUniversitaire_Row setFromArray($data)
 *
 * @property integer $idannee
 * @property string $annee
 */
abstract class Application_Model_AnneeUniversitaire_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idannee' field
     *
     * @param integer $Idannee
     *
     * @return Application_Model_AnneeUniversitaire_Row
     */
    public function setIdannee($Idannee)
    {
        $this->idannee = $Idannee;
        return $this;
    }

    /**
     * Get value of 'idannee' field
     *
     * @return integer
     */
    public function getIdannee()
    {
        return $this->idannee;
    }

    /**
     * Set value for 'annee' field
     *
     * @param string $Annee
     *
     * @return Application_Model_AnneeUniversitaire_Row
     */
    public function setAnnee($Annee)
    {
        $this->annee = $Annee;
        return $this;
    }

    /**
     * Get value of 'annee' field
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Get a list of rows of Demande.
     *
     * @return Application_Model_Demande_Rowset
     */
    public function getDemandeRowsByAnneeUniversitaire()
    {
        return $this->findDependentRowset('Application_Model_Demande_DbTable', 'annee_universitaire');
    }

    /**
     * Get a list of rows of Etudes.
     *
     * @return Application_Model_Etudes_Rowset
     */
    public function getEtudesRowsByAnneeUniversitaire()
    {
        return $this->findDependentRowset('Application_Model_Etudes_DbTable', 'annee_universitaire');
    }

    /**
     * Get a list of rows of Parcours.
     *
     * @return Application_Model_Parcours_Rowset
     */
    public function getParcoursRowsByAnneeUniversitaire()
    {
        return $this->findDependentRowset('Application_Model_Parcours_DbTable', 'annee_universitaire');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->annee;
    }
}
