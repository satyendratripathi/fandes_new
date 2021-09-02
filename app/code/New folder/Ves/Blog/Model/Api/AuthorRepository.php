<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ves\Blog\Model\Api;

use Ves\Blog\Api\AuthorRepositoryInterface;
use Ves\Blog\Api\Data\AuthorInterfaceFactory;
use Ves\Blog\Api\Data\AuthorSearchResultsInterfaceFactory;
use Ves\Blog\Model\AuthorFactory;
use Ves\Blog\Model\ResourceModel\Author as ResourceAuthor;
use Ves\Blog\Model\ResourceModel\Author\CollectionFactory as AuthorCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class AuthorRepository implements AuthorRepositoryInterface
{

    protected $authorCollectionFactory;

    protected $dataObjectProcessor;

    protected $resource;

    protected $extensionAttributesJoinProcessor;

    protected $authorFactory;

    private $collectionProcessor;

    protected $extensibleDataObjectConverter;
    private $storeManager;

    protected $dataAuthorFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourceAuthor $resource
     * @param AuthorFactory $authorFactory
     * @param AuthorInterfaceFactory $dataAuthorFactory
     * @param AuthorCollectionFactory $authorCollectionFactory
     * @param AuthorSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceAuthor $resource,
        AuthorFactory $authorFactory,
        AuthorInterfaceFactory $dataAuthorFactory,
        AuthorCollectionFactory $authorCollectionFactory,
        AuthorSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->authorFactory = $authorFactory;
        $this->authorCollectionFactory = $authorCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataAuthorFactory = $dataAuthorFactory;
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
        \Ves\Blog\Api\Data\AuthorInterface $author
    ) {
        $authorData = $this->extensibleDataObjectConverter->toNestedArray(
            $author,
            [],
            \Ves\Blog\Api\Data\AuthorInterface::class
        );
        
        $authorModel = $this->authorFactory->create()->setData($authorData);
        
        try {
            $this->resource->save($authorModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the author: %1',
                $exception->getMessage()
            ));
        }
        return $authorModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($authorId)
    {
        $author = $this->authorFactory->create();
        $this->resource->load($author, $authorId);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__('Author with id "%1" does not exist.', $authorId));
        }
        return $author->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function view($authorId)
    {
        $author = $this->authorFactory->create();
        $this->resource->load($author, $authorId);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__('Author with id "%1" does not exist.', $authorId));
        }
        if (!$author->getIsView()) {
            throw new NoSuchEntityException(__('Author with id "%1" does not exist.', $authorId));
        }
        return $author->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->authorCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ves\Blog\Api\Data\AuthorInterface::class
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
        $collection = $this->authorCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Ves\Blog\Api\Data\AuthorInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        $collection->addFieldToFilter("is_view", 1);
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
        \Ves\Blog\Api\Data\AuthorInterface $author
    ) {
        try {
            $authorModel = $this->authorFactory->create();
            $this->resource->load($authorModel, $author->getAuthorId());
            $this->resource->delete($authorModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Author: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($authorId)
    {
        return $this->delete($this->get($authorId));
    }
}

