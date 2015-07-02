<?php

/**
 * Form definition for table universite_lang.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditUniversiteLang extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $tableUniversite = new Application_Model_Universite_DbTable();
        $this->addElement(
            $this->createElement('select', 'universite_iduniversite')
                ->setLabel('Universite Iduniversite')
                ->setMultiOptions(array("" => "- - Select - -") + $tableUniversite->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'intitule')
                ->setLabel('Intitule')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'abrev')
                ->setLabel('Abrev')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('hidden', 'iduniversite_lang')
                
        );

        $tableLang = new Application_Model_Lang_DbTable();
        $this->addElement(
            $this->createElement('select', 'lang_idlang')
                ->setLabel('Lang Idlang')
                ->setMultiOptions(array("" => "- - Select - -") + $tableLang->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('class', 'btn btn-primary')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}