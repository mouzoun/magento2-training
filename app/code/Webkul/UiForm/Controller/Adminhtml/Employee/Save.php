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
namespace Webkul\UiForm\Controller\Adminhtml\Employee;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
 
class Save extends Action
{
    /**
     * @param Action\Context $context
     * @param \Webkul\UiForm\Model\EmployeeFactory $employee
     */
    public function __construct(
        Action\Context $context,
        \Webkul\UiForm\Model\EmployeeFactory $employee
    ) {
        $this->_employee = $employee;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if (!$this->getRequest()->isPost()) {
            $this->messageManager->addError(__("Something went wrong"));
            return $resultRedirect->setPath('*/*/');
        }
        $data = $this->getRequest()->getPostValue();
        $id = (int) $this->getRequest()->getParam("id");
        if ($id > 0) {
            $this->_employee->create()->addData($data)->setId($id)->save();
        } else {
            $this->_employee->create()->setData($data)->save();
        }
        $this->messageManager->addSuccess(__('Data saved succesfully'));
        return $resultRedirect->setPath('*/*/');
    }
}