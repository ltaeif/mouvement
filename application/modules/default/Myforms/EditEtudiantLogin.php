<?php

/**
 * Form definition for table etudiant.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
 
	
class Application_Myforms_EditEtudiantLogin extends Zend_Form
{
    public function init()
    {	
		
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'cin')
                
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
		
		/*$auth = Zend_Auth::getInstance();
		 $user=$this->createElement('text', 'CIN')
        ->setAttrib("class", "hidden")
        ->setRequired(true);
        $user->setValue($auth->getStorage()->read()->cin);
        $this->addElement($user);*/

     

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('class', 'btn btn-primary')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}