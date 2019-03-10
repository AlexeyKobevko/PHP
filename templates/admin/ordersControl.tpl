<h3>Заказ #{{ID}}</h3>
<div>Статус заказа: {{STATUS}}</div>
<table>
    <thead>
    <tr>
        <td>Название</td>
        <td>Стоимость</td>
        <td>Количество</td>
        <td>Сумма</td>
        <td>Статус заказа</td>
        <td>Отменить заказ</td>
    </tr>

    </thead>
    <tbody>
    {{CONTENT}}
    <tr>
        <td colspan="3">Итого</td>
        <td>{{SUM}}</td>
        <td><button class="order-status" data-id="{{ID}}">Изменить</button></td>
        <td><button class="order-cancel" data-id="{{ID}}">Отменить</button></td>
    </tr>
    </tbody>
</table>