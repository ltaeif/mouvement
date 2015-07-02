<?php

/**
 * Row definition class for table member.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Move
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Member_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $email
 * @property string $gender
 * @property string $date_registered
 */
abstract class Application_Model_Member_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Member_Row
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
     * Set value for 'email' field
     *
     * @param string $Email
     *
     * @return Application_Model_Member_Row
     */
    public function setEmail($Email)
    {
        $this->email = $Email;
        return $this;
    }

    /**
     * Get value of 'email' field
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set value for 'gender' field
     *
     * @param string $Gender
     *
     * @return Application_Model_Member_Row
     */
    public function setGender($Gender)
    {
        $this->gender = $Gender;
        return $this;
    }

    /**
     * Get value of 'gender' field
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set value for 'date_registered' field
     *
     * @param string $DateRegistered
     *
     * @return Application_Model_Member_Row
     */
    public function setDateRegistered($DateRegistered)
    {
        $this->date_registered = $DateRegistered;
        return $this;
    }

    /**
     * Get value of 'date_registered' field
     *
     * @return string
     */
    public function getDateRegistered()
    {
        return $this->date_registered;
    }

    /**
     * Get a list of rows of Post.
     *
     * @return Application_Model_Post_Rowset
     */
    public function getPostRowsByOwnerId()
    {
        return $this->findDependentRowset('Application_Model_Post_DbTable', 'owner_id');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->email;
    }
}
