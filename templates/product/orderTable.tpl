<h3>Заказ #{{ID}}</h3>
<div>Статус заказа: {{STATUS}}</div>
<table>
    <thead>
    <tr>
        <td>Название</td>
        <td>Стоимость</td>
        <td>Количество</td>
        <td>Сумма</td>
    </tr>
    </thead>
    <tbody>
    {{CONTENT}}
    <tr>
        <td colspan="3">Итого</td>
        <td>{{SUM}}</td>
    </tr>
    <tr>
        <td colspan="3">Отменить заказ</td>
        <td ><button class="order-cancel" data-id="{{ID}}">Отменить</button></td>
    </tr>
    </tbody>
</table>