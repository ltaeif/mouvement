<?php

/**
 * Row definition class for table lang.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Lang_Row setFromArray($data)
 *
 * @property integer $idlang
 * @property string $iso_code
 * @property string $intitule
 * @property integer $active
 * @property integer $default
 * @property integer $deleted
 */
abstract class Application_Model_Lang_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'idlang' field
     *
     * @param integer $Idlang
     *
     * @return Application_Model_Lang_Row
     */
    public function setIdlang($Idlang)
    {
        $this->idlang = $Idlang;
        return $this;
    }

    /**
     * Get value of 'idlang' field
     *
     * @return integer
     */
    public function getIdlang()
    {
        return $this->idlang;
    }

    /**
     * Set value for 'iso_code' field
     *
     * @param string $IsoCode
     *
     * @return Application_Model_Lang_Row
     */
    public function setIsoCode($IsoCode)
    {
        $this->iso_code = $IsoCode;
        return $this;
    }

    /**
     * Get value of 'iso_code' field
     *
     * @return string
     */
    public function getIsoCode()
    {
        return $this->iso_code;
    }

    /**
     * Set value for 'intitule' field
     *
     * @param string $Intitule
     *
     * @return Application_Model_Lang_Row
     */
    public function setIntitule($Intitule)
    {
        $this->intitule = $Intitule;
        return $this;
    }

    /**
     * Get value of 'intitule' field
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set value for 'active' field
     *
     * @param integer $Active
     *
     * @return Application_Model_Lang_Row
     */
    public function setActive($Active)
    {
        $this->active = $Active;
        return $this;
    }

    /**
     * Get value of 'active' field
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set value for 'default' field
     *
     * @param integer $Default
     *
     * @return Application_Model_Lang_Row
     */
    public function setDefault($Default)
    {
        $this->default = $Default;
        return $this;
    }

    /**
     * Get value of 'default' field
     *
     * @return integer
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set value for 'deleted' field
     *
     * @param integer $Deleted
     *
     * @return Application_Model_Lang_Row
     */
    public function setDeleted($Deleted)
    {
        $this->deleted = $Deleted;
        return $this;
    }

    /**
     * Get value of 'deleted' field
     *
     * @return integer
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Get a list of rows of EtablissementLang.
     *
     * @return Application_Model_EtablissementLang_Rowset
     */
    public function getEtablissementLangRowsByLangIdlang()
    {
        return $this->findDependentRowset('Application_Model_EtablissementLang_DbTable', 'lang_idlang');
    }

    /**
     * Get a list of rows of UniversiteLang.
     *
     * @return Application_Model_UniversiteLang_Rowset
     */
    public function getUniversiteLangRowsByLangIdlang()
    {
        return $this->findDependentRowset('Application_Model_UniversiteLang_DbTable', 'lang_idlang');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->iso_code;
    }
}
