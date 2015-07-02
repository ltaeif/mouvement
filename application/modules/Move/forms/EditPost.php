<?php

/**
 * Form definition for table post.
 *
 * @package Move
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditPost extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'title')
                ->setLabel('Title')
                ->setAttrib("maxlength", 250)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 250)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('textarea', 'content')
                ->setLabel('Content')
                ->setAttrib("class", "input-xxlarge")
                ->setAttrib("rows", "15")
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'date_posted')
                ->setLabel('Date Posted')
                ->setValue(date("Y-m-d H:i:s"))
                ->setAttrib("class", "input-medium")
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableCategory = new Application_Model_Category_DbTable();
        $this->addElement(
            $this->createElement('select', 'category_id')
                ->setLabel('Category Id')
                ->setMultiOptions(array("" => "- - Select - -") + $tableCategory->fetchPairs())
                ->setRequired(true)
        );

        $tableMember = new Application_Model_Member_DbTable();
        $this->addElement(
            $this->createElement('select', 'owner_id')
                ->setLabel('Owner Id')
                ->setMultiOptions(array("" => "- - Select - -") + $tableMember->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('class', 'btn btn-primary')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}