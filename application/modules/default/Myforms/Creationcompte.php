<?php 

  
class Application_Myforms_Creationcompte  extends Zend_Form
{
    public function init()
    {
    	$urlhelper=Zend_Controller_Front::getInstance()->getBaseUrl();
    	
    	$decorator=array(
    			array('ViewHelper', array('tag'   => 'div', "class"=>"controls")),
    			array('Label' , array(  "class"=>"control-label",'style'=>' text-align:left;')),
    			'Errors',
    			new Zend_Form_Decorator_HtmlTag(array(
    					'tag'   => 'div', "class"=>"control-group"
    			))
    	);
    	
     
    	 
    	$decorator_radio =array(
    			array('ViewHelper', array('tag'   => 'div', "class"=>"controls")),
    			array(array('AddTheLi' => 'HtmlTag'), array('tag' => 'li')),
    			array(array('AddTheUl' => 'HtmlTag'), array('tag' => 'ul','style'=>'list-style-type: none;')),
    			'Errors',
    			array('Description', array('tag' => 'p', 'class' => 'description')), 
    			array('Label' , array(  "class"=>"control-label",'style'=>' text-align:left;')),
    			
    			new Zend_Form_Decorator_HtmlTag(array(
    					'tag'   => 'div', "class"=>"control-group"
    			))
    	 
    	);
    	
    	$translate = Zend_Registry::get('Zend_Translate');
    	$translate->setLocale('fr');
    	
    	 
    	
    	
    	$this->setName("ScolariteetudiantsForm");
    	
    	
	    $sex = new Zend_Form_Element_Radio('sex');
	    $sex->addMultiOptions(array('M'=>'M','F'=>'F' ));
	    $sex->setLabel($translate->_('Sexe  :'));
	    $sex->setRequired(true)
	    ->setAttrib('class',' validate[required]')
	    ->addDecorator('HtmlTag',array('tag' => 'div', 'id' => 'sex') );
	    $sex->setSeparator("");
	    	    
	   
	    
	    $nom = new Zend_Form_Element_Text('nom');
	    $nom->setRequired(true)
	    ->addValidators(array(new Zend_Validate_StringLength(3,45)))
	    ->setAttrib("class", " form-control  validate[required,minSize[3],maxSize[45]]")
	    ->setAttrib("style", "width:60%;");
	    $nom->setLabel($translate->_('nom').'* : ');
	    
	    $prenom = new Zend_Form_Element_Text('prenom');
	    $prenom->setRequired(true)
	    ->addValidators(array(  new Zend_Validate_StringLength(3,45)))
	    ->setAttrib("class", " form-control validate[required,minSize[3],maxSize[45]]")
	    ->setAttrib("style", "width:60%;");
	    $prenom->setLabel($translate->_('prenom').'* : ');  
	    
	    $email = new Zend_Form_Element_Text('email');
	    $email->setRequired(true)
	    ->setAttrib("class", "form-control validate[required,custom[email]]")
	    ->setAttrib("style", "width:60%;") 
	    ->setAttrib("onchange",  "AjaxVerif('".$urlhelper."/default/gestauth/verifuser',this.value,'email','emaildiv')");
	    $email->setLabel($translate->_('E-mail').' * : ');
	    
	    
	    
	    
	    $CIN = new Zend_Form_Element_Text('CIN');
	    $CIN->setRequired(true)
	    ->setAttrib("class", "form-control validate[required,maxSize[8],minSize[8]]")
	    ->addValidators(array(new Zend_Validate_Int(), new Zend_Validate_StringLength(8)))
	    ->setAttrib("style", "width:60%;")
	    ->setAttrib("onchange",  "AjaxVerif('".$urlhelper."/default/gestauth/verifuser',this.value,'cin','cindiv')");
	      $CIN->setLabel($translate->_('CIN').' * : ');
	      
	    
	    $ville= new Zend_Form_Element_Text('ville');
	    $ville->setRequired(false)
            ->setAttrib("class", "form-control ")
	    ->setAttrib("style", "width:60%;");;
	    $ville->setLabel($translate->_('ville').' * : ');
	    
	   
	    $listOptions=(array(
	    		'first'    => 'CESE1',
	    		'second' => 'CENS',
	    		'third' => 'CISM'
	    		));
	    	
 	    $lists = new Zend_Form_SubForm();
	    $lists->addElements(array(
	    		new Zend_Form_Element_Multiselect('nameOfMultiselect',array(
	    				'label' => 'Select all you can apply',
	    				'required' =>true,
	    				'filters' =>array('StringTrim'),
	    				'multiOptions' => $listOptions,
	    
	    				'validators'   => array(
	    						array('InArray', false, array(array_keys($listOptions)))
	    				)
	    		))
	    ));
	     
	     
	    
	    /*$pays_model=new Application_Model_DbTable_Pays();
	    $rows_pays=$pays_model->fetchAll()->toArray();
	    
	    
	    $pays= new Zend_Form_Element_Select('Nationalite');
	    $pays->setRequired(false)
	    ->setAttrib("style", "width:60%;");;
	    $pays->setLabel($translate->_('Nationalite').' * : ');
	    foreach ($rows_pays as $val){
	    	$pays->addMultiOption($val['CPAYS'],$val['LABEL']);
	    }
	    $pays->setValue("TN");*/
	    $password = new Zend_Form_Element_Password('password');
	    $password->setRequired(false);
	    $password->setAttrib("class", "form-control validate[required]  text-input")  ->setAttrib("style", "width:60%;");
	    $password->setLabel('Mot de passe');

	    $passwordcnf = new Zend_Form_Element_Password('passwordcnf');
	    $passwordcnf->setRequired(false)  ->setAttrib("style", "width:60%;");
	    $passwordcnf->setAttrib("class", "form-control validate[required,equals[password]]  text-input");
	    $passwordcnf->setLabel('Confirmer mot de passe');
	    
	     	    
	    /*****************ARABE**********************/
	     
	    $nom->setDecorators($decorator);
    
        $prenom->setDecorators($decorator);
       
         
        $sex->setDecorators($decorator_radio);
       
        $email->setDecorators($decorator);
        $passwordcnf->setDecorators($decorator);
        $password->setDecorators($decorator);
         $CIN->setDecorators($decorator);
         
        $sendBt = new Zend_Form_Element_Submit('submit');
        $sendBt->setLabel('Enregistrer');
        $sendBt->setAttrib('class', 'btn btn-primary');
		$sendBt->setAttrib('onclick', 'MyAjaxSubmit("messageconfigcp");return false;');
		
        $sendBt->setDecorators(array('ViewHelper'));
        
        
        $recaptchaKeys = Zend_Registry::get('config.recaptcha');
		
		
        $recaptcha = new Zend_Service_ReCaptcha($recaptchaKeys['pubkey'], $recaptchaKeys['privkey'],
        		NULL, array('theme' => 'clean'));
        
      
        $this->addElement('captcha', 'captcha', array(
        		'label'      => ' Réecrire les lettres ci dessus:',
        		'required'   => true,
        		'captcha'    => array(
        				'captcha' => 'Figlet',
        				'wordLen' => 5,
        				'timeout' => 300
        		)
        ));
        
        $this->addElements(array(
        		$nom, 
        		$prenom,
        		$sex,
        		$email,
        		$passwordcnf,
        		$password,
         		$CIN,
         		$sendBt 
        		) );
        
        
    }
    
	 
}