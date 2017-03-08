<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Webkul\UiForm\Model;

use Webkul\UiForm\Api\Data\EmployeeInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Employee extends \Magento\Framework\Model\AbstractModel implements EmployeeInterface, IdentityInterface
{
    /**
     * No route page id
     */
    const NOROUTE_ENTITY_ID = 'no-route';

    /**
     * UiForm Employee cache tag
     */
    const CACHE_TAG = 'uiform_employee';

    /**
     * @var string
     */
    protected $_cacheTag = 'uiform_employee';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'uiform_employee';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webkul\UiForm\Model\ResourceModel\Employee');
    }

    /**
     * Load object data
     *
     * @param int|null $id
     * @param string $field
     * @return $this
     */
    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRouteEmployee();
        }
        return parent::load($id, $field);
    }

    /**
     * Load No-Route Employee
     *
     * @return \Webkul\UiForm\Model\Employee
     */
    public function noRouteEmployee()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Webkul\UiForm\Api\Data\EmployeeInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}
