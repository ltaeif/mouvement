<?php

/**
 * Data mapper class for table lang.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_LangMapper
{
    /**
     *
     * @var Application_Model_Lang_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Lang_DbTable();
    }

    /**
     *
     * @return Application_Model_Lang_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
