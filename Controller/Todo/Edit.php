<?php
//declare(strict_types=1);

namespace Challenges\Todo\Controller\Todo;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;


class Edit extends Action
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
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->pageFactory->create();

        if (isset($id)) {
            $pageTitle = __('Edit Todo');
        } else {
            $pageTitle = __('New Todo');
        }

        $resultPage->getConfig()->getTitle()->prepend($pageTitle);

        return $resultPage;
    }
}
