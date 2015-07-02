<?php

/**
 * Form definition for table retrait.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Myforms_EditRetrait extends Zend_Form
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

        $this->addElement(
            $this->createElement('text', 'code_inscription')
                ->setLabel('Code Inscription')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
				->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('textarea', 'cause')
                ->setLabel('Cause')
                ->setAttrib("class", "input-xxlarge")
                ->setAttrib("rows", "15")
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('hidden', 'attestation_affectation')
                
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