<?php

/**
 * Data mapper class for table diplome.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_DiplomeMapper
{
    /**
     *
     * @var Application_Model_Diplome_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Diplome_DbTable();
    }

    /**
     *
     * @return Application_Model_Diplome_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
