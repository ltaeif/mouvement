<?php

/**
 * Data mapper class for table directeur.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_DirecteurMapper
{
    /**
     *
     * @var Application_Model_Directeur_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Directeur_DbTable();
    }

    /**
     *
     * @return Application_Model_Directeur_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
