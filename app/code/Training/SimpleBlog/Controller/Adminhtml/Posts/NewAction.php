<?php

namespace Training\SimpleBlog\Controller\Adminhtml\Posts;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;

/**
 * Class NewAction
 *
 * @package Training\SimpleBlog\Controller\Adminhtml\Index
 */
class NewAction extends Action
{
	/**
	 * Dispatch request
	 *
	 * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
	 * @throws \Magento\Framework\Exception\NotFoundException
	 */
	public function execute()
	{
           /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
            $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
            
            return $resultForward->forward('edit');
	}
}
