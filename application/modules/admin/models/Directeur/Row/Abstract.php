<?php

/**
 * Row definition class for table directeur.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Directeur_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $nom
 * @property string $prenom
 * @property string $grade
 * @property string $Description
 */
abstract class Application_Model_Directeur_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Directeur_Row
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
     * Set value for 'nom' field
     *
     * @param string $Nom
     *
     * @return Application_Model_Directeur_Row
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
     * @return Application_Model_Directeur_Row
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
     * Set value for 'grade' field
     *
     * @param string $Grade
     *
     * @return Application_Model_Directeur_Row
     */
    public function setGrade($Grade)
    {
        $this->grade = $Grade;
        return $this;
    }

    /**
     * Get value of 'grade' field
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set value for 'Description' field
     *
     * @param string $Description
     *
     * @return Application_Model_Directeur_Row
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * Get value of 'Description' field
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Get a list of rows of Etablissement.
     *
     * @return Application_Model_Etablissement_Rowset
     */
    public function getEtablissementRowsByDirecteur()
    {
        return $this->findDependentRowset('Application_Model_Etablissement_DbTable', 'directeur');
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
