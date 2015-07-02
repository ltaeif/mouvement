<?php

/**
 * Form definition for table ville.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditVille extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'idville')
                
        );

        $this->addElement(
            $this->createElement('text', 'libelle')
                ->setLabel('Libelle')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'sort_order')
                ->setLabel('Sort Order')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
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