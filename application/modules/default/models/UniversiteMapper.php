<?php

/**
 * Data mapper class for table universite.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_UniversiteMapper
{
    /**
     *
     * @var Application_Model_Universite_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Universite_DbTable();
    }

    /**
     *
     * @return Application_Model_Universite_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
