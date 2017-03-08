<?php

namespace Training\SimpleBlog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;
use Training\SimpleBlog\Api\Data\PostInterface;

/**
 * Class Post
 *
 * @package Training\SimpleBlog\Model\ResourceModel
 */
class Post extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(PostInterface::BLOG_MAIN_TABLE, PostInterface::POST_ID);
    }
}
