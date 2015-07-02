<?php

/**
 * Form definition for table domaine.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditDomaine extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id_domaine')
                
        );

        $this->addElement(
            $this->createElement('text', 'libelle')
                ->setLabel('Libelle')
                ->setAttrib("maxlength", 200)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 200)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'description')
                ->setLabel('Description')
                ->setAttrib("maxlength", 200)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 200)), true)
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