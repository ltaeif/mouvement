<?php

/**
 * Data mapper class for table inscription.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_InscriptionMapper
{
    /**
     *
     * @var Application_Model_Inscription_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Inscription_DbTable();
    }

    /**
     *
     * @return Application_Model_Inscription_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
