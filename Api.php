<?php

class api
{

    const ALL_PRODUCTS_API = 'https://dummyjson.com/products';
    const PRODUCT_API_BY_ID = 'https://dummyjson.com/products/';
    const PRODUCT_CATEGORIES_API = 'https://dummyjson.com/products/categories/';
    const PRODUCT_API_BY_CATEGORY = 'https://dummyjson.com/products/category/';


    /**
     * @return array|string
     */
    public function getAllProduct()
    {
        $allProductsApi = self::ALL_PRODUCTS_API;
        $jsonData = file_get_contents($allProductsApi);

        if ($jsonData != null) {
            return json_decode($jsonData, true);

        } else {
            return "Error decoding JSON data or missing 'products' not available";

        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductById($id)
    {

        $productApiById = self::PRODUCT_API_BY_ID . $id;

        $jsonData = file_get_contents($productApiById);

        if ($jsonData != null) {
            return json_decode($jsonData, true);
        } else {
            return "Error decoding JSON data or missing 'product' id";
        }

    }

    /**
     * @return mixed
     */
    public function getProductCategories()
    {
        $productCategoriesApi = self::PRODUCT_CATEGORIES_API;

        $jsonData = file_get_contents($productCategoriesApi);

        if ($jsonData != null) {
            return json_decode($jsonData, true);
        } else {
            return "Error decoding JSON data or missing 'categories' not available";
        }
    }

    public function getProductByCategory($category)
    {
        $productApiByCategory = self::PRODUCT_API_BY_CATEGORY . $category;

        $jsonData = file_get_contents($productApiByCategory);

        if ($jsonData != null) {
            return json_decode($jsonData, true);
        } else {
            return "Error decoding JSON data or missing 'category' not available";
        }
    }
}