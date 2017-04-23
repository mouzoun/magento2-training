<?php

namespace Training\SimpleBlog\Controller\Adminhtml\Posts;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
use Training\SimpleBlog\Model\PostFactory;
use Training\SimpleBlog\Api\Data\PostInterfaceFactory;
use Training\SimpleBlog\Api\PostRepositoryInterface;


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
     * @var PostRepositoryInterface
     */
    private $postRepository;
    
    /**
     * Save constructor.
     *
     * @param Action\Context $context
     * @param PostInterfaceFactory $postFactory
     * @param PostRepositoryInterface $postRepository
     * 
     */
    public function __construct(
        Action\Context $context,
        PostInterfaceFactory $postFactory,
        PostRepositoryInterface  $postRepository
            
    ) {
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data = $this->getRequest()->getPostValue()) {
            $id = $this->getRequest()->getParam('post_id');
            
            if (empty($data['post_id'])) {
                $data['post_id'] = null;
            }
             /** @var Post $post */
            $post = $this->postFactory->create()->load($id);
            
            if (!$post->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This post no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
                    
            $post->setData($data);
            
            try {
                $this->postRepository->save($post);
                $this->messageManager->addSuccessMessage(__('You saved the post.'));
                
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the posr.'));
            }
            return $resultRedirect->setPath('*/*/');

        }
    }
    
}
