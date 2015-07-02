<?php

/**
 * Form definition for table chparcours.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditChparcours extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $tableParcours = new Application_Model_Parcours_DbTable();
        $this->addElement(
            $this->createElement('select', 'section_actuelle')
                ->setLabel('Section Actuelle')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('radio', 'niveau_actuelle')
                ->setLabel('Niveau Actuelle')
                ->setMultiOptions(array('1ere année' => '1ere année','2eme année' => '2eme année','3eme année' => '3eme année'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere année' => '1ere année','2eme année' => '2eme année','3eme année' => '3eme année'))), true)
        );

        $tableParcours = new Application_Model_Parcours_DbTable();
        $this->addElement(
            $this->createElement('select', 'section_demande')
                ->setLabel('Section Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('radio', 'niveau_demande')
                ->setLabel('Niveau Demande')
                ->setMultiOptions(array('1ere année' => '1ere année','2eme année' => '2eme année','3eme année' => '3eme année'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere année' => '1ere année','2eme année' => '2eme année','3eme année' => '3eme année'))), true)
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