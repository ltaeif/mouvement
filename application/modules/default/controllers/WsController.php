<?php

include APPLICATION_PATH ."/modules/default/services/Dataservices.php";

class Genform_WsController extends Zend_Controller_Action
{
	 
    public function indexAction()
    {
    	//ob_start();
    	
    	$this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
    	if(isset($_GET['wsdl'])) {
    		$autodiscover = new Zend_Soap_AutoDiscover();
    		$autodiscover->setClass('Application_Modules_Default_Service_Dataservices');
    		$autodiscover->handle();
    	} else {
    		// pointing to the current file here
    		$confi_webservice=Zend_Registry::get('config');
    		$soap = new Zend_Soap_Server("$confi_webservice->WebServiceGform");
    		$soap->setClass('Application_Modules_Default_Service_Dataservices');
    		$soap->handle();
    	}
   
    }
}