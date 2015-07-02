<?php

/**
 * Data mapper class for table annee_universitaire.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_AnneeUniversitaireMapper
{
    /**
     *
     * @var Application_Model_AnneeUniversitaire_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_AnneeUniversitaire_DbTable();
    }

    /**
     *
     * @return Application_Model_AnneeUniversitaire_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
