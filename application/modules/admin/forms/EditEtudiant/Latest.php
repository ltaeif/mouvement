<?php

/**
 * Form definition for table etudiant.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditEtudiant_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'cin')
                
        );

        $this->addElement(
            $this->createElement('text', 'nom')
                ->setLabel('Nom')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'prenom')
                ->setLabel('Prenom')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'date_naissance')
                ->setLabel('Date Naissance')
                ->setValue(date("Y-m-d"))
                ->setAttrib("class", "input-small")
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'lieu_naissance')
                ->setLabel('Lieu Naissance')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableVille = new Application_Model_Ville_DbTable();
        $this->addElement(
            $this->createElement('select', 'ville')
                ->setLabel('Ville')
                ->setMultiOptions(array("" => "- - Select - -") + $tableVille->fetchPairs())
                ->setRequired(true)
        );

        $tablePays = new Application_Model_Pays_DbTable();
        $this->addElement(
            $this->createElement('select', 'pays')
                ->setLabel('Pays')
                ->setMultiOptions(array("" => "- - Select - -") + $tablePays->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'nationalite')
                ->setLabel('Nationalite')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'passeport')
                ->setLabel('Passeport')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'genre')
                ->setLabel('Genre')
                ->setMultiOptions(array('Male' => 'Male','Female' => 'Female'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Male' => 'Male','Female' => 'Female'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'adresse')
                ->setLabel('Adresse')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'code_postal')
                ->setLabel('Code Postal')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'tel')
                ->setLabel('Tel')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'annee_bac')
                ->setLabel('Annee Bac')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'branche')
                ->setLabel('Branche')
                ->setMultiOptions(array('Math' => 'Math','Technique' => 'Technique','Sc.experimentales' => 'Sc.experimentales','Lettres' => 'Lettres','Informatique' => 'Informatique'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Math' => 'Math','Technique' => 'Technique','Sc.experimentales' => 'Sc.experimentales','Lettres' => 'Lettres','Informatique' => 'Informatique'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'session')
                ->setLabel('Session')
                ->setMultiOptions(array('Principal' => 'Principal','Contrôle' => 'Contrôle'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Principal' => 'Principal','Contrôle' => 'Contrôle'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'mention')
                ->setLabel('Mention')
                ->setMultiOptions(array('Moyen' => 'Moyen','Assez Bien' => 'Assez Bien','Bien' => 'Bien','Très Bien' => 'Très Bien'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Moyen' => 'Moyen','Assez Bien' => 'Assez Bien','Bien' => 'Bien','Très Bien' => 'Très Bien'))), true)
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement')
                ->setLabel('Etablissement')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'specialite')
                ->setLabel('Specialite')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'niveau')
                ->setLabel('Niveau')
                ->setMultiOptions(array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere annee' => '1ere annee','2eme annee' => '2eme annee','3eme annee' => '3eme annee'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'situation_universitaire')
                ->setLabel('Situation Universitaire')
                ->setAttrib("maxlength", 100)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 100)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'login')
                ->setLabel('Login')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'password')
                ->setLabel('Password')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'actif')
                ->setLabel('Actif')
                ->setMultiOptions(array('Oui' => 'Oui','Non' => 'Non'))
                ->setSeparator(" ")
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