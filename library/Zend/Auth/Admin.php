<?php

class Zend_Auth_Admin extends Zend_Auth
{
    /**
     * Returns the persistent storage handler
     *
     * Session storage is used by default unless a different storage adapter has been set.
     *
     * @return Zend_Auth_Storage_Interface
     */
    public function getStorage()
    {
        if (null === $this->_storage) {
            $namespace = 'Zend_Auth_Admin'; // default is 'Zend_Auth'
            /**
             * @see Zend_Auth_Storage_Session
             */
            require_once 'Zend/Auth/Storage/Session.php';
            $this->setStorage(new Zend_Auth_Storage_Session($namespace));
        }

        return $this->_storage;
    }
}