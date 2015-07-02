<?php

/**
 * Form definition for table etablissement_lang.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditEtablissementLang_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_idetablissement')
                ->setLabel('Etablissement Idetablissement')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
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
            $this->createElement('textarea', 'description')
                ->setLabel('Description')
                ->setAttrib("class", "input-xxlarge")
                ->setAttrib("rows", "15")
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('hidden', 'idetablissement_lang')
                
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