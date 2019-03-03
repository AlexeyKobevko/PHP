<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{CSS}}">
    <title>{{TITLE}}</title>
</head>
<body>
<div class="menu">
    {{MENU}}
</div>
<div class="buttons">
    <form action="/product/createProduct.php">
        <button class="create" name="crud" type="submit" value="create">Добавить товар</button>
    </form>
</div>
<div class="catalog-wrapper">
    <div class="catalog">
        {{CONTENT}}
    </div>
</div>
</body>
</html>