<?php

/**
 * Data mapper class for table parcours.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_ParcoursMapper
{
    /**
     *
     * @var Application_Model_Parcours_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Parcours_DbTable();
    }

    /**
     *
     * @return Application_Model_Parcours_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
