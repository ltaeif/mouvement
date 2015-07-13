<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap 
{
	protected $_moduleName = 'admin';
	
protected function _initConfiguration()
	{
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config);
		 
		
		$options = $this->getApplication()->getOptions();
	
		set_include_path(implode(PATH_SEPARATOR, array(
				realpath(APPLICATION_PATH .'/models'),
				get_include_path(),
		)));
		
			
		return $options;
	}
	protected function _initAutoload()
	{
	
		$this->options = $this->getOptions();
			
		Zend_Registry::set('config.recaptcha', $this->options['recaptcha']);
	
			
		$autoloader =new Zend_Application_Module_Autoloader(
				array(
						'namespace' => 'Application_',
						'basePath'=> APPLICATION_PATH)
		);
		$autoloader
		->addResourceType('form',  '/modules/' . $this->_moduleName.'/forms', 'Form')
		->addResourceType('model',  '/modules/' . $this->_moduleName.'/models/', 'Model')
		->addResourceType('Myforms',  '/modules/' . $this->_moduleName.'/Myforms', 'Myforms')
		->addResourceType('Mytables', '/modules/' . $this->_moduleName. '/Mytables/', 'Mytables');
		return $autoloader;
	
	}
	protected function _initDatabase()
	{
		$options = $this->getApplication()->getOptions();
		$db = Zend_Db::factory(
				$options['database']['adapter'],
				$options['database']['params']
				+ array('driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")));
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		Zend_Registry::set('DB', $db);
	
		return $db;
	}
	
	 
	protected function _initView()
	{
		$view = new Zend_View();
		$view->setEncoding('UTF-8');
		$view->doctype('XHTML1_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
				'ViewRenderer'
		);
		
		$etudiantstore=Application_Mytables_Authentif::getCurrent();
		//print_r($etudiantstore);
		$view->etudiantstore = $etudiantstore;


		
		$viewRenderer->setView($view);
		
		return $view;
	}



    protected function _initNavigationXml()
    {
       /* $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $config = new Zend_Config_Xml(APPLICATION_PATH.'/configs/navigation.xml');

        $navigation = new Zend_Navigation($config);
        $view->navigation($navigation);
        */
    }



	/**
	 * @return Zend_Navigation
	 */
	protected function _initNavigation() {
		
		
		$user=Zend_Auth::getInstance()->getIdentity();
		$role="guest";
	 	
		
		$view =
		$this->bootstrap('layout')->getResource('layout')->getView();
		
		
		$this->bootstrap('frontController');
		$request = $this->getResource('frontController')->getRequest();
		$controller = $request->getControllerName();
		
		 $path= APPLICATION_PATH . '/modules/' . $this->_moduleName . '/configs/nav.xml';
		 
		
		$config = new Zend_Config_Xml($path, 'nav');
		$view->navigation(new Zend_Navigation($config));
		 
	}
	
	
	protected function _initAcl()
	{
			
	
	 
			
			
	}

	

	protected function _initTranslate()
	{	
		$locale = new Zend_Locale('browser');
		
		$translate = new Zend_Translate(
				'tmx',
				APPLICATION_PATH . '/modules/' . $this->_moduleName . "/langues/",	
				$locale->getLanguage(),
				array('scan' => Zend_Translate::LOCALE_DIRECTORY));
		$registry = Zend_Registry::getInstance();
		
		
		/*$locale = new Zend_Locale('browser');
		
		$translate->setLocale($locale->getLanguage());*/
		$registry->set('Zend_Translate', $translate);
	}
	
	/*debbich bassem jabess 
	26 495 147*/
	
	protected function _initMail()
	{
		try {
			$config = array(
					'auth' => 'login',
					'username' => 'oussama.limam@gmail.com',
					'password' => 'AZERTY',
					'ssl' => 'tls',
					'port' => 587
			);
	
			$mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
			Zend_Mail::setDefaultTransport($mailTransport);
		} catch (Zend_Exception $e){
			//Do something with exception
		}
	}
	
	
	protected function _initSmarty()
	{
		
		/* 
		$smarty = new Ext_View_Smarty($this->getOption('smarty'));
	
		Zend::register('smarty', $smarty);
		*/
	}
	
}