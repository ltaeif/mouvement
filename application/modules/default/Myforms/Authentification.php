<?php

class Application_Myforms_Authentification extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setMethod('post');
    	
    	$this->addElement(
    			'text', 'email', array(
    					'label' => 'Email',
    					'required' => true,
    					"class"=>"form-control",
    					'filters'    => array('StringTrim'),
    			));
    	
    	$this->addElement('password', 'password', array(
    			'label' => 'Mot de passe :',
    			"class"=>"form-control",
    			'required' => true,
    	));
    	
    	$this->addElement('submit', 'submit', array(
    			'ignore'   => true,
    			'label'    => 'Acceder',
    			'class'=>'"btn btn-lg btn-success btn-block"'
    	));
    	
    	 
    }
    



}

