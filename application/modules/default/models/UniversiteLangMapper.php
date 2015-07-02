<?php

/**
 * Data mapper class for table universite_lang.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_UniversiteLangMapper
{
    /**
     *
     * @var Application_Model_UniversiteLang_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_UniversiteLang_DbTable();
    }

    /**
     *
     * @return Application_Model_UniversiteLang_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
