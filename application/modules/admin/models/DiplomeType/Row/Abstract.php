<?php

/**
 * Row definition class for table diplome_type.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_DiplomeType_Row setFromArray($data)
 *
 * @property string $type
 */
abstract class Application_Model_DiplomeType_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'type' field
     *
     * @param string $Type
     *
     * @return Application_Model_DiplomeType_Row
     */
    public function setType($Type)
    {
        $this->type = $Type;
        return $this;
    }

    /**
     * Get value of 'type' field
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->type;
    }
}
