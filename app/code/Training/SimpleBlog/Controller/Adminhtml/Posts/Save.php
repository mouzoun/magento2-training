<?php

namespace Training\SimpleBlog\Controller\Adminhtml\Posts;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Training\SimpleBlog\Model\PostFactory;

/**
 * Class Save
 *
 * @package Training\SimpleBlog\Controller\Adminhtml\Posts
 */
class Save extends Action{
    
    /**
     * @var PostInterfaceFactory
     */
    private $postFactory;
    /**
     * @param Action\Context $context
     * @param \Webkul\UiForm\Model\EmployeeFactory $employee
     */
    public function __construct(
        Action\Context $context,
        PostFactory $postFactory
    ) {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    
}
