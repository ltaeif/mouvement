<?php

class Application_Myforms_EditEtudes extends Zend_Form
{
    public function init()
    {		$auth = Zend_Auth::getInstance();
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'idetudes')
                
        );
		
		 $user=$this->createElement('text', 'CIN')
        ->setAttrib("class", "hidden")
        ->setRequired(true);
        $user->setValue($auth->getStorage()->read()->cin);
        $this->addElement($user);
		
		/*
        $tableEtudiant = new Application_Model_Etudiant_DbTable();
        $this->addElement(
            $this->createElement('select', 'cin')
                ->setLabel('Cin')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtudiant->fetchPairs())
                ->setRequired(true)
        );

		$this->addElement(
            $this->createElement('text', 'annee_universitaire')
                ->setLabel('Annee Universitaire')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );
        $this->addElement(
            $this->createElement('text', 'etablissement')
                ->setLabel('Etablissement')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );*/


        $tableAnneeUniversitaire = new Application_Model_AnneeUniversitaire_DbTable();
        $this->addElement(
            $this->createElement('select', 'annee_universitaire')
                ->setLabel('Annee Universitaire')
                ->setMultiOptions(array("" => "- - Select - -") + $tableAnneeUniversitaire->fetchPairs())
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
            $this->createElement('radio', 'niveau')
                ->setLabel('Niveau')
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'session')
                ->setLabel('Session')
                ->setMultiOptions(array('Principal' => 'Principal','contrôle' => 'contrôle'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Principal' => 'Principal','contrôle' => 'contrôle'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'resutat')
                ->setLabel('Resutat')
                ->setMultiOptions(array('admis' => 'admis','redoublant' => 'redoublant'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('admis' => 'admis','redoublant' => 'redoublant'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'section')
                ->setLabel('Section')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
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

