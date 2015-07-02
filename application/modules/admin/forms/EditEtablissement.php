<?php

/**
 * Form definition for table etablissement.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditEtablissement extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'idetablissement')
                
        );

        $tableUniversite = new Application_Model_Universite_DbTable();
        $this->addElement(
            $this->createElement('select', 'universite')
                ->setLabel('Universite')
                ->setMultiOptions(array("" => "- - Select - -") + $tableUniversite->fetchPairs())
                ->setRequired(true)
        );

        $tableDirecteur = new Application_Model_Directeur_DbTable();
        $this->addElement(
            $this->createElement('select', 'directeur')
                ->setLabel('Directeur')
                ->setMultiOptions(array("" => "- - Select - -") + $tableDirecteur->fetchPairs())
        );

        $this->addElement(
            $this->createElement('text', 'site_web')
                ->setLabel('Site Web')
                ->setAttrib("maxlength", 250)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 250)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'email')
                ->setLabel('Email')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addValidator(new Zend_Validate_EmailAddress(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'adresse')
                ->setLabel('Adresse')
                ->setAttrib("maxlength", 100)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 100)), true)
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
            $this->createElement('text', 'image')
                ->setLabel('Image')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
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