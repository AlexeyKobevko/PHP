$('.addToCart').click((e) => {
    let $id = $(e.target).data('id');
    console.log($id);

    $.post({
        url: '/api.php',
        data: {
            apiMethod: 'addToCart',
            postData: {
                id: $id,
            }},
        success: function (data) {
            if (data === 'OK') {
                alert('Товар добавлен в корзину');
            } else {
                alert(data);
            }
        }
    });
});

$('.removeFromCart').click((e) => {
    let $id = $(e.target).data('id');
    console.log($id);
});