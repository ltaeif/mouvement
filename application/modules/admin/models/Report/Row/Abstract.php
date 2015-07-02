<?php

/**
 * Row definition class for table report.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Report_Row setFromArray($data)
 *
 * @property integer $codedem
 * @property string $code_inscription
 * @property string $etablissement_actuel
 * @property integer $section_actuelle
 * @property string $niveau_actuelle
 * @property string $causereport
 * @property string $causerepperso
 * @property string $causerepsante
 */
abstract class Application_Model_Report_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Report_Row
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
     * @return Application_Model_Report_Row
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
     * @return Application_Model_Report_Row
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
     * @return Application_Model_Report_Row
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
     * @return Application_Model_Report_Row
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
     * Set value for 'causereport' field
     *
     * @param string $Causereport
     *
     * @return Application_Model_Report_Row
     */
    public function setCausereport($Causereport)
    {
        $this->causereport = $Causereport;
        return $this;
    }

    /**
     * Get value of 'causereport' field
     *
     * @return string
     */
    public function getCausereport()
    {
        return $this->causereport;
    }

    /**
     * Set value for 'causerepperso' field
     *
     * @param string $Causerepperso
     *
     * @return Application_Model_Report_Row
     */
    public function setCauserepperso($Causerepperso)
    {
        $this->causerepperso = $Causerepperso;
        return $this;
    }

    /**
     * Get value of 'causerepperso' field
     *
     * @return string
     */
    public function getCauserepperso()
    {
        return $this->causerepperso;
    }

    /**
     * Set value for 'causerepsante' field
     *
     * @param string $Causerepsante
     *
     * @return Application_Model_Report_Row
     */
    public function setCauserepsante($Causerepsante)
    {
        $this->causerepsante = $Causerepsante;
        return $this;
    }

    /**
     * Get value of 'causerepsante' field
     *
     * @return string
     */
    public function getCauserepsante()
    {
        return $this->causerepsante;
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
     * Get a row of Parcours.
     *
     * @return Application_Model_Parcours_Row
     */
    public function getParcoursRowBySectionActuelle()
    {
        return $this->findParentRow('Application_Model_Parcours_DbTable', 'section_actuelle');
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
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->code_inscription;
    }
}
