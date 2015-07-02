<?php
class Default_Bootstrap extends Zend_Application_Module_Bootstrap 
{
	protected $_moduleName = 'default';
	
protected function _initConfiguration()
	{	
		//var_dump($this->getOptions());
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config);
		 
		
		$options = $this->getApplication()->getOptions();
	
		set_include_path(implode(PATH_SEPARATOR, array(
				realpath(APPLICATION_PATH . '/modules/' . $this->_moduleName . '/models'),
				get_include_path(),
		)));
		
			
		return $options;
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


	protected function _initAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
				'namespace' => 'Application_',
				'basePath'  => APPLICATION_PATH . '/modules/' . $this->_moduleName,
				'resourceTypes' => array (
						'form' => array(
								'path' => 'forms',
								'namespace' => 'Form',
						),
						'model' => array(
								'path' => 'models',
								'namespace' => 'Model',
						),
				)
		));
		return $autoloader;
	
	}

	protected function _initTranslate()
	{
		$translate = new Zend_Translate('tmx',
				APPLICATION_PATH . '/modules/' . $this->_moduleName . "/langues/",	null,array('scan' => Zend_Translate::LOCALE_DIRECTORY));
		$registry = Zend_Registry::getInstance();
		
		
		$locale = new Zend_Locale('browser');
		$translate->setLocale($locale->getLanguage());
		

	 
		$registry->set('Zend_Translate', $translate);
	}
	
	protected function _initSmarty()
	{
		
		/* 
		$smarty = new Ext_View_Smarty($this->getOption('smarty'));
	
		Zend::register('smarty', $smarty);
		*/
	}
	
	
}