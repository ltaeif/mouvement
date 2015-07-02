<?php

/**
 * Row definition class for table pays.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Pays_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $libelle
 * @property string $iso
 */
abstract class Application_Model_Pays_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Pays_Row
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
     * Set value for 'libelle' field
     *
     * @param string $Libelle
     *
     * @return Application_Model_Pays_Row
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
     * Set value for 'iso' field
     *
     * @param string $Iso
     *
     * @return Application_Model_Pays_Row
     */
    public function setIso($Iso)
    {
        $this->iso = $Iso;
        return $this;
    }

    /**
     * Get value of 'iso' field
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Get a list of rows of Etudiant.
     *
     * @return Application_Model_Etudiant_Rowset
     */
    public function getEtudiantRowsByPays()
    {
        return $this->findDependentRowset('Application_Model_Etudiant_DbTable', 'pays');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->libelle;
    }
}
