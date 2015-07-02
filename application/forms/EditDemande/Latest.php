<?php

/**
 * Form definition for table demande.
 *
 * @package Bduma
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditDemande_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $this->addElement(
            $this->createElement('radio', 'type_demande')
                ->setLabel('Type Demande')
                ->setMultiOptions(array('Reorientation' => 'Reorientation','Mutation' => 'Mutation','Chparcours' => 'Chparcours','Retrait' => 'Retrait','Report' => 'Report'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Reorientation' => 'Reorientation','Mutation' => 'Mutation','Chparcours' => 'Chparcours','Retrait' => 'Retrait','Report' => 'Report'))), true)
        );

        $tableAnneeUniversitaire = new Application_Model_AnneeUniversitaire_DbTable();
        $this->addElement(
            $this->createElement('select', 'annee_universitaire')
                ->setLabel('Annee Universitaire')
                ->setMultiOptions(array("" => "- - Select - -") + $tableAnneeUniversitaire->fetchPairs())
                ->setRequired(true)
        );

        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $this->addElement(
            $this->createElement('select', 'CIN')
                ->setLabel('CIN')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtudiant->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'etat')
                ->setLabel('Etat')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->setValue("\"Refuser\",\"Accepter\"")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'descriptif')
                ->setLabel('Descriptif')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'date_demande')
                ->setLabel('Date Demande')
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