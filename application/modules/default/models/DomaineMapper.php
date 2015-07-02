<?php

/**
 * Data mapper class for table domaine.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_DomaineMapper
{
    /**
     *
     * @var Application_Model_Domaine_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Domaine_DbTable();
    }

    /**
     *
     * @return Application_Model_Domaine_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
