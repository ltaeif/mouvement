<?php

/**
 * Row definition class for table chparcours.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Chparcours_Row setFromArray($data)
 *
 * @property integer $codedem
 * @property string $code_inscription
 * @property string $etablissement_actuel
 * @property integer $section_actuelle
 * @property string $niveau_actuelle
 * @property string $etablissement_demande
 * @property integer $section_demande
 * @property string $niveau_demande
 */
abstract class Application_Model_Chparcours_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Chparcours_Row
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
     * Set value for 'code_inscription' field
     *
     * @param string $CodeInscription
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setCodeInscription($CodeInscription)
    {
        $this->code_inscription = $CodeInscription;
        return $this;
    }

    /**
     * Get value of 'code_inscription' field
     *
     * @return string
     */
    public function getCodeInscription()
    {
        return $this->code_inscription;
    }

    /**
     * Set value for 'etablissement_actuel' field
     *
     * @param string $EtablissementActuel
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setEtablissementActuel($EtablissementActuel)
    {
        $this->etablissement_actuel = $EtablissementActuel;
        return $this;
    }

    /**
     * Get value of 'etablissement_actuel' field
     *
     * @return string
     */
    public function getEtablissementActuel()
    {
        return $this->etablissement_actuel;
    }

    /**
     * Set value for 'section_actuelle' field
     *
     * @param integer $SectionActuelle
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setSectionActuelle($SectionActuelle)
    {
        $this->section_actuelle = $SectionActuelle;
        return $this;
    }

    /**
     * Get value of 'section_actuelle' field
     *
     * @return integer
     */
    public function getSectionActuelle()
    {
        return $this->section_actuelle;
    }

    /**
     * Set value for 'niveau_actuelle' field
     *
     * @param string $NiveauActuelle
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setNiveauActuelle($NiveauActuelle)
    {
        $this->niveau_actuelle = $NiveauActuelle;
        return $this;
    }

    /**
     * Get value of 'niveau_actuelle' field
     *
     * @return string
     */
    public function getNiveauActuelle()
    {
        return $this->niveau_actuelle;
    }

    /**
     * Set value for 'etablissement_demande' field
     *
     * @param string $EtablissementDemande
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setEtablissementDemande($EtablissementDemande)
    {
        $this->etablissement_demande = $EtablissementDemande;
        return $this;
    }

    /**
     * Get value of 'etablissement_demande' field
     *
     * @return string
     */
    public function getEtablissementDemande()
    {
        return $this->etablissement_demande;
    }

    /**
     * Set value for 'section_demande' field
     *
     * @param integer $SectionDemande
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setSectionDemande($SectionDemande)
    {
        $this->section_demande = $SectionDemande;
        return $this;
    }

    /**
     * Get value of 'section_demande' field
     *
     * @return integer
     */
    public function getSectionDemande()
    {
        return $this->section_demande;
    }

    /**
     * Set value for 'niveau_demande' field
     *
     * @param string $NiveauDemande
     *
     * @return Application_Model_Chparcours_Row
     */
    public function setNiveauDemande($NiveauDemande)
    {
        $this->niveau_demande = $NiveauDemande;
        return $this;
    }

    /**
     * Get value of 'niveau_demande' field
     *
     * @return string
     */
    public function getNiveauDemande()
    {
        return $this->niveau_demande;
    }

    /**
     * Get a row of Demande.
     *
     * @return Application_Model_Demande_Row
     */
    public function getDemandeRowByCodedem()
    {
        return $this->findParentRow('Application_Model_Demande_DbTable', 'codedem');
    }

    /**
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissementActuel()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissementDemande()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement_demande');
    }

    /**
     * Get a row of Parcours.
     *
     * @return Application_Model_Parcours_Row
     */
    public function getParcoursRowBySectionActuelle()
    {
        return $this->findParentRow('Application_Model_Parcours_DbTable', 'section_actuelle');
    }

    /**
     * Get a row of Parcours.
     *
     * @return Application_Model_Parcours_Row
     */
    public function getParcoursRowBySectionDemande()
    {
        return $this->findParentRow('Application_Model_Parcours_DbTable', 'section_demande');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->code_inscription;
    }
}
