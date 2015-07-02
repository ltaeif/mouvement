<?php

/**
 * Data mapper class for table files.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_FilesMapper
{
    /**
     *
     * @var Application_Model_Files_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Files_DbTable();
    }

    /**
     *
     * @return Application_Model_Files_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
