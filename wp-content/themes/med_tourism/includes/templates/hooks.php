<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'custom_post_types');
function custom_post_types() {
    register_post_type('news', [
        'labels' => [
            'name'               => 'Новости',
            'singular_name'      => 'Новость',
            'add_new'            => 'Добавить',
            'add_new_item'       => 'Создать новость',
            'edit_item'          => 'Редактировать новость',
            'new_item'           => 'Новая новость',
            'all_items'          => 'Все новости',
            'view_item'          => 'Посмотреть новость на сайте',
            'search_items'       => 'Искать новость',
            'not_found'          => 'Новости не найдены',
            'not_found_in_trash' => 'Корзина пуста',
            'menu_name'          => 'Новости'
        ],
        'public'      => true,
        'show_ui'     => true,
        'has_archive' => true,
        'menu_position' => 25,
        'supports'    => [ 'title' ],
        'show_in_rest' => false,
    ]);  
}