<?php

/**
 * Row definition class for table post.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Move
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Post_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $date_posted
 * @property integer $category_id
 * @property integer $owner_id
 */
abstract class Application_Model_Post_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Post_Row
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
     * Set value for 'title' field
     *
     * @param string $Title
     *
     * @return Application_Model_Post_Row
     */
    public function setTitle($Title)
    {
        $this->title = $Title;
        return $this;
    }

    /**
     * Get value of 'title' field
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set value for 'content' field
     *
     * @param string $Content
     *
     * @return Application_Model_Post_Row
     */
    public function setContent($Content)
    {
        $this->content = $Content;
        return $this;
    }

    /**
     * Get value of 'content' field
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set value for 'date_posted' field
     *
     * @param string $DatePosted
     *
     * @return Application_Model_Post_Row
     */
    public function setDatePosted($DatePosted)
    {
        $this->date_posted = $DatePosted;
        return $this;
    }

    /**
     * Get value of 'date_posted' field
     *
     * @return string
     */
    public function getDatePosted()
    {
        return $this->date_posted;
    }

    /**
     * Set value for 'category_id' field
     *
     * @param integer $CategoryId
     *
     * @return Application_Model_Post_Row
     */
    public function setCategoryId($CategoryId)
    {
        $this->category_id = $CategoryId;
        return $this;
    }

    /**
     * Get value of 'category_id' field
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set value for 'owner_id' field
     *
     * @param integer $OwnerId
     *
     * @return Application_Model_Post_Row
     */
    public function setOwnerId($OwnerId)
    {
        $this->owner_id = $OwnerId;
        return $this;
    }

    /**
     * Get value of 'owner_id' field
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * Get a row of Category.
     *
     * @return Application_Model_Category_Row
     */
    public function getCategoryRowByCategoryId()
    {
        return $this->findParentRow('Application_Model_Category_DbTable', 'category_id');
    }

    /**
     * Get a row of Member.
     *
     * @return Application_Model_Member_Row
     */
    public function getMemberRowByOwnerId()
    {
        return $this->findParentRow('Application_Model_Member_DbTable', 'owner_id');
    }

    /**
     * Get a list of rows of Tag.
     *
     * @return Application_Model_Tag_Rowset
     */
    public function getTagRowset()
    {
        return $this->findManyToManyRowset('Application_Model_Tag_DbTable', 'Application_Model_PostsTags_DbTable', 'tag_id');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->title;
    }
}
