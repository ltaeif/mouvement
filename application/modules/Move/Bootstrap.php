<?php
class Move_Bootstrap extends Zend_Application_Module_Bootstrap 
{
	protected $_moduleName = 'Move';
	
protected function _initConfiguration()
	{
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config); 
		
		$options = $this->getApplication()->getOptions();
	
		set_include_path(implode(PATH_SEPARATOR, array(
				realpath(APPLICATION_PATH . '/modules/' . $this->_moduleName . '/models'),
				realpath(APPLICATION_PATH . '/modules/' . $this->_moduleName . '/forms'),
				get_include_path(),
		))); 
		return $options;
	}
	 protected function _initDatabase()
	{
		$options = $this->getApplication()->getOptions();
		$db = Zend_Db::factory(
							$options['database']['adapter'],
							 array(
								 /*'port'=>getenv('OPENSHIFT_MYSQL_DB_PORT')
								 ,'username'=>$options['database']['params']['username']
								 ,'password'=>$options['database']['params']['password']
								 ,'dbname'=>$options['database']['params']['dbname']
								 ,'host'=>getenv('OPENSHIFT_MYSQL_DB_HOST') */
								
								 'port'=>3306
								,'username'=>$options['database']['params']['username']
								,'password'=>$options['database']['params']['password']
								,'dbname'=>$options['database']['params']['dbname']
								,'host'=>'localhost' 
								)
							+ array('driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")));
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		Zend_Registry::set('DB', $db);
	
		return $db;
	
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
		$viewRenderer->setView($view);
	
		return $view;
	}
	
	


 protected function _initAutoload()
	{
		
		$this->options = $this->getOptions();
		 
		//Zend_Registry::set('config.recaptcha', $this->options['recaptcha']);
		
		 
		$autoloader =new Zend_Application_Module_Autoloader(
				array(
				'namespace' => 'Application_', 
				'basePath'=> APPLICATION_PATH)
				);
		$autoloader->addResourceType('form',  '/modules/' . $this->_moduleName.'/forms', 'Form')
		->addResourceType('model', '/modules/' . $this->_moduleName.'/models/', 'Model');
		//->addResourceType('extable',  '/ExTable/', 'ExTable')
		//->addResourceType('mforms',  '/modules/' . $this->_moduleName.'/mforms/', 'MForm');
		return $autoloader;
	
	}

	/*protected function _initTranslate()
	{
		 $translate = new Zend_Translate('tmx',
				APPLICATION_PATH . '/modules/' . $this->_moduleName . "/langues/",	null,array('scan' => Zend_Translate::LOCALE_DIRECTORY));
		$registry = Zend_Registry::getInstance();
		 
		$locale = new Zend_Locale('browser');
		$translate->setLocale($locale->getLanguage());
		 
		$registry->set('Zend_Translate', $translate); 
	}*/
	
	/*protected function _initNavigation() {
	 
		 $view = $this->bootstrap('layout')->getResource('layout')->getView();
	 	
		$path= APPLICATION_PATH . '/modules/' . $this->_moduleName. '/configs/nav.xml';
		 
		$config = new Zend_Config_Xml($path, 'nav');
		$view->navigation(new Zend_Navigation($config)); 
	 
	}*/
	
}