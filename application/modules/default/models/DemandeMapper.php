<?php

/**
 * Data mapper class for table demande.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_DemandeMapper
{
    /**
     *
     * @var Application_Model_Demande_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Demande_DbTable();
    }

    /**
     *
     * @return Application_Model_Demande_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
