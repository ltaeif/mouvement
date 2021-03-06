<?php
class Bluess_Modules_Loader extends Zend_Controller_Plugin_Abstract
{
	protected $_modules;
	protected $_defaultRole = 'guest';
	public function __construct(array $modulesList) 
	{
		$this->_modules = $modulesList;
	}
	
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
	{
		
		$module = $request->getModuleName();
		
		if (!isset($this->_modules[$module])) {
		 
			throw new Exception("Module does not exist!");
		}

		$bootstrapPath = $this->_modules[$module];
		
		$bootstrapFile = dirname($bootstrapPath) . '/Bootstrap.php';
        $class         = ucfirst($module) . '_Bootstrap';
        $application   = new Zend_Application(
        	APPLICATION_ENV,
    		APPLICATION_PATH . '/modules/' . $module . '/configs/module.ini'
		);  

        if (Zend_Loader::loadFile('Bootstrap.php', dirname($bootstrapPath)) 
        	&& class_exists($class)) {
            $bootstrap = new $class($application);
            $bootstrap->bootstrap();
        }
	}
	
	
	 public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
        // $authstr= Zend_Auth::getInstance ();
		// $user=Zend_Auth::getInstance()->getIdentity();
		// print_r($authstr);exit;;
		 //echo $this->getRequest()->getModuleName()." ".$user->module;
         $controller=$this->getRequest()->getControllerName();
		 $module=$this->getRequest()->getModuleName();
		 
		 if($module=='default')
		 {



				  if ($controller!="gestauth") {
					 
						 if (Zend_Auth::getInstance ()->hasIdentity () ) {  
							$user=Zend_Auth::getInstance()->getIdentity();
							$module =$this->getRequest()->getModuleName();
							
							//if($this->getRequest()->getModuleName()!='default' && $user->module!=$this->getRequest()->getModuleName()){
							if($this->getRequest()->getModuleName()!='default' ){
								$this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
								->setControllerName("gestauth")
								->setActionName("logout"); 
							}else{
								return;
							}
							
							return; 
						}else{ 
							
							$this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
									->setControllerName("gestauth")
									->setActionName("login"); 
							} 
							 
						}
			}
			elseif($module=='admin')
			{

               /* if ($controller!="gestauth") {
                    $auth=Zend_Auth::getInstance ();
                    $auth->getStorage();
                    if ($auth->hasIdentity () ) {
                        $user=$auth->getIdentity();
                        $module =$this->getRequest()->getModuleName();

                        //if($this->getRequest()->getModuleName()!='default' && $user->module!=$this->getRequest()->getModuleName()){
                        if($this->getRequest()->getModuleName()!='default' ){
                            $this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
                                ->setControllerName("gestauth")
                                ->setActionName("logout");
                        }else{
                            return;
                        }

                        return;
                    }else{

                        $this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
                            ->setControllerName("gestauth")
                            ->setActionName("login");
                    }

                }*/




                //print_r(Zend_Auth_Admin::getInstance ());

               /* if ($controller!="gestauth") {
                    print_r(Zend_Auth_Admin::getInstance ());
                    print_r(Zend_Auth::getInstance ());
                    if (Zend_Auth_Admin::getInstance ()->hasIdentity () ) {
                        $user=Zend_Auth_Admin::getInstance()->getIdentity();
                        $module =$this->getRequest()->getModuleName();

                        //if($this->getRequest()->getModuleName()!='admin' && $user->module!=$this->getRequest()->getModuleName()){
                        if($this->getRequest()->getModuleName()!='admin' ){
                            $this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
                                ->setControllerName("gestauth")
                                ->setActionName("logout");
                        }else{
                            return;
                        }

                        return;
                    }else{

                        $this->getRequest ()->setModuleName($this->getRequest()->getModuleName())
                            ->setControllerName("gestauth")
                            ->setActionName("login");
                    }

                }*/

			}
	} 
		 

}