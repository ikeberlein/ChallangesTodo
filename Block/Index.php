<?php

namespace Challenges\Todo\Block;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;
use Magento\Framework\View\Element\Template;

class Index extends Template
{
    /**
     * @var TodoCollectionFactory
     */
    private $collectionFactory;

    public function __construct(Template\Context $context, TodoCollectionFactory $todosFactory, $data = [])
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $todosFactory;
    }

    public function getTodoCollection()
    {
        return $this->collectionFactory->create();
    }

    public function getRecord()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id && ctype_digit($id)) {
            return $this->getTodoCollection()->getItemById($id);
        }

        return null;
    }

    public function getEditUrl($record)
    {
        return $this->getUrl('challenges/todo/edit', ['id' => $record->getId()]);
    }

    public function getDeleteFormUrl($record)
    {
        return $this->getUrl('challenges/todo/confirm', ['id' => $record->getId()]);
    }

    public function getDeleteUrl($record)
    {
        return $this->getUrl('challenges/todo/delete', ['id' => $record->getId()]);
    }

    public function getAddUrl()
    {
        return $this->getUrl('challenges/todo/edit');
    }

    public function getSaveUrl()
    {
        return $this->getUrl('challenges/todo/save');
    }
}
