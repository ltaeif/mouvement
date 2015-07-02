<?php

/**
 * Data mapper class for table etablissement2.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_Etablissement2Mapper
{
    /**
     *
     * @var Application_Model_Etablissement2_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Etablissement2_DbTable();
    }

    /**
     *
     * @return Application_Model_Etablissement2_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
