<?php

/**
 * Form definition for table parcours.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Myforms_EditParcours extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'code')
                ->setLabel('Code')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableAnneeUniversitaire = new Application_Model_AnneeUniversitaire_DbTable();
        $this->addElement(
            $this->createElement('select', 'annee_universitaire')
                ->setLabel('Annee Universitaire')
                ->setMultiOptions(array("" => "- - Select - -") + $tableAnneeUniversitaire->fetchPairs())
                ->setRequired(true)
        );

        $tableDomaine = new Application_Model_Domaine_DbTable();
        $this->addElement(
            $this->createElement('select', 'domaine')
                ->setLabel('Domaine')
                ->setMultiOptions(array("" => "- - Select - -") + $tableDomaine->fetchPairs())
                ->setRequired(true)
        );

        $tableMention = new Application_Model_Mention_DbTable();
        $this->addElement(
            $this->createElement('select', 'mention')
                ->setLabel('Mention')
                ->setMultiOptions(array("" => "- - Select - -") + $tableMention->fetchPairs())
                ->setRequired(true)
        );

        $tableDiplome = new Application_Model_Diplome_DbTable();
        $this->addElement(
            $this->createElement('select', 'diplome_specialite')
                ->setLabel('Diplome Specialite')
                ->setMultiOptions(array("" => "- - Select - -") + $tableDiplome->fetchPairs())
                ->setRequired(true)
        );

      $tableEtablissement = new Application_Mytables_Etablissement();
        $this->addElement(
            $this->createElement('select', 'etablissement')
                ->setLabel('Etablissement')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairsExtended(array('idetablissement','intitule')))
                ->setRequired(true)
        );


        $this->addElement(
            $this->createElement('text', 'date_creation')
                ->setLabel('Date Creation')
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