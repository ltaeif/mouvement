<?php

/**
 * Row definition class for table files.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Files_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $name
 * @property integer $size
 * @property string $type
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $date
 * @property integer $codedem
 */
abstract class Application_Model_Files_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Files_Row
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
     * @return Application_Model_Files_Row
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
     * Set value for 'size' field
     *
     * @param integer $Size
     *
     * @return Application_Model_Files_Row
     */
    public function setSize($Size)
    {
        $this->size = $Size;
        return $this;
    }

    /**
     * Get value of 'size' field
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set value for 'type' field
     *
     * @param string $Type
     *
     * @return Application_Model_Files_Row
     */
    public function setType($Type)
    {
        $this->type = $Type;
        return $this;
    }

    /**
     * Get value of 'type' field
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value for 'url' field
     *
     * @param string $Url
     *
     * @return Application_Model_Files_Row
     */
    public function setUrl($Url)
    {
        $this->url = $Url;
        return $this;
    }

    /**
     * Get value of 'url' field
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set value for 'title' field
     *
     * @param string $Title
     *
     * @return Application_Model_Files_Row
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
     * Set value for 'description' field
     *
     * @param string $Description
     *
     * @return Application_Model_Files_Row
     */
    public function setDescription($Description)
    {
        $this->description = $Description;
        return $this;
    }

    /**
     * Get value of 'description' field
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value for 'date' field
     *
     * @param string $Date
     *
     * @return Application_Model_Files_Row
     */
    public function setDate($Date)
    {
        $this->date = $Date;
        return $this;
    }

    /**
     * Get value of 'date' field
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set value for 'codedem' field
     *
     * @param integer $Codedem
     *
     * @return Application_Model_Files_Row
     */
    public function setCodedem($Codedem)
    {
        $this->codedem = $Codedem;
        return $this;
    }

    /**
     * Get value of 'codedem' field
     *
     * @return integer
     */
    public function getCodedem()
    {
        return $this->codedem;
    }

    /**
     * Get a row of Demande.
     *
     * @return Application_Model_Demande_Row
     */
    public function getDemandeRowByCodedem()
    {
        return $this->findParentRow('Application_Model_Demande_DbTable', 'codedem');
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
