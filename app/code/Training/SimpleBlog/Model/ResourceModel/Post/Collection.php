<?php

namespace Training\SimpleBlog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Training\SimpleBlog\Model\ResourceModel\Post
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Training\SimpleBlog\Model\Post', 'Training\SimpleBlog\Model\ResourceModel\Post');
    }
}
