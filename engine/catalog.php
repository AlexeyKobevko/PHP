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

function insertProduct($name, $desc, $price, $image)
{
    $db = createConnection();

    $name = escapeString($db, $name);

    $desc = escapeString($db, $desc);

    $price = escapeString($db, $price);

    $image = escapeString($db, $image);

    $sql = "INSERT INTO `products`(`name`, `description`, `price`, `image`) VALUES ('$name', '$desc', '$price', '$image')";

    return execQuery($sql, $db);
}

function updateProduct($name, $desc, $price, $image, $id)
{
    $db = createConnection();

    $name = escapeString($db, $name);

    $desc = escapeString($db, $desc);

    $price = escapeString($db, $price);

    $image = escapeString($db, $image);

    $sql = "UPDATE `products` SET `name` = '$name', `description` = '$desc', `price` = '$price', `image` = '$image' WHERE `id` = '$id'";

    return execQuery($sql, $db);
}

function deleteProduct($id)
{
    $db = createConnection();

    $sql = "DELETE FROM `products` WHERE `id` = '$id'";


    return execQuery($sql, $db);
}

function renderProductsCart($cart)
{
    if (empty($cart)) {
        return 'Корзина пуста';
    }

    $ids = array_keys($cart);

    $sql = "SELECT * FROM `products` WHERE `id` IN (" . implode(', ', $ids) . ")";

    $products = getAssocResult($sql);

    $result = '';
    $total = 0;
    foreach ($products as $product) {
        $name = $product['name'];
        $id = $product['id'];
        $count = $cart[$product['id']];
        $price = $product['price'];
        $productSum = $count * $price;
        $result .= render(TEMPLATES_DIR . 'product/cartListItem.tpl', [
            'name' => $name,
            'id' => $id,
            'count' => $count,
            'price' => $price,
            'sum' => $productSum
        ]);
        $total += $productSum;
    }
    return render(TEMPLATES_DIR . 'product/cartList.tpl', [
        'content' => $result,
        'sum' => $total
    ]);
}