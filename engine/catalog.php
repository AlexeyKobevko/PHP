<?php

require_once __DIR__ . '/../config/config.php';

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

    return render((isAdmin()) ? TEMPLATES_DIR . 'admin/adminSingleProduct.tpl' : TEMPLATES_DIR . 'singleProduct.tpl', $product);
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

function generateMyOrdersPage()
{
    $user_id = $_SESSION['login']['id'];
    $orders = getAssocResult("SELECT * FROM `orders` WHERE `user_id` = $user_id");

    $result ='';
    foreach ($orders as $order) {
        $order_id = $order['id'];
        $products = getAssocResult("
            SELECT * FROM `orders_products` as op
            JOIN `products` as `p` ON `p`.`id` = `op`.`product_id`
            WHERE `order_id` = $order_id");

        $content = '';
        $total = 0;
        foreach ($products as $product) {
            $name = $product['name'];
            $id = $product['id'];
            $count = $product['amount'];
            $price = $product['price'];
            $productSum = $count * $price;
            $content .= render(TEMPLATES_DIR . 'product/orderTableRow.tpl', [
                'name' => $name,
                'id' => $id,
                'count' => $count,
                'price' => $price,
                'sum' => $productSum
            ]);
            $total += $productSum;
        }

        $statuses = [
            0 => 'Заказ оформлен',
            1 => 'Заказ собирается',
            2 => 'Заказ готов',
            3 => 'Заказ завершён',
            4 => 'Заказ отменён',
        ];

        $result .= render(TEMPLATES_DIR . 'product/orderTable.tpl', [
            'id' => $order_id,
            'content' => $content,
            'sum' => $total,
            'status' => $statuses[$order['status']]
        ]);
    }
    return $result;
}
