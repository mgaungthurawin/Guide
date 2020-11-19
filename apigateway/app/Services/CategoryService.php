<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class CategoryService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume categoriess service
     * @var string
     */
    public $baseUri;

    /**
     * Categoryization secret to pass to categories api
     * @var string
     */

    public function __construct()
    {
        // $this->baseUri = config('services')['categories']['base_uri'];
        $this->baseUri = "http://97d563e9cded.ngrok.io";
    }


    /**
     * Obtain the full list of categories from the categories service
     */
    public function obtainCategories()
    {
        return $this->performRequest('GET', '/categories');
    }

    /**
     * Create Category
     */
    public function createCategory($category)
    {
        return $this->performRequest('POST', '/categories', $category);
    }

    /**
     * Get a single categories data
     */
    public function obtainCategory($category)
    {
        return $this->performRequest('GET', "/categories/{$category}");
    }

    /**
     * Edit a single categories data
     */
    public function editCategory($data, $category)
    {
        return $this->performRequest('PUT', "/categories/{$category}", $data);
    }

    /**
     * Delete an Category
     */
    public function deleteCategory($category)
    {
        return $this->performRequest('DELETE', "/categories/{$category}");
    }
}