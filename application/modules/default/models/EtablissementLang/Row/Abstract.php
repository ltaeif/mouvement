<?php

/**
 * Row definition class for table etablissement_lang.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_EtablissementLang_Row setFromArray($data)
 *
 * @property string $etablissement_idetablissement
 * @property string $intitule
 * @property string $abrev
 * @property string $description
 * @property integer $idetablissement_lang
 * @property integer $lang_idlang
 */
abstract class Application_Model_EtablissementLang_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'etablissement_idetablissement' field
     *
     * @param string $EtablissementIdetablissement
     *
     * @return Application_Model_EtablissementLang_Row
     */
    public function setEtablissementIdetablissement($EtablissementIdetablissement)
    {
        $this->etablissement_idetablissement = $EtablissementIdetablissement;
        return $this;
    }

    /**
     * Get value of 'etablissement_idetablissement' field
     *
     * @return string
     */
    public function getEtablissementIdetablissement()
    {
        return $this->etablissement_idetablissement;
    }

    /**
     * Set value for 'intitule' field
     *
     * @param string $Intitule
     *
     * @return Application_Model_EtablissementLang_Row
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
     * @return Application_Model_EtablissementLang_Row
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
     * Set value for 'description' field
     *
     * @param string $Description
     *
     * @return Application_Model_EtablissementLang_Row
     */
    public function setDescription($Description)
    {
        $this->description = $Description;
        return $this;
    }

    /**
     * Get value of 'description' field
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value for 'idetablissement_lang' field
     *
     * @param integer $IdetablissementLang
     *
     * @return Application_Model_EtablissementLang_Row
     */
    public function setIdetablissementLang($IdetablissementLang)
    {
        $this->idetablissement_lang = $IdetablissementLang;
        return $this;
    }

    /**
     * Get value of 'idetablissement_lang' field
     *
     * @return integer
     */
    public function getIdetablissementLang()
    {
        return $this->idetablissement_lang;
    }

    /**
     * Set value for 'lang_idlang' field
     *
     * @param integer $LangIdlang
     *
     * @return Application_Model_EtablissementLang_Row
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
     * Get a row of Etablissement.
     *
     * @return Application_Model_Etablissement_Row
     */
    public function getEtablissementRowByEtablissementIdetablissement()
    {
        return $this->findParentRow('Application_Model_Etablissement_DbTable', 'etablissement_idetablissement');
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
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->etablissement_idetablissement;
    }
}
