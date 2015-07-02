<?php

/**
 * Form definition for table etudiant.
 *
 * @package Bduma
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
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'prenom')
                ->setLabel('Prenom')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'datenaiss')
                ->setLabel('Datenaiss')
                ->setValue(date("Y-m-d"))
                ->setAttrib("class", "input-small")
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'lieunaiss')
                ->setLabel('Lieunaiss')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableVille = new Application_Model_Ville_DbTable();
        $this->addElement(
            $this->createElement('select', 'ville')
                ->setLabel('Ville')
                ->setMultiOptions(array("" => "- - Select - -") + $tableVille->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'pays')
                ->setLabel('Pays')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'nationalite')
                ->setLabel('Nationalite')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'genre')
                ->setLabel('Genre')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'adresse')
                ->setLabel('Adresse')
                ->setAttrib("maxlength", 30)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 30)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'codpostal')
                ->setLabel('Codpostal')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'numtel')
                ->setLabel('Numtel')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'annebac')
                ->setLabel('Annebac')
                ->setRequired(true)
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'branche')
                ->setLabel('Branche')
                ->setMultiOptions(array('Math' => 'Math','Technique' => 'Technique','Sc.expérimentales' => 'Sc.expérimentales','Lettres' => 'Lettres','Informatique' => 'Informatique'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Math' => 'Math','Technique' => 'Technique','Sc.expérimentales' => 'Sc.expérimentales','Lettres' => 'Lettres','Informatique' => 'Informatique'))), true)
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

        $this->addElement(
            $this->createElement('text', 'etablissement')
                ->setLabel('Etablissement')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'specialite')
                ->setLabel('Specialite')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'niveau')
                ->setLabel('Niveau')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'situationuniv')
                ->setLabel('Situationuniv')
                ->setAttrib("maxlength", 10)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 10)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'codeetab')
                ->setLabel('Codeetab')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
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
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Oui' => 'Oui','Non' => 'Non'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'userapprouvee')
                ->setLabel('Userapprouvee')
                ->setAttrib("maxlength", 20)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 20)), true)
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