<?php

function getProducts()
{
    $sql = "SELECT * FROM `products`";

    return getAssocResult($sql);
}

function getProduct($id)
{
    $sql = "SELECT * FROM `products` WHERE `id` = $id";

    return show($sql);
}

function createProducts()
{
    $result ='';

    $products = getProducts();

    foreach ($products as $product) {
        $result .= render(TEMPLATES_DIR . 'catalogItem.tpl', $product);
    }

    return $result;
}

function showProduct($id)
{
    $product = getProduct($id);

    if (!$product) {
        return '404';
    }

    return render(TEMPLATES_DIR . 'singleProduct.tpl', $product);
}