<?php

/**
 * Row definition class for table etablissement.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etablissement_Row setFromArray($data)
 *
 * @property string $idetablissement
 * @property integer $universite
 * @property integer $directeur
 * @property string $site_web
 * @property string $email
 * @property string $adresse
 * @property integer $numtel
 * @property string $image
 */
abstract class Application_Model_Etablissement_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idetablissement' field
     *
     * @param string $Idetablissement
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setIdetablissement($Idetablissement)
    {
        $this->idetablissement = $Idetablissement;
        return $this;
    }

    /**
     * Get value of 'idetablissement' field
     *
     * @return string
     */
    public function getIdetablissement()
    {
        return $this->idetablissement;
    }

    /**
     * Set value for 'universite' field
     *
     * @param integer $Universite
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setUniversite($Universite)
    {
        $this->universite = $Universite;
        return $this;
    }

    /**
     * Get value of 'universite' field
     *
     * @return integer
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * Set value for 'directeur' field
     *
     * @param integer $Directeur
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setDirecteur($Directeur)
    {
        $this->directeur = $Directeur;
        return $this;
    }

    /**
     * Get value of 'directeur' field
     *
     * @return integer
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }

    /**
     * Set value for 'site_web' field
     *
     * @param string $SiteWeb
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setSiteWeb($SiteWeb)
    {
        $this->site_web = $SiteWeb;
        return $this;
    }

    /**
     * Get value of 'site_web' field
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->site_web;
    }

    /**
     * Set value for 'email' field
     *
     * @param string $Email
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setEmail($Email)
    {
        $this->email = $Email;
        return $this;
    }

    /**
     * Get value of 'email' field
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set value for 'adresse' field
     *
     * @param string $Adresse
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setAdresse($Adresse)
    {
        $this->adresse = $Adresse;
        return $this;
    }

    /**
     * Get value of 'adresse' field
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set value for 'numtel' field
     *
     * @param integer $Numtel
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setNumtel($Numtel)
    {
        $this->numtel = $Numtel;
        return $this;
    }

    /**
     * Get value of 'numtel' field
     *
     * @return integer
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * Set value for 'image' field
     *
     * @param string $Image
     *
     * @return Application_Model_Etablissement_Row
     */
    public function setImage($Image)
    {
        $this->image = $Image;
        return $this;
    }

    /**
     * Get value of 'image' field
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get a row of Directeur.
     *
     * @return Application_Model_Directeur_Row
     */
    public function getDirecteurRowByDirecteur()
    {
        return $this->findParentRow('Application_Model_Directeur_DbTable', 'directeur');
    }

    /**
     * Get a row of Universite.
     *
     * @return Application_Model_Universite_Row
     */
    public function getUniversiteRowByUniversite()
    {
        return $this->findParentRow('Application_Model_Universite_DbTable', 'universite');
    }

    /**
     * Get a list of rows of Chparcours.
     *
     * @return Application_Model_Chparcours_Rowset
     */
    public function getChparcoursRowsByEtablissementActuel()
    {
        return $this->findDependentRowset('Application_Model_Chparcours_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a list of rows of Chparcours.
     *
     * @return Application_Model_Chparcours_Rowset
     */
    public function getChparcoursRowsByEtablissementDemande()
    {
        return $this->findDependentRowset('Application_Model_Chparcours_DbTable', 'etablissement_demande');
    }

    /**
     * Get a list of rows of EtablissementLang.
     *
     * @return Application_Model_EtablissementLang_Rowset
     */
    public function getEtablissementLangRowsByEtablissementIdetablissement()
    {
        return $this->findDependentRowset('Application_Model_EtablissementLang_DbTable', 'etablissement_idetablissement');
    }

    /**
     * Get a list of rows of Etudiant.
     *
     * @return Application_Model_Etudiant_Rowset
     */
    public function getEtudiantRowsByEtablissement()
    {
        return $this->findDependentRowset('Application_Model_Etudiant_DbTable', 'etablissement');
    }

    /**
     * Get a list of rows of Mutation.
     *
     * @return Application_Model_Mutation_Rowset
     */
    public function getMutationRowsByEtablissementDemande()
    {
        return $this->findDependentRowset('Application_Model_Mutation_DbTable', 'etablissement_demande');
    }

    /**
     * Get a list of rows of Mutation.
     *
     * @return Application_Model_Mutation_Rowset
     */
    public function getMutationRowsByEtablissementActuel()
    {
        return $this->findDependentRowset('Application_Model_Mutation_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a list of rows of Parcours.
     *
     * @return Application_Model_Parcours_Rowset
     */
    public function getParcoursRowsByEtablissement()
    {
        return $this->findDependentRowset('Application_Model_Parcours_DbTable', 'etablissement');
    }

    /**
     * Get a list of rows of Personnel.
     *
     * @return Application_Model_Personnel_Rowset
     */
    public function getPersonnelRowsByEtablissement()
    {
        return $this->findDependentRowset('Application_Model_Personnel_DbTable', 'etablissement');
    }

    /**
     * Get a list of rows of Reorientation.
     *
     * @return Application_Model_Reorientation_Rowset
     */
    public function getReorientationRowsByEtablissementDemande()
    {
        return $this->findDependentRowset('Application_Model_Reorientation_DbTable', 'etablissement_demande');
    }

    /**
     * Get a list of rows of Reorientation.
     *
     * @return Application_Model_Reorientation_Rowset
     */
    public function getReorientationRowsByEtablissementActuel()
    {
        return $this->findDependentRowset('Application_Model_Reorientation_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a list of rows of Report.
     *
     * @return Application_Model_Report_Rowset
     */
    public function getReportRowsByEtablissementActuel()
    {
        return $this->findDependentRowset('Application_Model_Report_DbTable', 'etablissement_actuel');
    }

    /**
     * Get a list of rows of Retrait.
     *
     * @return Application_Model_Retrait_Rowset
     */
    public function getRetraitRowsByEtablissementActuel()
    {
        return $this->findDependentRowset('Application_Model_Retrait_DbTable', 'etablissement_actuel');
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
