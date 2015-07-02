<?php

/**
 * Data mapper class for table ville.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_VilleMapper
{
    /**
     *
     * @var Application_Model_Ville_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Ville_DbTable();
    }

    /**
     *
     * @return Application_Model_Ville_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
