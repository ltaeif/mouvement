<?php

/**
 * Data mapper class for table personnel.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_PersonnelMapper
{
    /**
     *
     * @var Application_Model_Personnel_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Personnel_DbTable();
    }

    /**
     *
     * @return Application_Model_Personnel_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
