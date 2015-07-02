<?php

/**
 * Form definition for table report.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Myforms_EditReport extends Zend_Form
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
                  ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairsExtended(null,array( 'annee_universitaire' => '20'.date('y'))))
                ->setRequired(true)
        );
		
		$this->addElement(
            $this->createElement('text', 'code_inscription')
                ->setLabel('Code Inscription')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );


        $this->addElement(
            $this->createElement('radio', 'niveau_actuelle')
                ->setLabel('Niveau Actuelle')
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'causereport')
                ->setLabel('Causereport')
                ->setMultiOptions(array('Sante' => 'Sante','Personnel' => 'Personnel'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Sante' => 'Sante','Personnel' => 'Personnel'))), true)
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