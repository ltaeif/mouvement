<?php

/**
 * Row definition class for table inscription.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Inscription_Row setFromArray($data)
 *
 * @property integer $codeins
 * @property string $nom
 * @property string $prenom
 * @property integer $cin
 * @property integer $tel
 * @property string $login
 * @property string $password
 */
abstract class Application_Model_Inscription_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'codeins' field
     *
     * @param integer $Codeins
     *
     * @return Application_Model_Inscription_Row
     */
    public function setCodeins($Codeins)
    {
        $this->codeins = $Codeins;
        return $this;
    }

    /**
     * Get value of 'codeins' field
     *
     * @return integer
     */
    public function getCodeins()
    {
        return $this->codeins;
    }

    /**
     * Set value for 'nom' field
     *
     * @param string $Nom
     *
     * @return Application_Model_Inscription_Row
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
     * @return Application_Model_Inscription_Row
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
     * Set value for 'cin' field
     *
     * @param integer $Cin
     *
     * @return Application_Model_Inscription_Row
     */
    public function setCin($Cin)
    {
        $this->cin = $Cin;
        return $this;
    }

    /**
     * Get value of 'cin' field
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set value for 'tel' field
     *
     * @param integer $Tel
     *
     * @return Application_Model_Inscription_Row
     */
    public function setTel($Tel)
    {
        $this->tel = $Tel;
        return $this;
    }

    /**
     * Get value of 'tel' field
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set value for 'login' field
     *
     * @param string $Login
     *
     * @return Application_Model_Inscription_Row
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
     * @return Application_Model_Inscription_Row
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
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->nom;
    }
}
