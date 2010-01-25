<?php

class Rotor_Lucene_IndexController extends Mage_Core_Controller_Front_Action
{
    var $_index;
    
    public function indexAction()
    {
        $index = Mage::getSingleton('lucene/index');
        foreach($this->getRequest()->getParams() as $key=>$value) {
            $index->addFilter($key, $value);
        }
        $this->loadLayout();
        $this->renderLayout();
    }

    public function createIndexAction()
    {
        Mage::getSingleton('lucene/index_document_category')->indexAll();
    }

}