<?php

/**
 * Definition class for table personnel.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Personnel_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_Personnel_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_Personnel_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_Personnel_Rowset find()
 *
 */
abstract class Application_Model_Personnel_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'personnel';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'idpersonnel',
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
        'authentif_id' => array(
            'columns' => 'authentif_id',
            'refTableClass' => 'Application_Model_Authentif_DbTable',
            'refColumns' => 'id'
        ),

        'etablissement' => array(
            'columns' => 'etablissement',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_Personnel_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_Personnel_Rowset';

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
     * @return Application_Model_Personnel_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'idpersonnel' => NULL,
  'nom' => NULL,
  'prenom' => NULL,
  'cin' => NULL,
  'adresse' => NULL,
  'numtel' => NULL,
  'Titre' => NULL,
  'organisme' => NULL,
  'etablissement' => NULL,
  'authentif_id' => NULL,
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
        
        if (isset($params['idpersonnel']) && !empty($params['idpersonnel'])) {
            $select->where('idpersonnel = ?', $params['idpersonnel']);
        }

        if (isset($params['nom']) && !empty($params['nom'])) {
            $select->where('nom = ?', $params['nom']);
        }

        if (isset($params['prenom']) && !empty($params['prenom'])) {
            $select->where('prenom = ?', $params['prenom']);
        }

        if (isset($params['cin']) && !empty($params['cin'])) {
            $select->where('cin = ?', $params['cin']);
        }

        if (isset($params['adresse']) && !empty($params['adresse'])) {
            $select->where('adresse = ?', $params['adresse']);
        }

        if (isset($params['numtel']) && !empty($params['numtel'])) {
            $select->where('numtel = ?', $params['numtel']);
        }

        if (isset($params['Titre']) && !empty($params['Titre'])) {
            $select->where('Titre = ?', $params['Titre']);
        }

        if (isset($params['organisme']) && !empty($params['organisme'])) {
            $select->where('organisme = ?', $params['organisme']);
        }

        if (isset($params['etablissement']) && !empty($params['etablissement'])) {
            $select->where('etablissement = ?', $params['etablissement']);
        }

        if (isset($params['authentif_id']) && !empty($params['authentif_id'])) {
            $select->where('authentif_id = ?', $params['authentif_id']);
        }
        
        // _kw = keywords, _sm = search mode
        if (isset($params['_kw']) && !empty($params['_kw'])) {
            $dbAdapter = $this->getAdapter();
            $searchWheres = array();
            $keywords = $params['_kw'];
            $searchMode = isset($params['_sm']) && !empty($params['_sm']) ? $params['_sm'] : 'all';
            
            if ('all' === $searchMode || 'nom' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('nom LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'prenom' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('prenom LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'adresse' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('adresse LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'Titre' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('Titre LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'organisme' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('organisme LIKE ?', "%$keywords%");
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
