<?php
//declare(strict_types=1);

namespace Challenges\Todo\Controller\Todo;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;
use Challenges\Todo\Model\TodoFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var TodoFactory
     */
    private $todoFactory;

    /**
     * @var TodoCollectionFactory
     */
    private $todoCollectionFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        TodoFactory $todoFactory,
        TodoCollectionFactory $todoCollectionFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->todoFactory = $todoFactory;
        $this->todoCollectionFactory = $todoCollectionFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     * @throws \Exception
     */
    public function execute()
    {
        $form = $this->getRequest()->getParams();

        $collection = $this->todoCollectionFactory->create();

        if (!isset($form['id'])) {
            $record = $this->todoFactory->create();
            $record->setTask($form['task']);
            $collection->addItem($record);
        } else {
            $record = $collection->getItemById($form['id']);
            $record->setTask($form['task']);
        }

        $collection->save();

        $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result->setUrl($this->_url->getDirectUrl('challenges/todo'));

        return $result;
    }
}
