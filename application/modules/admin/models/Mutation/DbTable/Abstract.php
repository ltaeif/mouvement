<?php

/**
 * Definition class for table mutation.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Mutation_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_Mutation_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_Mutation_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_Mutation_Rowset find()
 *
 */
abstract class Application_Model_Mutation_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'mutation';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'codedem',
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
        'etablissement_demande' => array(
            'columns' => 'etablissement_demande',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        ),

        'etablissement_actuel' => array(
            'columns' => 'etablissement_actuel',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        ),

        'section_demande' => array(
            'columns' => 'section_demande',
            'refTableClass' => 'Application_Model_Parcours_DbTable',
            'refColumns' => 'id'
        ),

        'codedem' => array(
            'columns' => 'codedem',
            'refTableClass' => 'Application_Model_Demande_DbTable',
            'refColumns' => 'codedem'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_Mutation_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_Mutation_Rowset';

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
     * @return Application_Model_Mutation_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'codedem' => NULL,
  'etablissement_actuel' => NULL,
  'niveau_actuelle' => NULL,
  'resultat' => NULL,
  'autres' => NULL,
  'etablissement_demande' => NULL,
  'section_demande' => NULL,
  'cause' => NULL,
  'type_sanction' => NULL,
  'description_sanction' => NULL,
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
        
        if (isset($params['codedem']) && !empty($params['codedem'])) {
            $select->where('codedem = ?', $params['codedem']);
        }

        if (isset($params['etablissement_actuel']) && !empty($params['etablissement_actuel'])) {
            $select->where('etablissement_actuel = ?', $params['etablissement_actuel']);
        }

        if (isset($params['niveau_actuelle']) && !empty($params['niveau_actuelle'])) {
            $select->where('niveau_actuelle = ?', $params['niveau_actuelle']);
        }

        if (isset($params['resultat']) && !empty($params['resultat'])) {
            $select->where('resultat = ?', $params['resultat']);
        }

        if (isset($params['autres']) && !empty($params['autres'])) {
            $select->where('autres = ?', $params['autres']);
        }

        if (isset($params['etablissement_demande']) && !empty($params['etablissement_demande'])) {
            $select->where('etablissement_demande = ?', $params['etablissement_demande']);
        }

        if (isset($params['section_demande']) && !empty($params['section_demande'])) {
            $select->where('section_demande = ?', $params['section_demande']);
        }

        if (isset($params['cause']) && !empty($params['cause'])) {
            $select->where('cause = ?', $params['cause']);
        }

        if (isset($params['type_sanction']) && !empty($params['type_sanction'])) {
            $select->where('type_sanction = ?', $params['type_sanction']);
        }

        if (isset($params['description_sanction']) && !empty($params['description_sanction'])) {
            $select->where('description_sanction = ?', $params['description_sanction']);
        }
        
        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';
            
            if ('all' === $searchMode || 'etablissement_actuel' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement_actuel LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'autres' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('autres LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'etablissement_demande' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement_demande LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'description_sanction' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('description_sanction LIKE ?', "%$keywords%");
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
