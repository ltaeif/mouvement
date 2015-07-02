<?php

/**
 * Data mapper class for table diplome_type.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_DiplomeTypeMapper
{
    /**
     *
     * @var Application_Model_DiplomeType_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_DiplomeType_DbTable();
    }

    /**
     *
     * @return Application_Model_DiplomeType_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
