<?php

/**
 * Data mapper class for table etudes.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_EtudesMapper
{
    /**
     *
     * @var Application_Model_Etudes_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Etudes_DbTable();
    }

    /**
     *
     * @return Application_Model_Etudes_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
