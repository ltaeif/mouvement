<?php

/**
 * Data mapper class for table pays.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_PaysMapper
{
    /**
     *
     * @var Application_Model_Pays_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Pays_DbTable();
    }

    /**
     *
     * @return Application_Model_Pays_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
