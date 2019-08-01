<?php

namespace Challenges\Todo\Model\ResourceModel\Todo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'challenges_todo_collection';
    protected $_eventObject = 'todo_collection';

    protected function _construct()
    {
        $this->_init('Challenges\Todo\Model\Todo', 'Challenges\Todo\Model\ResourceModel\Todo');
    }
}
