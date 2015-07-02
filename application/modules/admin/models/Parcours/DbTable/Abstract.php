<?php

/**
 * Definition class for table parcours.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Parcours_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_Parcours_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_Parcours_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_Parcours_Rowset find()
 *
 */
abstract class Application_Model_Parcours_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'parcours';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'id',
);

    /**
     * @var array
     */
    protected $_dependentTables = array (
  0 => 'Application_Model_Chparcours_DbTable',
  1 => 'Application_Model_Chparcours_DbTable',
  2 => 'Application_Model_Mutation_DbTable',
  3 => 'Application_Model_Reorientation_DbTable',
  4 => 'Application_Model_Report_DbTable',
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

        'diplome_specialite' => array(
            'columns' => 'diplome_specialite',
            'refTableClass' => 'Application_Model_Diplome_DbTable',
            'refColumns' => 'id_diplome'
        ),

        'domaine' => array(
            'columns' => 'domaine',
            'refTableClass' => 'Application_Model_Domaine_DbTable',
            'refColumns' => 'id_domaine'
        ),

        'etablissement' => array(
            'columns' => 'etablissement',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        ),

        'mention' => array(
            'columns' => 'mention',
            'refTableClass' => 'Application_Model_Mention_DbTable',
            'refColumns' => 'id_mention'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_Parcours_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_Parcours_Rowset';

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
     * @return Application_Model_Parcours_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'id' => NULL,
  'code' => NULL,
  'annee_universitaire' => NULL,
  'domaine' => NULL,
  'mention' => NULL,
  'diplome_specialite' => NULL,
  'etablissement' => NULL,
  'date_creation' => NULL,
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
        
        if (isset($params['id']) && !empty($params['id'])) {
            $select->where('id = ?', $params['id']);
        }

        if (isset($params['code']) && !empty($params['code'])) {
            $select->where('code = ?', $params['code']);
        }

        if (isset($params['annee_universitaire']) && !empty($params['annee_universitaire'])) {
            $select->where('annee_universitaire = ?', $params['annee_universitaire']);
        }

        if (isset($params['domaine']) && !empty($params['domaine'])) {
            $select->where('domaine = ?', $params['domaine']);
        }

        if (isset($params['mention']) && !empty($params['mention'])) {
            $select->where('mention = ?', $params['mention']);
        }

        if (isset($params['diplome_specialite']) && !empty($params['diplome_specialite'])) {
            $select->where('diplome_specialite = ?', $params['diplome_specialite']);
        }

        if (isset($params['etablissement']) && !empty($params['etablissement'])) {
            $select->where('etablissement = ?', $params['etablissement']);
        }

        if (isset($params['date_creation']) && !empty($params['date_creation'])) {
            $select->where('date_creation = ?', $params['date_creation']);
        }
        
        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';
            
            if ('all' === $searchMode || 'code' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('code LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'etablissement' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement LIKE ?', "%$keywords%");
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
