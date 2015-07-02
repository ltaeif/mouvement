<?php

/**
 * Data mapper class for table authentif.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_AuthentifMapper
{
    /**
     *
     * @var Application_Model_Authentif_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Authentif_DbTable();
    }

    /**
     *
     * @return Application_Model_Authentif_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
