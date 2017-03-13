<?php

namespace Training\SimpleBlog\Block\Adminhtml\Post\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use Training\SimpleBlog\Api\PostRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Training\SimpleBlog\Block\Adminhtml\Message\Edit
 */
class GenericButton
{
    /**
     * @var Context
     */
    private $context;
    /**
     * @var MessageRepositoryInterface
     */
    private $postRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * GenericButton constructor.
     *
     * @param Context $context
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        Context $context,
        PostRepositoryInterface $postRepository
    ) {
        $this->context = $context;
        $this->postRepository = $postRepository;
        $this->logger = $context->getLogger();
    }

    /**
     * Return CMS page ID
     *
     * @return int|null
     */
    public function getPostId()
    {
        try {
            return $this->postRepository->getById(
                $this->context->getRequest()->getParam('post_id')
            )->getId();
        } catch (NoSuchEntityException $exception) {
            $this->logger->critical($exception);
        }

        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
