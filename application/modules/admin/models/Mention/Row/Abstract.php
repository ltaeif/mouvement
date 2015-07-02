<?php

/**
 * Row definition class for table mention.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Mention_Row setFromArray($data)
 *
 * @property integer $id_mention
 * @property string $libelle
 * @property string $description
 */
abstract class Application_Model_Mention_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id_mention' field
     *
     * @param integer $IdMention
     *
     * @return Application_Model_Mention_Row
     */
    public function setIdMention($IdMention)
    {
        $this->id_mention = $IdMention;
        return $this;
    }

    /**
     * Get value of 'id_mention' field
     *
     * @return integer
     */
    public function getIdMention()
    {
        return $this->id_mention;
    }

    /**
     * Set value for 'libelle' field
     *
     * @param string $Libelle
     *
     * @return Application_Model_Mention_Row
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
     * Set value for 'description' field
     *
     * @param string $Description
     *
     * @return Application_Model_Mention_Row
     */
    public function setDescription($Description)
    {
        $this->description = $Description;
        return $this;
    }

    /**
     * Get value of 'description' field
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get a list of rows of Parcours.
     *
     * @return Application_Model_Parcours_Rowset
     */
    public function getParcoursRowsByMention()
    {
        return $this->findDependentRowset('Application_Model_Parcours_DbTable', 'mention');
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
