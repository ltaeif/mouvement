<?php

/**
 * Row definition class for table reorientation.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Reorientation_Row setFromArray($data)
 *
 * @property integer $codedem
 * @property string $etablissement_actuel
 * @property string $section_actuelle
 * @property string $resultat
 * @property string $etablissement_demande
 * @property integer $section_demande
 * @property string $date_demande
 */
abstract class Application_Model_Reorientation_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Reorientation_Row
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
     * Set value for 'etablissement_actuel' field
     *
     * @param string $EtablissementActuel
     *
     * @return Application_Model_Reorientation_Row
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
     * @param string $SectionActuelle
     *
     * @return Application_Model_Reorientation_Row
     */
    public function setSectionActuelle($SectionActuelle)
    {
        $this->section_actuelle = $SectionActuelle;
        return $this;
    }

    /**
     * Get value of 'section_actuelle' field
     *
     * @return string
     */
    public function getSectionActuelle()
    {
        return $this->section_actuelle;
    }

    /**
     * Set value for 'resultat' field
     *
     * @param string $Resultat
     *
     * @return Application_Model_Reorientation_Row
     */
    public function setResultat($Resultat)
    {
        $this->resultat = $Resultat;
        return $this;
    }

    /**
     * Get value of 'resultat' field
     *
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * Set value for 'etablissement_demande' field
     *
     * @param string $EtablissementDemande
     *
     * @return Application_Model_Reorientation_Row
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
     * @return Application_Model_Reorientation_Row
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
     * Set value for 'date_demande' field
     *
     * @param string $DateDemande
     *
     * @return Application_Model_Reorientation_Row
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
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissementDemande()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement_demande');
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
    public function getParcoursRowBySectionDemande()
    {
        return $this->findParentRow('Application_Model_Parcours_DbTable', 'section_demande');
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
        return $this->etablissement_actuel;
    }
}
