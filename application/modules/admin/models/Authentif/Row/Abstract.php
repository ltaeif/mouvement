<?php

/**
 * Row definition class for table authentif.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Authentif_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $nom
 * @property string $prenom
 * @property string $module
 */
abstract class Application_Model_Authentif_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Authentif_Row
     */
    public function setId($Id)
    {
        $this->id = $Id;
        return $this;
    }

    /**
     * Get value of 'id' field
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value for 'login' field
     *
     * @param string $Login
     *
     * @return Application_Model_Authentif_Row
     */
    public function setLogin($Login)
    {
        $this->login = $Login;
        return $this;
    }

    /**
     * Get value of 'login' field
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set value for 'password' field
     *
     * @param string $Password
     *
     * @return Application_Model_Authentif_Row
     */
    public function setPassword($Password)
    {
        $this->password = $Password;
        return $this;
    }

    /**
     * Get value of 'password' field
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set value for 'nom' field
     *
     * @param string $Nom
     *
     * @return Application_Model_Authentif_Row
     */
    public function setNom($Nom)
    {
        $this->nom = $Nom;
        return $this;
    }

    /**
     * Get value of 'nom' field
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set value for 'prenom' field
     *
     * @param string $Prenom
     *
     * @return Application_Model_Authentif_Row
     */
    public function setPrenom($Prenom)
    {
        $this->prenom = $Prenom;
        return $this;
    }

    /**
     * Get value of 'prenom' field
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set value for 'module' field
     *
     * @param string $Module
     *
     * @return Application_Model_Authentif_Row
     */
    public function setModule($Module)
    {
        $this->module = $Module;
        return $this;
    }

    /**
     * Get value of 'module' field
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Get a list of rows of Personnel.
     *
     * @return Application_Model_Personnel_Rowset
     */
    public function getPersonnelRowsByAuthentifId()
    {
        return $this->findDependentRowset('Application_Model_Personnel_DbTable', 'authentif_id');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->login;
    }
}
