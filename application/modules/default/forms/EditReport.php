<?php

/**
 * Form definition for table report.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditReport extends Zend_Form
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
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere année' => '1ere année','2eme année' => '2eme année','3eme année' => '3eme année'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'causereport')
                ->setLabel('Causereport')
                ->setMultiOptions(array('Santé' => 'Santé','Personnel' => 'Personnel'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Santé' => 'Santé','Personnel' => 'Personnel'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'causerepperso')
                ->setLabel('Causerepperso')
                ->setMultiOptions(array('Oui' => 'Oui','Non' => 'Non'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Oui' => 'Oui','Non' => 'Non'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'causerepsante')
                ->setLabel('Causerepsante')
                ->setMultiOptions(array('Oui' => 'Oui','Non' => 'Non'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Oui' => 'Oui','Non' => 'Non'))), true)
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