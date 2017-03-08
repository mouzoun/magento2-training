<?php

namespace Training\SimpleBlog\Api\Data;

/**
 * Interface PostInterface
 *
 * @package Training\SimpleBlog\Api\Data
 */
interface PostInterface
{
    const BLOG_MAIN_TABLE = 'blog_posts';
    const POST_ID = 'post_id';
    const POST_TITLE = 'post_title';
    const POST_DESCRIPTION = 'post_description';
    const POST_CONTENT = 'post_content';
    const POST_DATE = 'post_date';    

    /**
     * Getter of post id
     *
     * @return int
     */
    public function getPostId();

    /**
     * Setter of post id
     *
     * @param  int $postId
     *
     * @return $this
     */
    public function setPostId($postId);

    /**
     * Getter of post title
     *
     * @return string
     */
    public function getPostTitle();

    /**
     * Setter of post title
     *
     * @param  string $postTitle
     *
     * @return $this
     */
    public function setPostTitle($postTitle);

    /**
     * Getter of post description
     *
     * @return string
     */
    public function getPostDescription();

    /**
     * Setter of post description
     *
     * @param  string $postDescription
     *
     * @return $this
     */
    public function setpostDescription($postDescription);

    /**
     * Getter of post content
     *
     * @return string
     */
    public function getPostContent();

    /**
     * Setter of post content
     *
     * @param  string $postContent
     *
     * @return $this
     */
    public function setpostContent($postContent);    

    /**
     * Getter of post content
     *
     * @return string
     */
    public function getPostDate();

    /**
     * Setter of post content
     *
     * @param  string $postDate
     *
     * @return $this
     */
    public function setPostDate($postDate);
}
