<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ves\Testimonial\Model\Api;

use Ves\Testimonial\Api\CategoryRepositoryInterface;
use Ves\Testimonial\Api\Data\CategoryInterfaceFactory;
use Ves\Testimonial\Api\Data\CategorySearchResultsInterfaceFactory;
use Ves\Testimonial\Model\CategoryFactory;
use Ves\Testimonial\Model\ResourceModel\Category as ResourceCategory;
use Ves\Testimonial\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $categoryCollectionFactory;

    protected $dataObjectProcessor;

    protected $resource;

    protected $extensionAttributesJoinProcessor;

    protected $categoryFactory;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;

    protected $dataCategoryFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourceCategory $resource
     * @param CategoryFactory $categoryFactory
     * @param CategoryInterfaceFactory $dataCategoryFactory
     * @param CategoryCollectionFactory $categoryCollectionFactory
     * @param CategorySearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCategory $resource,
        CategoryFactory $categoryFactory,
        CategoryInterfaceFactory $dataCategoryFactory,
        CategoryCollectionFactory $categoryCollectionFactory,
        CategorySearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->categoryFactory = $categoryFactory;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCategoryFactory = $dataCategoryFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Ves\Testimonial\Api\Data\CategoryInterface $category
    ) {
        $categoryData = $this->extensibleDataObjectConverter->toNestedArray(
            $category,
            [],
            \Ves\Testimonial\Api\Data\CategoryInterface::class
        );
        
        $categoryModel = $this->categoryFactory->create()->setData($categoryData);
        
        try {
            $this->resource->save($categoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the category: %1',
                $exception->getMessage()
            ));
        }
        return $categoryModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($categoryId)
    {
        $category = $this->categoryFactory->create();
        $this->resource->load($category, $categoryId);
        if (!$category->getId()) {
            throw new NoSuchEntityException(__('Category with id "%1" does not exist.', $categoryId));
        }
        return $category->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->categoryCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ves\Testimonial\Api\Data\CategoryInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->categoryCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ves\Testimonial\Api\Data\CategoryInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $collection->addFieldToFilter("is_active", 1);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Ves\Testimonial\Api\Data\CategoryInterface $category
    ) {
        try {
            $categoryModel = $this->categoryFactory->create();
            $this->resource->load($categoryModel, $category->getCategoryId());
            $this->resource->delete($categoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Category: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($categoryId)
    {
        return $this->delete($this->get($categoryId));
    }
}

