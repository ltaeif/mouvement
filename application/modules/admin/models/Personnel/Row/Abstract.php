<?php

/**
 * Row definition class for table personnel.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Personnel_Row setFromArray($data)
 *
 * @property integer $idpersonnel
 * @property string $nom
 * @property string $prenom
 * @property integer $cin
 * @property string $adresse
 * @property integer $numtel
 * @property string $Titre
 * @property string $organisme
 * @property string $etablissement
 * @property integer $authentif_id
 */
abstract class Application_Model_Personnel_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idpersonnel' field
     *
     * @param integer $Idpersonnel
     *
     * @return Application_Model_Personnel_Row
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
     * Set value for 'nom' field
     *
     * @param string $Nom
     *
     * @return Application_Model_Personnel_Row
     */
    public function setNom($Nom)
    {
        $this->nom = $Nom;
        return $this;
    }

    /**
     * Get value of 'nom' field
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set value for 'prenom' field
     *
     * @param string $Prenom
     *
     * @return Application_Model_Personnel_Row
     */
    public function setPrenom($Prenom)
    {
        $this->prenom = $Prenom;
        return $this;
    }

    /**
     * Get value of 'prenom' field
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set value for 'cin' field
     *
     * @param integer $Cin
     *
     * @return Application_Model_Personnel_Row
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
     * Set value for 'adresse' field
     *
     * @param string $Adresse
     *
     * @return Application_Model_Personnel_Row
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
     * @return Application_Model_Personnel_Row
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
     * Set value for 'Titre' field
     *
     * @param string $Titre
     *
     * @return Application_Model_Personnel_Row
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
        return $this;
    }

    /**
     * Get value of 'Titre' field
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set value for 'organisme' field
     *
     * @param string $Organisme
     *
     * @return Application_Model_Personnel_Row
     */
    public function setOrganisme($Organisme)
    {
        $this->organisme = $Organisme;
        return $this;
    }

    /**
     * Get value of 'organisme' field
     *
     * @return string
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * Set value for 'etablissement' field
     *
     * @param string $Etablissement
     *
     * @return Application_Model_Personnel_Row
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
     * Set value for 'authentif_id' field
     *
     * @param integer $AuthentifId
     *
     * @return Application_Model_Personnel_Row
     */
    public function setAuthentifId($AuthentifId)
    {
        $this->authentif_id = $AuthentifId;
        return $this;
    }

    /**
     * Get value of 'authentif_id' field
     *
     * @return integer
     */
    public function getAuthentifId()
    {
        return $this->authentif_id;
    }

    /**
     * Get a row of Authentif.
     *
     * @return Application_Model_Authentif_Row
     */
    public function getAuthentifRowByAuthentifId()
    {
        return $this->findParentRow('Application_Model_Authentif_DbTable', 'authentif_id');
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
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->nom;
    }
}
