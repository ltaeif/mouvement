<?php

/**
 * Row definition class for table tag.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Move
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Tag_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $name
 * @property integer $post_count
 */
abstract class Application_Model_Tag_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Tag_Row
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
     * Set value for 'name' field
     *
     * @param string $Name
     *
     * @return Application_Model_Tag_Row
     */
    public function setName($Name)
    {
        $this->name = $Name;
        return $this;
    }

    /**
     * Get value of 'name' field
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value for 'post_count' field
     *
     * @param integer $PostCount
     *
     * @return Application_Model_Tag_Row
     */
    public function setPostCount($PostCount)
    {
        $this->post_count = $PostCount;
        return $this;
    }

    /**
     * Get value of 'post_count' field
     *
     * @return integer
     */
    public function getPostCount()
    {
        return $this->post_count;
    }

    /**
     * Get a list of rows of Post.
     *
     * @return Application_Model_Post_Rowset
     */
    public function getPostRowset()
    {
        return $this->findManyToManyRowset('Application_Model_Post_DbTable', 'Application_Model_PostsTags_DbTable', 'post_id');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->name;
    }
}
