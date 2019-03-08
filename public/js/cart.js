$('.addToCart').click((e) => {
    let $id = $(e.target).data('id');
    console.log($id);

    $.post({
        url: '/api.php',
        data: {
            apiMethod: 'good',
            postData: {
                id: $id,
            }},
        success: function (data) {
            console.log(data);
        }
    });
});
