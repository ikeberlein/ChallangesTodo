<?php
//declare(strict_types=1);

namespace Challenges\Todo\Controller\Todo;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

use Challenges\Todo\Model\ResourceModel\Todo\CollectionFactory as TodoCollectionFactory;


class Edit extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        if (isset($id)) {
            $pageTitle = __('Edit Todo');
        } else {
            $pageTitle = __('New Todo');
        }

        $resultPage->getConfig()->getTitle()->prepend($pageTitle);

        return $resultPage;
    }
}
