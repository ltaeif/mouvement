<?php

/**
 * Form definition for table etudes.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditEtudes_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'idetudes')
                
        );

        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $this->addElement(
            $this->createElement('select', 'cin')
                ->setLabel('Cin')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtudiant->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'annee_universitaire')
                ->setLabel('Annee Universitaire')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'etablissement')
                ->setLabel('Etablissement')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'niveau')
                ->setLabel('Niveau')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'resutat')
                ->setLabel('Resutat')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->setValue("\"admis\",\"redoublant\"")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'section')
                ->setLabel('Section')
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