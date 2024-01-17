<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Информация о новости')
    ->where('post_type', '=', 'news')
    ->add_fields([
        Field::make('rich_text', 'descr', 'Описание'),
        Field::make('image', 'preview', 'Изображение')
    ]);