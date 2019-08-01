<?php
//declare(strict_types=1);

namespace Challenges\Todo\Controller\Todo;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\RequestInterface;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;


class Index extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var TodoCollectionFactory
     */
    private $todoCollectionFactory;

    public function __construct(Context $context, PageFactory $pageFactory, TodoCollectionFactory $todoCollectionFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->todoCollectionFactory = $todoCollectionFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Todo list'));
        return $resultPage;
    }
}
