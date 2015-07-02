<?php

/**
 * Row definition class for table parcours.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Parcours_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $code
 * @property integer $annee_universitaire
 * @property integer $domaine
 * @property integer $mention
 * @property integer $diplome_specialite
 * @property string $etablissement
 * @property string $date_creation
 */
abstract class Application_Model_Parcours_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Parcours_Row
     */
    public function setId($Id)
    {
        $this->id = $Id;
        return $this;
    }

    /**
     * Get value of 'id' field
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value for 'code' field
     *
     * @param string $Code
     *
     * @return Application_Model_Parcours_Row
     */
    public function setCode($Code)
    {
        $this->code = $Code;
        return $this;
    }

    /**
     * Get value of 'code' field
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set value for 'annee_universitaire' field
     *
     * @param integer $AnneeUniversitaire
     *
     * @return Application_Model_Parcours_Row
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
     * Set value for 'domaine' field
     *
     * @param integer $Domaine
     *
     * @return Application_Model_Parcours_Row
     */
    public function setDomaine($Domaine)
    {
        $this->domaine = $Domaine;
        return $this;
    }

    /**
     * Get value of 'domaine' field
     *
     * @return integer
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set value for 'mention' field
     *
     * @param integer $Mention
     *
     * @return Application_Model_Parcours_Row
     */
    public function setMention($Mention)
    {
        $this->mention = $Mention;
        return $this;
    }

    /**
     * Get value of 'mention' field
     *
     * @return integer
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set value for 'diplome_specialite' field
     *
     * @param integer $DiplomeSpecialite
     *
     * @return Application_Model_Parcours_Row
     */
    public function setDiplomeSpecialite($DiplomeSpecialite)
    {
        $this->diplome_specialite = $DiplomeSpecialite;
        return $this;
    }

    /**
     * Get value of 'diplome_specialite' field
     *
     * @return integer
     */
    public function getDiplomeSpecialite()
    {
        return $this->diplome_specialite;
    }

    /**
     * Set value for 'etablissement' field
     *
     * @param string $Etablissement
     *
     * @return Application_Model_Parcours_Row
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
     * Set value for 'date_creation' field
     *
     * @param string $DateCreation
     *
     * @return Application_Model_Parcours_Row
     */
    public function setDateCreation($DateCreation)
    {
        $this->date_creation = $DateCreation;
        return $this;
    }

    /**
     * Get value of 'date_creation' field
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->date_creation;
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
     * Get a row of Diplome.
     *
     * @return Application_Model_Diplome_Row
     */
    public function getDiplomeRowByDiplomeSpecialite()
    {
        return $this->findParentRow('Application_Model_Diplome_DbTable', 'diplome_specialite');
    }

    /**
     * Get a row of Domaine.
     *
     * @return Application_Model_Domaine_Row
     */
    public function getDomaineRowByDomaine()
    {
        return $this->findParentRow('Application_Model_Domaine_DbTable', 'domaine');
    }

    /**
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissement()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement');
    }

    /**
     * Get a row of Mention.
     *
     * @return Application_Model_Mention_Row
     */
    public function getMentionRowByMention()
    {
        return $this->findParentRow('Application_Model_Mention_DbTable', 'mention');
    }

    /**
     * Get a list of rows of Chparcours.
     *
     * @return Application_Model_Chparcours_Rowset
     */
    public function getChparcoursRowsBySectionActuelle()
    {
        return $this->findDependentRowset('Application_Model_Chparcours_DbTable', 'section_actuelle');
    }

    /**
     * Get a list of rows of Chparcours.
     *
     * @return Application_Model_Chparcours_Rowset
     */
    public function getChparcoursRowsBySectionDemande()
    {
        return $this->findDependentRowset('Application_Model_Chparcours_DbTable', 'section_demande');
    }

    /**
     * Get a list of rows of Mutation.
     *
     * @return Application_Model_Mutation_Rowset
     */
    public function getMutationRowsBySectionDemande()
    {
        return $this->findDependentRowset('Application_Model_Mutation_DbTable', 'section_demande');
    }

    /**
     * Get a list of rows of Reorientation.
     *
     * @return Application_Model_Reorientation_Rowset
     */
    public function getReorientationRowsBySectionDemande()
    {
        return $this->findDependentRowset('Application_Model_Reorientation_DbTable', 'section_demande');
    }

    /**
     * Get a list of rows of Report.
     *
     * @return Application_Model_Report_Rowset
     */
    public function getReportRowsBySectionActuelle()
    {
        return $this->findDependentRowset('Application_Model_Report_DbTable', 'section_actuelle');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->code;
    }
}
