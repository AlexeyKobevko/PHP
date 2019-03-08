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
