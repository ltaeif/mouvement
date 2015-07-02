<?php

/**
 * Data mapper class for table retrait.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_RetraitMapper
{
    /**
     *
     * @var Application_Model_Retrait_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Retrait_DbTable();
    }

    /**
     *
     * @return Application_Model_Retrait_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
