<?php

namespace Training\SimpleBlog\Block\Adminhtml\Post\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 *
 * @package Training\SimpleBlog\Block\Adminhtml\Post\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getPostId()) {
            $data = [
                'label' => __('Delete Post'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to do this?') . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    /**
     * @return string
     */
    protected function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['post_id' => (int)$this->getPostId()]);
    }
}
