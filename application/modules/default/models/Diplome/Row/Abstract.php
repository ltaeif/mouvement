<?php

/**
 * Row definition class for table diplome.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Diplome_Row setFromArray($data)
 *
 * @property integer $id_diplome
 * @property string $specialite
 * @property string $libelle
 */
abstract class Application_Model_Diplome_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id_diplome' field
     *
     * @param integer $IdDiplome
     *
     * @return Application_Model_Diplome_Row
     */
    public function setIdDiplome($IdDiplome)
    {
        $this->id_diplome = $IdDiplome;
        return $this;
    }

    /**
     * Get value of 'id_diplome' field
     *
     * @return integer
     */
    public function getIdDiplome()
    {
        return $this->id_diplome;
    }

    /**
     * Set value for 'specialite' field
     *
     * @param string $Specialite
     *
     * @return Application_Model_Diplome_Row
     */
    public function setSpecialite($Specialite)
    {
        $this->specialite = $Specialite;
        return $this;
    }

    /**
     * Get value of 'specialite' field
     *
     * @return string
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set value for 'libelle' field
     *
     * @param string $Libelle
     *
     * @return Application_Model_Diplome_Row
     */
    public function setLibelle($Libelle)
    {
        $this->libelle = $Libelle;
        return $this;
    }

    /**
     * Get value of 'libelle' field
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Get a list of rows of Parcours.
     *
     * @return Application_Model_Parcours_Rowset
     */
    public function getParcoursRowsByDiplomeSpecialite()
    {
        return $this->findDependentRowset('Application_Model_Parcours_DbTable', 'diplome_specialite');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->specialite;
    }
}
