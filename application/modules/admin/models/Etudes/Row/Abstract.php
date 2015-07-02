<?php

/**
 * Row definition class for table etudes.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etudes_Row setFromArray($data)
 *
 * @property integer $idetudes
 * @property integer $cin
 * @property integer $annee_universitaire
 * @property string $etablissement
 * @property string $niveau
 * @property string $session
 * @property string $resutat
 * @property string $section
 */
abstract class Application_Model_Etudes_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idetudes' field
     *
     * @param integer $Idetudes
     *
     * @return Application_Model_Etudes_Row
     */
    public function setIdetudes($Idetudes)
    {
        $this->idetudes = $Idetudes;
        return $this;
    }

    /**
     * Get value of 'idetudes' field
     *
     * @return integer
     */
    public function getIdetudes()
    {
        return $this->idetudes;
    }

    /**
     * Set value for 'cin' field
     *
     * @param integer $Cin
     *
     * @return Application_Model_Etudes_Row
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
     * Set value for 'annee_universitaire' field
     *
     * @param integer $AnneeUniversitaire
     *
     * @return Application_Model_Etudes_Row
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
     * Set value for 'etablissement' field
     *
     * @param string $Etablissement
     *
     * @return Application_Model_Etudes_Row
     */
    public function setEtablissement($Etablissement)
    {
        $this->etablissement = $Etablissement;
        return $this;
    }

    /**
     * Get value of 'etablissement' field
     *
     * @return string
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set value for 'niveau' field
     *
     * @param string $Niveau
     *
     * @return Application_Model_Etudes_Row
     */
    public function setNiveau($Niveau)
    {
        $this->niveau = $Niveau;
        return $this;
    }

    /**
     * Get value of 'niveau' field
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set value for 'session' field
     *
     * @param string $Session
     *
     * @return Application_Model_Etudes_Row
     */
    public function setSession($Session)
    {
        $this->session = $Session;
        return $this;
    }

    /**
     * Get value of 'session' field
     *
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set value for 'resutat' field
     *
     * @param string $Resutat
     *
     * @return Application_Model_Etudes_Row
     */
    public function setResutat($Resutat)
    {
        $this->resutat = $Resutat;
        return $this;
    }

    /**
     * Get value of 'resutat' field
     *
     * @return string
     */
    public function getResutat()
    {
        return $this->resutat;
    }

    /**
     * Set value for 'section' field
     *
     * @param string $Section
     *
     * @return Application_Model_Etudes_Row
     */
    public function setSection($Section)
    {
        $this->section = $Section;
        return $this;
    }

    /**
     * Get value of 'section' field
     *
     * @return string
     */
    public function getSection()
    {
        return $this->section;
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
     * Get a row of Etudiant.
     *
     * @return Application_Model_Etudiant_Row
     */
    public function getEtudiantRowByCin()
    {
        return $this->findParentRow('Application_Model_Etudiant_DbTable', 'cin');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->etablissement;
    }
}
