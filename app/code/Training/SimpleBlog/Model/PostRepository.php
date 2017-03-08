<?php
namespace Training\SimpleBlog\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Training\SimpleBlog\Api\PostRepositoryInterface;
use Training\SimpleBlog\Api\Data\PostInterface;
use Training\SimpleBlog\Model\ResourceModel\Post as ResourcePost;
use Training\SimpleBlog\Model\PostFactory;

/**
 * Class PostRepositoryInterface
 *
 * @package Training\SimpleBlog\Model
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;
    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * @param ResourcePost $resource
     * @param PostFactory $postFactory     
     */
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
    }

    /**
     * Create post
     *
     * @param  PostInterface $post
     *
     * @return PostInterface
     * @throws InputException
     * @throws StateException
     * @throws CouldNotSaveException
     */
    public function save(PostInterface $post)
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the post: %1', $exception->getMessage()));
        }

        return $post;
    }
    
    /**
    * Get info about post by $postId
    *
    * @param  int $postId
    *
    * @return PostInterface
    * @throws NoSuchEntityException
    */
    public function getById($postId)
    {
        $post = $this->postFactory->create();
        $post->load($postId);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Post with id "%1" does not exist.', $postId));
        }

        return $post;
    }

    /**
    * Delete post
    *
    * @param  PostInterface $post
    *
    * @return bool Will returned True if deleted
    * @throws StateException
    */
    public function delete(PostInterface $post)
    {
        try {
            $this->resource->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __(
                    'Could not delete the post: %1',
                    $exception->getMessage()
                )
            );
        }

        return true;
    }

    /**
    * Delete post by ID
    *
    * @param int $postId
    *
    * @return bool Will returned True if deleted
    * @throws NoSuchEntityException
    * @throws StateException
    */
    public function deleteById($postId)
    {
        return $this->delete($this->getById($postId));
    }         
      
}

