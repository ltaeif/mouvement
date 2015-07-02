<?php

/**
 * Data mapper class for table report.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_ReportMapper
{
    /**
     *
     * @var Application_Model_Report_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Report_DbTable();
    }

    /**
     *
     * @return Application_Model_Report_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
