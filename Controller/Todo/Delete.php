<?php
//declare(strict_types=1);

namespace Challenges\Todo\Controller\Todo;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var TodoCollectionFactory
     */
    private $todoCollectionFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        TodoCollectionFactory $todoCollectionFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->todoCollectionFactory = $todoCollectionFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     * @throws \Exception
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if (isset($id)) {
            $collection = $this->todoCollectionFactory->create();
            $record = $collection->getItemById($id);
            if (isset($record)) {
                $record->getResource()->delete($record);
            }
        }

        $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result->setUrl($this->_url->getDirectUrl('challenges/todo'));

        return $result;
    }
}
