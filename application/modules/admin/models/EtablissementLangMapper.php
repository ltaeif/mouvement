<?php

/**
 * Data mapper class for table etablissement_lang.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_EtablissementLangMapper
{
    /**
     *
     * @var Application_Model_EtablissementLang_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_EtablissementLang_DbTable();
    }

    /**
     *
     * @return Application_Model_EtablissementLang_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
