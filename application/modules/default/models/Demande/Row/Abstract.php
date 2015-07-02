<?php

/**
 * Row definition class for table demande.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Demande_Row setFromArray($data)
 *
 * @property integer $codedem
 * @property string $type_demande
 * @property integer $annee_universitaire
 * @property integer $CIN
 * @property string $etat
 * @property string $descriptif
 * @property string $date_demande
 * @property string $deleted
 */
abstract class Application_Model_Demande_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Demande_Row
     */
    public function setCodedem($Codedem)
    {
        $this->codedem = $Codedem;
        return $this;
    }

    /**
     * Get value of 'codedem' field
     *
     * @return integer
     */
    public function getCodedem()
    {
        return $this->codedem;
    }

    /**
     * Set value for 'type_demande' field
     *
     * @param string $TypeDemande
     *
     * @return Application_Model_Demande_Row
     */
    public function setTypeDemande($TypeDemande)
    {
        $this->type_demande = $TypeDemande;
        return $this;
    }

    /**
     * Get value of 'type_demande' field
     *
     * @return string
     */
    public function getTypeDemande()
    {
        return $this->type_demande;
    }

    /**
     * Set value for 'annee_universitaire' field
     *
     * @param integer $AnneeUniversitaire
     *
     * @return Application_Model_Demande_Row
     */
    public function setAnneeUniversitaire($AnneeUniversitaire)
    {
        $this->annee_universitaire = $AnneeUniversitaire;
        return $this;
    }

    /**
     * Get value of 'annee_universitaire' field
     *
     * @return integer
     */
    public function getAnneeUniversitaire()
    {
        return $this->annee_universitaire;
    }

    /**
     * Set value for 'CIN' field
     *
     * @param integer $CIN
     *
     * @return Application_Model_Demande_Row
     */
    public function setCIN($CIN)
    {
        $this->CIN = $CIN;
        return $this;
    }

    /**
     * Get value of 'CIN' field
     *
     * @return integer
     */
    public function getCIN()
    {
        return $this->CIN;
    }

    /**
     * Set value for 'etat' field
     *
     * @param string $Etat
     *
     * @return Application_Model_Demande_Row
     */
    public function setEtat($Etat)
    {
        $this->etat = $Etat;
        return $this;
    }

    /**
     * Get value of 'etat' field
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set value for 'descriptif' field
     *
     * @param string $Descriptif
     *
     * @return Application_Model_Demande_Row
     */
    public function setDescriptif($Descriptif)
    {
        $this->descriptif = $Descriptif;
        return $this;
    }

    /**
     * Get value of 'descriptif' field
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * Set value for 'date_demande' field
     *
     * @param string $DateDemande
     *
     * @return Application_Model_Demande_Row
     */
    public function setDateDemande($DateDemande)
    {
        $this->date_demande = $DateDemande;
        return $this;
    }

    /**
     * Get value of 'date_demande' field
     *
     * @return string
     */
    public function getDateDemande()
    {
        return $this->date_demande;
    }

    /**
     * Set value for 'deleted' field
     *
     * @param string $Deleted
     *
     * @return Application_Model_Demande_Row
     */
    public function setDeleted($Deleted)
    {
        $this->deleted = $Deleted;
        return $this;
    }

    /**
     * Get value of 'deleted' field
     *
     * @return string
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Get a row of Etudiant.
     *
     * @return Application_Model_Etudiant_Row
     */
    public function getEtudiantRowByCIN()
    {
        return $this->findParentRow('Application_Model_Etudiant_DbTable', 'CIN');
    }

    /**
     * Get a row of AnneeUniversitaire.
     *
     * @return Application_Model_AnneeUniversitaire_Row
     */
    public function getAnneeUniversitaireRowByAnneeUniversitaire()
    {
        return $this->findParentRow('Application_Model_AnneeUniversitaire_DbTable', 'annee_universitaire');
    }

    /**
     * Get a list of rows of Chparcours.
     *
     * @return Application_Model_Chparcours_Rowset
     */
    public function getChparcoursRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Chparcours_DbTable', 'codedem');
    }

    /**
     * Get a list of rows of Files.
     *
     * @return Application_Model_Files_Rowset
     */
    public function getFilesRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Files_DbTable', 'codedem');
    }

    /**
     * Get a list of rows of Mutation.
     *
     * @return Application_Model_Mutation_Rowset
     */
    public function getMutationRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Mutation_DbTable', 'codedem');
    }

    /**
     * Get a list of rows of Reorientation.
     *
     * @return Application_Model_Reorientation_Rowset
     */
    public function getReorientationRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Reorientation_DbTable', 'codedem');
    }

    /**
     * Get a list of rows of Report.
     *
     * @return Application_Model_Report_Rowset
     */
    public function getReportRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Report_DbTable', 'codedem');
    }

    /**
     * Get a list of rows of Retrait.
     *
     * @return Application_Model_Retrait_Rowset
     */
    public function getRetraitRowsByCodedem()
    {
        return $this->findDependentRowset('Application_Model_Retrait_DbTable', 'codedem');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->codedem;
    }
}
