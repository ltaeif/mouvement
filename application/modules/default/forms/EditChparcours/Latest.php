<?php

/**
 * Form definition for table chparcours.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditChparcours_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $this->addElement(
            $this->createElement('text', 'code_inscription')
                ->setLabel('Code Inscription')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_actuel')
                ->setLabel('Etablissement Actuel')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
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
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_demande')
                ->setLabel('Etablissement Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
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
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
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