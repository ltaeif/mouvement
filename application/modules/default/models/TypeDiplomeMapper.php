<?php

/**
 * Data mapper class for table type_diplome.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_TypeDiplomeMapper
{
    /**
     *
     * @var Application_Model_TypeDiplome_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_TypeDiplome_DbTable();
    }

    /**
     *
     * @return Application_Model_TypeDiplome_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}
