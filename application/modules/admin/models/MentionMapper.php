<?php

/**
 * Data mapper class for table mention.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_MentionMapper
{
    /**
     *
     * @var Application_Model_Mention_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Mention_DbTable();
    }

    /**
     *
     * @return Application_Model_Mention_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
