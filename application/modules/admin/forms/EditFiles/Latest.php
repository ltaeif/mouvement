<?php

/**
 * Form definition for table files.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditFiles_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'name')
                ->setLabel('Name')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'size')
                ->setLabel('Size')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'type')
                ->setLabel('Type')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'url')
                ->setLabel('Url')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'title')
                ->setLabel('Title')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
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
            $this->createElement('text', 'date')
                ->setLabel('Date')
                ->setValue(date("Y-m-d H:i:s"))
                ->setAttrib("class", "input-medium")
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableDemande = new Application_Model_Demande_DbTable();
        $this->addElement(
            $this->createElement('select', 'codedem')
                ->setLabel('Codedem')
                ->setMultiOptions(array("" => "- - Select - -") + $tableDemande->fetchPairs())
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