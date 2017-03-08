<?php

namespace Training\SimpleBlog\Controller\Post;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Training\SimpleBlog\Api\Data\PostInterface;
use Training\SimpleBlog\Api\Data\PostInterfaceFactory;
use Training\SimpleBlog\Api\PostRepositoryInterface;
use Training\SimpleBlog\Controller\RegistryConstants;

/**
 * Class Builder
 *
 * @package Training\SimpleBlog\Controller\Adminhtml\Post
 */
class Builder
{
    /**
     * @var PostInterfaceFactory
     */
    private $postFactory;
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;
    /**
     * @var Registry
     */
    private $registry;

    /**
     * Builder constructor.
     *
     * @param PostInterfaceFactory $postFactory
     * @param PostRepositoryInterface $postRepository
     * @param Registry $registry
     */
    public function __construct(
        PostInterfaceFactory $postFactory,
        PostRepositoryInterface $postRepository,
        Registry $registry
    ) {
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
        $this->registry = $registry;
    }

    /**
     * @param RequestInterface $request
     * @return PostInterface
     */
    public function build(RequestInterface $request): PostInterface
    {
        
        if ($postId = $request->getParam('post_id')) {
          
            try {
                $post = $this->postRepository->getById($postId);
            } catch (NoSuchEntityException $exception) {
            }
        }
       
        if (!isset($post)) {
            $post = $this->postFactory->create();
        }

        // Register current $post
        $this->registry->register(RegistryConstants::CURRENT_POST, $post);       

        return $post;
    }
}
