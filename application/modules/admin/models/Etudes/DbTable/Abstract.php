<?php

/**
 * Definition class for table etudes.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etudes_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_Etudes_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_Etudes_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_Etudes_Rowset find()
 *
 */
abstract class Application_Model_Etudes_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'etudes';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'idetudes',
);

    /**
     * @var array
     */
    protected $_dependentTables = array (
);

    /**
     * @var array
     */
    protected $_referenceMap = array(        
        'annee_universitaire' => array(
            'columns' => 'annee_universitaire',
            'refTableClass' => 'Application_Model_AnneeUniversitaire_DbTable',
            'refColumns' => 'idannee'
        ),

        'cin' => array(
            'columns' => 'cin',
            'refTableClass' => 'Application_Model_Etudiant_DbTable',
            'refColumns' => 'cin'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_Etudes_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_Etudes_Rowset';

    /**
     * Get the table name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
        
    /**
     * Create a row object with default values
     *
     * @return Application_Model_Etudes_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'idetudes' => NULL,
  'cin' => NULL,
  'annee_universitaire' => NULL,
  'etablissement' => NULL,
  'niveau' => NULL,
  'session' => NULL,
  'resutat' => NULL,
  'section' => NULL,
));
    }
        
    /**
     * Delete multiple Ids
     *
     * @param array $ids
     */
    public function deleteMultipleIds($ids = array())
    {
        if (empty($ids) || empty($this->_primary)) {
            return;
        }
        
        $this->delete($this->_primary[0] . ' IN (' . implode(',', $ids) . ')');
    }

    /**
     * Get Db_Select for pagination by params sent from controller
     *
     * @param array $params
     * @param string $sortField
     * @param string $sortOrder
     * @return Zend_Db_Select
     */
    public function getDbSelectByParams($params = array(), $sortField = '', $sortOrder = '')
    {
        $select = $this->select(true);
        
        if ($sortField != '' && $sortOrder != '') {
            if ('desc' === strtolower($sortOrder)) {
                $sortOrder = 'DESC';
            } else {
                $sortOrder = 'ASC';
            }
            $select->order("$sortField $sortOrder");
        }
        
        if (isset($params['idetudes']) && !empty($params['idetudes'])) {
            $select->where('idetudes = ?', $params['idetudes']);
        }

        if (isset($params['cin']) && !empty($params['cin'])) {
            $select->where('cin = ?', $params['cin']);
        }

        if (isset($params['annee_universitaire']) && !empty($params['annee_universitaire'])) {
            $select->where('annee_universitaire = ?', $params['annee_universitaire']);
        }

        if (isset($params['etablissement']) && !empty($params['etablissement'])) {
            $select->where('etablissement = ?', $params['etablissement']);
        }

        if (isset($params['niveau']) && !empty($params['niveau'])) {
            $select->where('niveau = ?', $params['niveau']);
        }

        if (isset($params['session']) && !empty($params['session'])) {
            $select->where('session = ?', $params['session']);
        }

        if (isset($params['resutat']) && !empty($params['resutat'])) {
            $select->where('resutat = ?', $params['resutat']);
        }

        if (isset($params['section']) && !empty($params['section'])) {
            $select->where('section = ?', $params['section']);
        }
        
        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';
            
            if ('all' === $searchMode || 'etablissement' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'section' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('section LIKE ?', "%$keywords%");
            }
                
            if (!empty($searchWheres)) {
                $select->where(implode(' OR ', $searchWheres));
            }
        }
            
        return $select;
    }

    /**
     * Used to fetch a rowset and build an associative array from it.
     *
     * The first column is used as key and the second column is used as corresponding value.
     *
     * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
     * @param string|array                      $order  OPTIONAL An SQL ORDER clause.
     * @param int                               $count  OPTIONAL An SQL LIMIT count.
     * @param int                               $offset OPTIONAL An SQL LIMIT offset.
     * @return array
     */
    public function fetchPairs($where = null, $order = null, $count = null, $offset = null)
    {
        $return = array();

        if (!($where instanceof Zend_Db_Table_Select)) {
            $select = $this->select();

            if ($where !== null) {
                $this->_where($select, $where);
            }

            if ($order !== null) {
                $this->_order($select, $order);
            }

            if ($count !== null || $offset !== null) {
                $select->limit($count, $offset);
            }

        } else {
            $select = $where;
        }

        $stmt = $this->_db->query($select);
        $rows = $stmt->fetchAll(Zend_Db::FETCH_NUM);

        if (count($rows) == 0) {
            return array();
        }

        foreach ($rows as $row)
        {
            $return[$row[0]] = $row[1];
        }

        return $return;
    }

    /**
     * Fetch the first field's value of the first row.
     *
     * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
     * @param string|array                      $order  OPTIONAL An SQL ORDER clause.
     * @param int                               $offset OPTIONAL An SQL OFFSET value.
     * @return mixed value of the first row's first column or null if no rows found.
     */
    public function fetchOne($where = null, $order = null, $offset = null)
    {
        if (!($where instanceof Zend_Db_Table_Select)) {
            $select = $this->select();

            if ($where !== null) {
                $this->_where($select, $where);
            }

            if ($order !== null) {
                $this->_order($select, $order);
            }

            $select->limit(1, ((is_numeric($offset)) ? (int) $offset : null));

        } else {
            $select = $where->limit(1, $where->getPart(Zend_Db_Select::LIMIT_OFFSET));
        }

        $stmt = $this->_db->query($select);
        $rows = $stmt->fetchAll(Zend_Db::FETCH_NUM);

        if (count($rows) == 0) {
            return null;
        }

        return $rows[0][0];
    }

    /**
     * Fetch first column's values of all rows.
     *
     * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
     * @param string|array                      $order  OPTIONAL An SQL ORDER clause.
     * @param int                               $count  OPTIONAL An SQL LIMIT count.
     * @param int                               $offset OPTIONAL An SQL LIMIT offset.
     * @return array List of values.
     */
    public function fetchOnes($where = null, $order = null, $count = null, $offset = null)
    {
        $return = array();

        if (!($where instanceof Zend_Db_Table_Select)) {
            $select = $this->select();

            if ($where !== null) {
                $this->_where($select, $where);
            }

            if ($order !== null) {
                $this->_order($select, $order);
            }

            if ($count !== null || $offset !== null) {
                $select->limit($count, $offset);
            }

        } else {
            $select = $where;
        }

        $stmt = $this->_db->query($select);
        $rows = $stmt->fetchAll(Zend_Db::FETCH_NUM);

        if (count($rows) == 0) {
            return array();
        }

        foreach ($rows as $row)
        {
            $return[] = $row[0];
        }

        return $return;
    }
}
