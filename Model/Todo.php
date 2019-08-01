<?php

namespace Challenges\Todo\Model;

use Magento\Framework\Model\AbstractModel;

class Todo extends AbstractModel
{
    protected $_eventPrefix = 'challenges_todo';
    protected $_eventObject = 'todo';

    protected function _construct()
    {
        $this->_init('Challenges\Todo\Model\ResourceModel\Todo');
    }
}
