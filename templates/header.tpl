$menu = [
    [
        'title' => 'Главная',
        'link' => '/',
    ],
    [
        'title' => 'О нас',
        'link' => '/about/',
    ],
    [
        'title' => 'Каталог',
        'link' => '/catalog/',
        'children' =>
        [
            [
                'title' => 'Мужская одежда',
                'link' => '/catalog/men/',
            ],
            [
                'title' => 'Женская лдежда',
                'link' => '/catalog/women/',
            ],
        ],
    ],
    [
        'title' => 'Галерея',
        'link' => '/gallery/',
    ],
    [
        'title' => 'Контакты',
        'link' => '/contacts/',
    ],
];