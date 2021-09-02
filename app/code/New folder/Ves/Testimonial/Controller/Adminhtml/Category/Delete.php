<?php
/**
 * Venustheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://venustheme.com/license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category  Venustheme
 * @package   Ves_Testimonial
 * @copyright Copyright (c) 2017 Landofcoder (http://www.venustheme.com/)
 * @license   http://www.venustheme.com/LICENSE-1.0.html
 */

namespace Ves\Testimonial\Controller\Adminhtml\Category;

class Delete extends \Magento\Backend\App\Action
{


    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ves_Testimonial::category_delete');

    }//end _isAllowed()


    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('category_id');
        /*
            *
            *
            * @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect
        */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create('Ves\Testimonial\Model\Category');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('The category has been deleted.'));
                // go to grid
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    [
                     'title'  => $title,
                     'status' => 'success',
                    ]
                );
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    [
                     'title'  => $title,
                     'status' => 'fail',
                    ]
                );
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['category_id' => $id]);
            }//end try
        }//end if

        // display error message
        $this->messageManager->addError(__('We can\'t find a category to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');

    }//end execute()


}//end class
