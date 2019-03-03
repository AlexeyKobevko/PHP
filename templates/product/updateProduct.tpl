<div class="add-wrapper">
    <form class="add-product" action="" method="POST">
        <input name="name" type="text" placeholder="Name" value="{{NAME}}">
        <textarea name="description" cols="30" rows="10" placeholder="Description" required>{{DESCRIPTION}}</textarea>
        <input name="price" type="text" placeholder="Price" value="{{PRICE}}">
        <input name="image" type="text" placeholder="Image" value="{{IMAGE}}">
        <div class="add-buttons">
            <button type="reset">Сброс</button>
            <button type="submit">Изменить товар</button>
        </div>
        <div class="message-result">{{MESSAGE}}</div>
    </form>
</div>