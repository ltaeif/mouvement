<?php

/**
 * Form definition for table mutation.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditMutation extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $tableVille = new Application_Model_Ville_DbTable();
        $this->addElement(
            $this->createElement('select', 'ville')
                ->setLabel('Ville')
                ->setMultiOptions(array("" => "- - Select - -") + $tableVille->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('textarea', 'section_actuelle')
                ->setLabel('Section Actuelle')
                ->setAttrib("class", "input-xxlarge")
                ->setAttrib("rows", "15")
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'niveau_actuelle')
                ->setLabel('Niveau Actuelle')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'resultat')
                ->setLabel('Resultat')
                ->setMultiOptions(array('admis' => 'admis','redoublant' => 'redoublant'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('admis' => 'admis','redoublant' => 'redoublant'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'description_sanction')
                ->setLabel('Description Sanction')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'autres')
                ->setLabel('Autres')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableParcours = new Application_Model_Parcours_DbTable();
        $this->addElement(
            $this->createElement('select', 'section_demande')
                ->setLabel('Section Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairs())
                ->setRequired(true)
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_demande')
                ->setLabel('Etablissement Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('radio', 'cause')
                ->setLabel('Cause')
                ->setMultiOptions(array('Sante' => 'Sante','Social' => 'Social','Autres' => 'Autres'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Sante' => 'Sante','Social' => 'Social','Autres' => 'Autres'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'type_sanction')
                ->setLabel('Type Sanction')
                ->setMultiOptions(array('Non' => 'Non','Oui' => 'Oui'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Non' => 'Non','Oui' => 'Oui'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'releve_note_bac')
                ->setLabel('Releve Note Bac')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'attestation_report_inscription')
                ->setLabel('Attestation Report Inscription')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'copie_cin')
                ->setLabel('Copie Cin')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'documents_mutation_id')
                ->setLabel('Documents Mutation Id')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
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