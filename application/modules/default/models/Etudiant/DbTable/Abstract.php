<?php

/**
 * Definition class for table etudiant.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Etudiant_Row createRow(array $data, string $defaultSource = null)
 * @method Application_Model_Etudiant_Rowset fetchAll(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $count = null, int $offset = null)
 * @method Application_Model_Etudiant_Row fetchRow(string|array|Zend_Db_Table_Select $where = null, string|array $order = null, int $offset = null)
 * @method Application_Model_Etudiant_Rowset find()
 *
 */
abstract class Application_Model_Etudiant_DbTable_Abstract extends Zend_Db_Table_Abstract
{
    /**
     * @var string
     */
    protected $_name = 'etudiant';

    /**
     * @var array
     */
    protected $_primary = array (
  0 => 'cin',
);

    /**
     * @var array
     */
    protected $_dependentTables = array (
  0 => 'Application_Model_Demande_DbTable',
  1 => 'Application_Model_Etudes_DbTable',
);

    /**
     * @var array
     */
    protected $_referenceMap = array(        
        'etablissement' => array(
            'columns' => 'etablissement',
            'refTableClass' => 'Application_Model_Etablissement_DbTable',
            'refColumns' => 'idetablissement'
        ),

        'pays' => array(
            'columns' => 'pays',
            'refTableClass' => 'Application_Model_Pays_DbTable',
            'refColumns' => 'id'
        ),

        'ville' => array(
            'columns' => 'ville',
            'refTableClass' => 'Application_Model_Ville_DbTable',
            'refColumns' => 'idville'
        )
    );

    /**
     * @var string
     */
    protected $_rowClass = 'Application_Model_Etudiant_Row';

    /**
     * @var string
     */
    protected $_rowsetClass = 'Application_Model_Etudiant_Rowset';

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
     * @return Application_Model_Etudiant_Row
     */
    public function createDefaultRow()
    {
        return $this->createRow(array (
  'cin' => NULL,
  'nom' => NULL,
  'prenom' => NULL,
  'date_naissance' => NULL,
  'lieu_naissance' => NULL,
  'ville' => NULL,
  'pays' => NULL,
  'nationalite' => NULL,
  'passeport' => NULL,
  'genre' => NULL,
  'adresse' => NULL,
  'code_postal' => NULL,
  'tel' => NULL,
  'annee_bac' => NULL,
  'branche' => NULL,
  'session' => NULL,
  'mention' => NULL,
  'etablissement' => NULL,
  'specialite' => NULL,
  'niveau' => NULL,
  'situation_universitaire' => NULL,
  'login' => NULL,
  'password' => NULL,
  'actif' => NULL,
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
        
        if (isset($params['cin']) && !empty($params['cin'])) {
            $select->where('cin = ?', $params['cin']);
        }

        if (isset($params['nom']) && !empty($params['nom'])) {
            $select->where('nom = ?', $params['nom']);
        }

        if (isset($params['prenom']) && !empty($params['prenom'])) {
            $select->where('prenom = ?', $params['prenom']);
        }

        if (isset($params['date_naissance']) && !empty($params['date_naissance'])) {
            $select->where('date_naissance = ?', $params['date_naissance']);
        }

        if (isset($params['lieu_naissance']) && !empty($params['lieu_naissance'])) {
            $select->where('lieu_naissance = ?', $params['lieu_naissance']);
        }

        if (isset($params['ville']) && !empty($params['ville'])) {
            $select->where('ville = ?', $params['ville']);
        }

        if (isset($params['pays']) && !empty($params['pays'])) {
            $select->where('pays = ?', $params['pays']);
        }

        if (isset($params['nationalite']) && !empty($params['nationalite'])) {
            $select->where('nationalite = ?', $params['nationalite']);
        }

        if (isset($params['passeport']) && !empty($params['passeport'])) {
            $select->where('passeport = ?', $params['passeport']);
        }

        if (isset($params['genre']) && !empty($params['genre'])) {
            $select->where('genre = ?', $params['genre']);
        }

        if (isset($params['adresse']) && !empty($params['adresse'])) {
            $select->where('adresse = ?', $params['adresse']);
        }

        if (isset($params['code_postal']) && !empty($params['code_postal'])) {
            $select->where('code_postal = ?', $params['code_postal']);
        }

        if (isset($params['tel']) && !empty($params['tel'])) {
            $select->where('tel = ?', $params['tel']);
        }

        if (isset($params['annee_bac']) && !empty($params['annee_bac'])) {
            $select->where('annee_bac = ?', $params['annee_bac']);
        }

        if (isset($params['branche']) && !empty($params['branche'])) {
            $select->where('branche = ?', $params['branche']);
        }

        if (isset($params['session']) && !empty($params['session'])) {
            $select->where('session = ?', $params['session']);
        }

        if (isset($params['mention']) && !empty($params['mention'])) {
            $select->where('mention = ?', $params['mention']);
        }

        if (isset($params['etablissement']) && !empty($params['etablissement'])) {
            $select->where('etablissement = ?', $params['etablissement']);
        }

        if (isset($params['specialite']) && !empty($params['specialite'])) {
            $select->where('specialite = ?', $params['specialite']);
        }

        if (isset($params['niveau']) && !empty($params['niveau'])) {
            $select->where('niveau = ?', $params['niveau']);
        }

        if (isset($params['situation_universitaire']) && !empty($params['situation_universitaire'])) {
            $select->where('situation_universitaire = ?', $params['situation_universitaire']);
        }

        if (isset($params['login']) && !empty($params['login'])) {
            $select->where('login = ?', $params['login']);
        }

        if (isset($params['password']) && !empty($params['password'])) {
            $select->where('password = ?', $params['password']);
        }

        if (isset($params['actif']) && !empty($params['actif'])) {
            $select->where('actif = ?', $params['actif']);
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

            if ('all' === $searchMode || 'lieu_naissance' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('lieu_naissance LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'nationalite' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('nationalite LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'passeport' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('passeport LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'adresse' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('adresse LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'etablissement' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('etablissement LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'specialite' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('specialite LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'situation_universitaire' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('situation_universitaire LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'login' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('login LIKE ?', "%$keywords%");
            }

            if ('all' === $searchMode || 'password' === $searchMode) {
                $searchWheres[] = $dbAdapter->quoteInto('password LIKE ?', "%$keywords%");
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
