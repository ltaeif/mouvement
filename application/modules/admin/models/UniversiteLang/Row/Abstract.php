<?php

/**
 * Row definition class for table universite_lang.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_UniversiteLang_Row setFromArray($data)
 *
 * @property integer $universite_iduniversite
 * @property string $intitule
 * @property string $abrev
 * @property integer $iduniversite_lang
 * @property integer $lang_idlang
 */
abstract class Application_Model_UniversiteLang_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'universite_iduniversite' field
     *
     * @param integer $UniversiteIduniversite
     *
     * @return Application_Model_UniversiteLang_Row
     */
    public function setUniversiteIduniversite($UniversiteIduniversite)
    {
        $this->universite_iduniversite = $UniversiteIduniversite;
        return $this;
    }

    /**
     * Get value of 'universite_iduniversite' field
     *
     * @return integer
     */
    public function getUniversiteIduniversite()
    {
        return $this->universite_iduniversite;
    }

    /**
     * Set value for 'intitule' field
     *
     * @param string $Intitule
     *
     * @return Application_Model_UniversiteLang_Row
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
     * Set value for 'abrev' field
     *
     * @param string $Abrev
     *
     * @return Application_Model_UniversiteLang_Row
     */
    public function setAbrev($Abrev)
    {
        $this->abrev = $Abrev;
        return $this;
    }

    /**
     * Get value of 'abrev' field
     *
     * @return string
     */
    public function getAbrev()
    {
        return $this->abrev;
    }

    /**
     * Set value for 'iduniversite_lang' field
     *
     * @param integer $IduniversiteLang
     *
     * @return Application_Model_UniversiteLang_Row
     */
    public function setIduniversiteLang($IduniversiteLang)
    {
        $this->iduniversite_lang = $IduniversiteLang;
        return $this;
    }

    /**
     * Get value of 'iduniversite_lang' field
     *
     * @return integer
     */
    public function getIduniversiteLang()
    {
        return $this->iduniversite_lang;
    }

    /**
     * Set value for 'lang_idlang' field
     *
     * @param integer $LangIdlang
     *
     * @return Application_Model_UniversiteLang_Row
     */
    public function setLangIdlang($LangIdlang)
    {
        $this->lang_idlang = $LangIdlang;
        return $this;
    }

    /**
     * Get value of 'lang_idlang' field
     *
     * @return integer
     */
    public function getLangIdlang()
    {
        return $this->lang_idlang;
    }

    /**
     * Get a row of Lang.
     *
     * @return Application_Model_Lang_Row
     */
    public function getLangRowByLangIdlang()
    {
        return $this->findParentRow('Application_Model_Lang_DbTable', 'lang_idlang');
    }

    /**
     * Get a row of Universite.
     *
     * @return Application_Model_Universite_Row
     */
    public function getUniversiteRowByUniversiteIduniversite()
    {
        return $this->findParentRow('Application_Model_Universite_DbTable', 'universite_iduniversite');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->intitule;
    }
}
