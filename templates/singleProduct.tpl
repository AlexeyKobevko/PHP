<div class="product">
    <div class="photo"><a href="/product.php?id={{ID}}"><img src="{{IMAGE}}" alt="{{NAME}}"></a></div>
    <div class="name">{{NAME}}</div>
    <div class="price"><span>{{PRICE}} </span>руб.</div>
    <div class="btn"><button class="addToCart" data-id="{{ID}}">В корзину</button></div>
</div>
<div class="desc">{{DESCRIPTION}}</div>
<div class="buttons">
    <form action="/product/updateProduct.php?id={{ID}}" method="POST">
        <button class="update" name="id" type="submit" value="{{ID}}">Изменить товар</button>
    </form>
    <form action="/product/question.php?id={{ID}}" method="POST">
        <button class="delete" name="crud" type="submit" value="delete">Удалить товар</button>
    </form>
</div>