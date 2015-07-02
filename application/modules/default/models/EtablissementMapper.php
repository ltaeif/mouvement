<?php

/**
 * Data mapper class for table etablissement.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_EtablissementMapper
{
    /**
     *
     * @var Application_Model_Etablissement_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Etablissement_DbTable();
    }

    /**
     *
     * @return Application_Model_Etablissement_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
