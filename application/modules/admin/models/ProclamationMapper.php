<?php

/**
 * Data mapper class for table proclamation.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_ProclamationMapper
{
    /**
     *
     * @var Application_Model_Proclamation_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Proclamation_DbTable();
    }

    /**
     *
     * @return Application_Model_Proclamation_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
