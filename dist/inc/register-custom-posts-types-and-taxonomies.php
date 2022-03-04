<?php

add_action( 'init', function() {

  // Массив с данными постов и таксономий для их регистрации в wordpress
  $post_types = [
    'service' => [
      'name' => 'Услуги',
      'singular_name' => 'Услуга',
      'supports' => [ 'title', 'thumbnail' ],
      'taxonomies' => [
        'service_category' => [
          'name' => 'Категории',
          'singular_name' => 'Категория'
        ]
      ]
    ],

    'case' => [
      'name' => 'Кейсы',
      'singular_name' => 'Кейс',
      'supports' => [ 'title', 'thumbnail' ],
      'taxonomies' => [
        'case_category' => [
          'name' => 'Направления',
          'singular_name' => 'Направление'
        ]
      ]
    ],

    'partner' => [
      'name' => 'Партнеры',
      'singular_name' => 'Партнер',
      'supports' => [ 'title', 'thumbnail' ],
      'taxonomies' => [
        'partner_category' => [
          'name' => 'Направления',
          'singular_name' => 'Направление'
        ]
      ]
    ],
  ];

  foreach ( $post_types as $post_type => $post_data ) {

    $register_post_type_args = [
      'label'  => null,
      'labels' => [
        'name'               => $post_data['name'],
        'singular_name'      => $post_data['singular_name'],
        'add_new'            => 'Добавить',
        'add_new_item'       => 'Добавление',
        'edit_item'          => 'Редактирование',
        'new_item'           => 'Новое ',
        'view_item'          => 'Смотреть',
        'search_items'       => 'Искать',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon'  => '',
        'menu_name'          => $post_data['name'],
      ],
      'description'         => '',
      'public'              => true,
      'show_in_menu'        => null,
      'show_in_rest'        => null,
      'rest_base'           => null,
      'menu_position'       => null,
      'menu_icon'           => null,
      'hierarchical'        => false,
      'supports'            => $post_data['supports']
    ];

    $post_taxonomies = []; // Для привязки к постам
    $register_taxonomy_args = []; // Для регистрации таксономий

    foreach ( $post_data['taxonomies'] as $taxonomy_slug => $taxonomy_data ) {
      $post_taxonomies[] = $taxonomy_slug;

      $register_taxonomy_args[] = [
        'label'                 => '',
        'labels'                => [
          'name'              => $taxonomy_data['name'],
          'singular_name'     => $taxonomy_data['singular_name'],
          'search_items'      => 'Найти',
          'all_items'         => 'Все',
          'view_item '        => 'Показать',
          'parent_item'       => 'Родитель',
          'parent_item_colon' => 'Родитель:',
          'edit_item'         => 'Изменить',
          'update_item'       => 'Обновить',
          'add_new_item'      => 'Добавить',
          'new_item_name'     => 'Добавить',
          'menu_name'         => $taxonomy_data['name'],
        ],
        'hierarchical'          => false,
        'meta_box_cb'           => false
      ];
    }

    $register_post_type_args['taxonomies'] = $post_taxonomies;

    register_post_type( $post_type, $register_post_type_args );

    if ( $register_taxonomy_args ) {
      for ( $i = 0, $len = count( $register_taxonomy_args ); $i < $len; $i++ ) {
       register_taxonomy( $post_taxonomies[ $i ], [ $post_type ], $register_taxonomy_args[ $i ] );
      }
    }

  }

});

