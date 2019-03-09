function login() {
    const $login_input = $('#login');
    const $password_input = $('#password');

    const login = $login_input.val();
    const password = $password_input.val();

    const $error_field = $('.errors');

    $.post({
        url: '/api.php',
        data: {
            apiMethod: 'login',
            postData: {
                login: login,
                password: password
            }
        },
        success: function (data) {
            //data = JSON.parse(data);
            if (data.error) {
                $error_field.text(data.error_text);
            } else {
                // location.reload();
                location = "/profile.php";
            }
        }
    });
}

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

    $.post({
        url: '/api.php',
        data: {
            apiMethod: 'removeFromCart',
            postData: {
                id: $id,
            }},
        success: function (data) {
            if (data === 'OK') {
                $('[data-id="' + $id + '"]').remove();
            } else {
                alert(data);
            }
        }
    });
});
