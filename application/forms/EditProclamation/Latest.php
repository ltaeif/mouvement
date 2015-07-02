<?php

/**
 * Form definition for table proclamation.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditProclamation_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codeproclm')
                
        );

        $this->addElement(
            $this->createElement('text', 'typeproclm')
                ->setLabel('Typeproclm')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'decision')
                ->setLabel('Decision')
                ->setAttrib("maxlength", 40)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 40)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tablePersonnel = new Application_Model_Personnel_DbTable();
        $this->addElement(
            $this->createElement('select', 'idpersonnel')
                ->setLabel('Idpersonnel')
                ->setMultiOptions(array("" => "- - Select - -") + $tablePersonnel->fetchPairs())
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