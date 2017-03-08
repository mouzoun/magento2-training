<?php

namespace Training\SimpleBlog\Model;

use Magento\Framework\Model\AbstractModel;
use Training\SimpleBlog\Api\Data\PostInterface;
use Training\SimpleBlog\Model\ResourceModel\Post as ResourcePost;

/**
 * Class Post
 *
 * @package Training\SimpleBlog\Model
 */

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(ResourcePost::class);
    }

    /**
     * Getter of post id
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }

    /**
     * Setter of post id
     *
     * @param  int $postId
     * @return $this
     */
    public function setPostId($postId)
    {
        return $this->setData(self::POST_ID, $postId);
    }
    
     /**
     * Getter of order title
     *
     * @return string
     */
    public function getPostTitle()
    {
        return $this->getData(self::POST_TITLE);
    }

    /**
     * Setter of post title
     *
     * @param  string $postTitle
     * @return $this
     */
    public function setPostTitle($postTitle)
    {
        return $this->setData(self::POST_TITLE, $postTitle);
    }

    /**
     * Getter of post content
     *
     * @return string
     */
    public function getPostContent()
    {
        return $this->getData(self::POST_CONTENT);
    }

    /**
     * Setter of post content
     *
     * @param  string $postContent
     * @return $this
     */
    public function setPostContent($postContent)
    {
        return $this->setData(self::POST_CONTENT, $postContent);
    }

    /**
     * Getter of post description
     *
     * @return string
     */
    public function getPostDescription()
    {
        return $this->getData(self::POST_CONTENT);
    }

    /**
     * Setter of post description
     *
     * @param  string $postDescription
     * @return $this
     */
    public function setpostDescription($postDescription)
    {
        return $this->setData(self::POST_DESCRIPTION, $postDescription);
    }

    /**
     * Getter of post date
     *
     * @return string
     */
    public function getPostDate()
    {
        return $this->getData(self::POST_DATE);
    }

    /**
     * Setter of post date
     *
     * @param  string $postDate
     * @return $this
     */
    public function setPostDate($postDate)
    {
        return $this->setData(self::POST_DATE, $postDate);
    }
}
