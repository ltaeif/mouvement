<?php

/**
 * Data mapper class for table etudiant.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_EtudiantMapper
{
    /**
     *
     * @var Application_Model_Etudiant_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Etudiant_DbTable();
    }

    /**
     *
     * @return Application_Model_Etudiant_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
