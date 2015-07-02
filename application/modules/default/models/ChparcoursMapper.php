<?php

/**
 * Data mapper class for table chparcours.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_ChparcoursMapper
{
    /**
     *
     * @var Application_Model_Chparcours_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Chparcours_DbTable();
    }

    /**
     *
     * @return Application_Model_Chparcours_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
