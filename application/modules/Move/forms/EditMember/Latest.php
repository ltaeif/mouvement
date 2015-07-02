<?php

/**
 * Form definition for table member.
 *
 * @package Move
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditMember_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'email')
                ->setLabel('Email')
                ->setAttrib("maxlength", 150)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 150)), true)
                ->addValidator(new Zend_Validate_EmailAddress(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'gender')
                ->setLabel('Gender')
                ->setMultiOptions(array('Male' => 'Male','Female' => 'Female'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Male' => 'Male','Female' => 'Female'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'date_registered')
                ->setLabel('Date Registered')
                ->setValue(date("Y-m-d H:i:s"))
                ->setAttrib("class", "input-medium")
                ->addFilter(new Zend_Filter_StringTrim())
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