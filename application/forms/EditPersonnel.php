<?php

/**
 * Form definition for table personnel.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditPersonnel extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'idpersonnel')
                
        );

        $this->addElement(
            $this->createElement('text', 'nom')
                ->setLabel('Nom')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'prenom')
                ->setLabel('Prenom')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'cin')
                ->setLabel('Cin')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'adresse')
                ->setLabel('Adresse')
                ->setAttrib("maxlength", 30)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 30)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'numtel')
                ->setLabel('Numtel')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'Titre')
                ->setLabel('Titre')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'organisme')
                ->setLabel('Organisme')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'codeetab')
                ->setLabel('Codeetab')
                ->setAttrib("maxlength", 5)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 5)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableAuthentif = new Application_Model_Authentif_DbTable();
        $this->addElement(
            $this->createElement('select', 'login')
                ->setLabel('Login')
                ->setMultiOptions(array("" => "- - Select - -") + $tableAuthentif->fetchPairs())
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