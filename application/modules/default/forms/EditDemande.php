<?php

/**
 * Form definition for table demande.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditDemande extends Zend_Form
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
            $this->createElement('radio', 'etat')
                ->setLabel('Etat')
                ->setMultiOptions(array('En Attente' => 'En Attente','Refuser' => 'Refuser','Accepter' => 'Accepter'))
                ->setSeparator(" ")
                ->setValue("En Attente")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('En Attente' => 'En Attente','Refuser' => 'Refuser','Accepter' => 'Accepter'))), true)
        );

        $this->addElement(
            $this->createElement('textarea', 'descriptif')
                ->setLabel('Descriptif')
                ->setAttrib("class", "input-xxlarge")
                ->setAttrib("rows", "15")
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
            $this->createElement('radio', 'deleted')
                ->setLabel('Deleted')
                ->setMultiOptions(array('0' => '0','1' => '1'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('0' => '0','1' => '1'))), true)
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