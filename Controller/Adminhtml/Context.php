<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  2011-2015 ESS-UA [M2E Pro]
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Controller\Adminhtml;

use Magento\Backend\App\Action\Context as ActionContext;
use Ess\M2ePro\Model\Factory as ModelFactory;
use Ess\M2ePro\Model\ActiveRecord\Factory as ActiveRecordFactory;
use Ess\M2ePro\Model\ActiveRecord\Component\Parent\Factory as ParentFactory;
use Ess\M2ePro\Helper\Factory as HelperFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\Controller\Result\RawFactory;
use \Magento\Framework\View\LayoutFactory;
use Ess\M2ePro\Block\Adminhtml\Magento\Renderer\CssRenderer;

class Context extends ActionContext
{
    /** @var HelperFactory $helperFactory */
    protected $helperFactory = NULL;

    /** @var ModelFactory $modelFactory */
    protected $modelFactory = NULL;

    /** @var ParentFactory */
    protected $parentFactory = NULL;

    /** @var ActiveRecordFactory $activeRecordFactory */
    protected $activeRecordFactory = NULL;

    /** @var PageFactory $resultPageFactory */
    protected $resultPageFactory = NULL;

    /** @var \Magento\Framework\Controller\Result\RawFactory $resultRawFactory  */
    protected $resultRawFactory = NULL;

    /** @var \Magento\Framework\View\LayoutFactory $layoutFactory */
    protected $layoutFactory = NULL;

    /** @var CssRenderer|null  */
    protected $cssRenderer = NULL;

    /** @var \Magento\Framework\App\ResourceConnection|null  */
    protected $resourceConnection = NULL;

    protected $magentoConfig = NULL;

    public function __construct(
        CssRenderer $cssRenderer,
        ModelFactory $modelFactory,
        ParentFactory $parentFactory,
        ActiveRecordFactory $activeRecordFactory,
        HelperFactory $helperFactory,
        PageFactory $resultPageFactory,
        RawFactory $resultRawFactory,
        LayoutFactory $layoutFactory,
        \Magento\Framework\App\ResourceConnection $resourceConnection,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\App\ResponseInterface $response,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag,
        \Magento\Framework\App\ViewInterface $view,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        ResultFactory $resultFactory, \Magento\Backend\Model\Session $session,
        \Magento\Framework\AuthorizationInterface $authorization,
        \Magento\Backend\Model\Auth $auth,
        \Magento\Backend\Helper\Data $helper,
        \Magento\Backend\Model\UrlInterface $backendUrl,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \Magento\Framework\Locale\ResolverInterface $localeResolver,
        \Magento\Config\Model\Config $magentoConfig,
        $canUseBaseUrl = false
    )
    {
        $this->cssRenderer = $cssRenderer;

        $this->modelFactory  = $modelFactory;
        $this->parentFactory  = $parentFactory;
        $this->activeRecordFactory  = $activeRecordFactory;
        $this->helperFactory = $helperFactory;
        $this->resultPageFactory = $resultPageFactory;

        $this->resultRawFactory = $resultRawFactory;
        $this->layoutFactory = $layoutFactory;

        $this->resourceConnection = $resourceConnection;

        $this->magentoConfig = $magentoConfig;

        parent::__construct(
            $request,
            $response,
            $objectManager,
            $eventManager,
            $url,
            $redirect,
            $actionFlag,
            $view,
            $messageManager,
            $resultRedirectFactory,
            $resultFactory,
            $session,
            $authorization,
            $auth,
            $helper,
            $backendUrl,
            $formKeyValidator,
            $localeResolver,
            $canUseBaseUrl
        );
    }

    /**
     * @return HelperFactory
     */
    public function getHelperFactory()
    {
        return $this->helperFactory;
    }

    /**
     * @return ModelFactory
     */
    public function getModelFactory()
    {
        return $this->modelFactory;
    }

    /**
     * @return ParentFactory
     */
    public function getParentFactory()
    {
        return $this->parentFactory;
    }

    /**
     * @return ActiveRecordFactory
     */
    public function getActiveRecordFactory()
    {
        return $this->activeRecordFactory;
    }

    /**
     * @return PageFactory
     */
    public function getResultPageFactory()
    {
        return $this->resultPageFactory;
    }

    /**
     * @return RawFactory
     */
    public function getResultRawFactory()
    {
        return $this->resultRawFactory;
    }

    /**
     * @return LayoutFactory
     */
    public function getLayoutFactory()
    {
        return $this->layoutFactory;
    }

    /**
     * @return CssRenderer|null
     */
    public function getCssRenderer()
    {
        return $this->cssRenderer;
    }

    /**
     * @return \Magento\Framework\App\ResourceConnection|null
     */
    public function getResourceConnection()
    {
        return $this->resourceConnection;
    }

    /**
     * @return \Magento\Config\Model\Config
     */
    public function getMagentoConfig()
    {
        return $this->magentoConfig;
    }
}