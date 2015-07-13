<?php

class Application_Myforms_EditDemande extends Zend_Form
{

   public function init()
    {	
    	
    	$auth = Zend_Auth::getInstance();
    	//var_dump($auth->getStorage()->read());
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $this->addElement(
            $this->createElement('radio', 'type_demande')
                ->setLabel('Type Demande')
                ->setMultiOptions(array('Reorientation' => 'Reorientation','Mutation' => 'Mutation','Chparcours' => 'Changement de parcours','Retrait' => 'Retrait','Report' => 'Report'))
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

        /*$tableEtudiant = new Application_Model_Etudiant_DbTable();
        $user=$this->createElement('select', 'CIN')
        //->setLabel('CIN')
        ->setAttrib("class", "hidden")
        ->setMultiOptions(array("" => "- - Select - -") + $tableEtudiant->fetchPairs())
        ->setRequired(true);
       // echo $auth->getStorage()->read()->cin;
        $user->setValue($auth->getStorage()->read()->cin);
        $this->addElement($user);*/
        

		
      $this->addElement(
            $this->createElement('radio', 'etat')
                ->setLabel('Etat')
        		
                ->setMultiOptions(array('En Attente' => 'En Attente','Refuser' => 'Refuser','Accepter' => 'Accepter'))
        		
                ->setSeparator(" ")
        		->setAttrib("class", "")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('En Attente' => 'En Attente','Refuser' => 'Refuser','Accepter' => 'Accepter'))), true)
        );
		


        $this->addElement(
            $this->createElement('text', 'descriptif')
                ->setLabel('Descriptif')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge ")
        		
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

       $date= $this->createElement('text', 'date_demande')
        //->setLabel('Date Demande')
        ->setValue(date("Y-m-d H:i:s"))
        ->setAttrib("class", "input-medium hidden")
        
        ->addFilter(new Zend_Filter_StringTrim());
        
        $this->addElement($date);

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('class', 'btn btn-primary')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}

