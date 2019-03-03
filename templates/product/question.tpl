<div class="sure">
    <div class="question">Синюю или красную, Нео?</div>
   <div class="forms-block">
       <form action="/catalog.php">
           <button class="create" type="submit">Передумать</button>
       </form>
       <form action="/product/deleteProduct.php?id={{ID}}" method="post">
           <button name="id" class="delete" type="submit" value="{{ID}}">Удалить</button>
       </form>
   </div>
</div>