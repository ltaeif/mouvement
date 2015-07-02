<?php

/**
 * Row definition class for table ville.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Ville_Row setFromArray($data)
 *
 * @property integer $idville
 * @property string $libelle
 * @property string $sort_order
 */
abstract class Application_Model_Ville_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idville' field
     *
     * @param integer $Idville
     *
     * @return Application_Model_Ville_Row
     */
    public function setIdville($Idville)
    {
        $this->idville = $Idville;
        return $this;
    }

    /**
     * Get value of 'idville' field
     *
     * @return integer
     */
    public function getIdville()
    {
        return $this->idville;
    }

    /**
     * Set value for 'libelle' field
     *
     * @param string $Libelle
     *
     * @return Application_Model_Ville_Row
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
     * Set value for 'sort_order' field
     *
     * @param string $SortOrder
     *
     * @return Application_Model_Ville_Row
     */
    public function setSortOrder($SortOrder)
    {
        $this->sort_order = $SortOrder;
        return $this;
    }

    /**
     * Get value of 'sort_order' field
     *
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * Get a list of rows of Etudiant.
     *
     * @return Application_Model_Etudiant_Rowset
     */
    public function getEtudiantRowsByVille()
    {
        return $this->findDependentRowset('Application_Model_Etudiant_DbTable', 'ville');
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
