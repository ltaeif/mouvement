<?php

/**
 * Data mapper class for table reorientation.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_ReorientationMapper
{
    /**
     *
     * @var Application_Model_Reorientation_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Reorientation_DbTable();
    }

    /**
     *
     * @return Application_Model_Reorientation_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
