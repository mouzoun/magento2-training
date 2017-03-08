<?php

namespace Training\SimpleBlog\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Training\SimpleBlog\Api\Data\PostInterface;

/**
 * Interface PostRepositoryInterface
 *
 * @package  Training\SimpleBlog\Api
 */
interface PostRepositoryInterface
{
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
	public function save(PostInterface $post);

	/**
	 * Get info about post by $postId
	 *
	 * @param  int $postId
	 *
	 * @return PostInterface
	 * @throws NoSuchEntityException
	 */
	public function getById($postId);

	/**
	 * Delete post
	 *
	 * @param  PostInterface $post
	 *
	 * @return bool Will returned True if deleted
	 * @throws StateException
	 */
	public function delete(PostInterface $post);

	/**
	 * Delete post by ID
	 *
	 * @param int $postId
	 *
	 * @return bool Will returned True if deleted
	 * @throws NoSuchEntityException
	 * @throws StateException
	 */
	public function deleteById($postId);
}
