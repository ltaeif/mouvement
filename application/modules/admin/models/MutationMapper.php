<?php

/**
 * Data mapper class for table mutation.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_MutationMapper
{
    /**
     *
     * @var Application_Model_Mutation_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Mutation_DbTable();
    }

    /**
     *
     * @return Application_Model_Mutation_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
