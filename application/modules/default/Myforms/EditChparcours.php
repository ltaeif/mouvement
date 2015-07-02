<?php

/**
 * Form definition for table chparcours.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Myforms_EditChparcours extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );
		
		
         $tableEtablissement = new Application_Mytables_Etablissement();
        $this->addElement(
            $this->createElement('select', 'etablissement_actuel')
                ->setLabel('Etablissement Actuel')
                  ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairsExtended(array('idetablissement','intitule'),array('universite'=>2)))
                ->setRequired(true)
        );

       
        $tableParcours = new Application_Mytables_Parcours();
        $this->addElement(
            $this->createElement('select', 'section_actuelle')
                ->setLabel('Section Actuelle')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairsExtended())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('radio', 'niveau_actuelle')
                ->setLabel('Niveau Actuelle')
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
        );
		
		
				
        $tableEtablissement = new Application_Mytables_Etablissement();
        $this->addElement(
            $this->createElement('select', 'etablissement_demande')
                ->setLabel('Etablissement Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairsExtended(array('idetablissement','intitule'),array('universite'=>2)))
                ->setRequired(true)
        );
   
       
        $tableParcours = new Application_Mytables_Parcours();
		
        $this->addElement(
            $this->createElement('select', 'section_demande')
                ->setLabel('Section Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairsExtended())
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