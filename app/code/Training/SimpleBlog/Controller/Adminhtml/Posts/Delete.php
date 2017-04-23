<?php

namespace Training\SimpleBlog\Controller\Adminhtml\Posts;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Training\SimpleBlog\Api\PostRepositoryInterface;

/**
 * Class Save
 *
 * @package Training\SimpleBlog\Controller\Adminhtml\Posts
 */
class Delete extends Action
{
    
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * Delete constructor.
     *
     * @param Context $context
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(Context $context, PostRepositoryInterface $postRepository)
    {
        parent::__construct($context);
        $this->postRepository = $postRepository;
    }

    /**
     * Dispatch request
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('post_id')) {
            
            
            try {
                $this->postRepository->deleteById($id);
                // display success message
                $this->messageManager->addSuccess(__('You deleted the posts successfully.'));

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());

                // go back to edit form
                return $resultRedirect->setPath('*/*/');
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a post to delete.'));

        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
