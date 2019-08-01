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

class Confirm extends Action
{
    /**
     * @var TodoCollectionFactory
     */
    private $todoCollectionFactory;

    public function __construct(
        Context $context,
        TodoCollectionFactory $todoCollectionFactory
    ) {
        parent::__construct($context);
        $this->todoCollectionFactory = $todoCollectionFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     * @throws \Exception
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if (!isset($id)) {
            $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $result->setUrl($this->_url->getDirectUrl('challenges/todo'));
        } else {
            $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            $result->getConfig()->getTitle()->prepend(__('Confirm delete'));
        }

        return $result;
    }
}
