<?php

/**
 * Definition class for table etablissement_lang.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_EtablissementLang_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_EtablissementLang_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_EtablissementLang_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_EtablissementLang_Rowset find()
 *
 */
abstract class Application_Model_EtablissementLang_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'etablissement_lang';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'idetablissement_lang',
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
        'etablissement_idetablissement' => array(
            'columns' => 'etablissement_idetablissement',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        ),

        'lang_idlang' => array(
            'columns' => 'lang_idlang',
            'refTableClass' => 'Application_Model_Lang_DbTable',
            'refColumns' => 'idlang'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_EtablissementLang_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_EtablissementLang_Rowset';

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
     * @return Application_Model_EtablissementLang_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'etablissement_idetablissement' => NULL,
  'intitule' => NULL,
  'abrev' => NULL,
  'description' => NULL,
  'idetablissement_lang' => NULL,
  'lang_idlang' => NULL,
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
        
        if (isset($params['etablissement_idetablissement']) && !empty($params['etablissement_idetablissement'])) {
            $select->where('etablissement_idetablissement = ?', $params['etablissement_idetablissement']);
        }

        if (isset($params['intitule']) && !empty($params['intitule'])) {
            $select->where('intitule = ?', $params['intitule']);
        }

        if (isset($params['abrev']) && !empty($params['abrev'])) {
            $select->where('abrev = ?', $params['abrev']);
        }

        if (isset($params['description']) && !empty($params['description'])) {
            $select->where('description = ?', $params['description']);
        }

        if (isset($params['idetablissement_lang']) && !empty($params['idetablissement_lang'])) {
            $select->where('idetablissement_lang = ?', $params['idetablissement_lang']);
        }

        if (isset($params['lang_idlang']) && !empty($params['lang_idlang'])) {
            $select->where('lang_idlang = ?', $params['lang_idlang']);
        }
        
        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';
            
            if ('all' === $searchMode || 'etablissement_idetablissement' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement_idetablissement LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'intitule' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('intitule LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'abrev' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('abrev LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'description' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('description LIKE ?', "%$keywords%");
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
