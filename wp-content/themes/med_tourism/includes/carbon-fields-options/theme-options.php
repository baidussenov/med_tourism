<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'Настройки сайта' )
    ->add_tab('Общие', [
        Field::make('image', 'logo', 'Логотип'),
        Field::make('media_gallery', 'partner_logos', 'Партнеры')
            ->set_type('image')
            ->set_duplicates_allowed(false)
    ])

    ->add_tab('Приветствие', [
        Field::make('text', 'sec-wel-heading', 'Заголовок')
            ->set_width(50),
        Field::make('text', 'sec-wel-subheading', 'Подзаголовок')
            ->set_width(50)
    ])
    
    ->add_tab('Секция направлений', [
        Field::make('text', 'sec-dirs-heading', 'Заголовок')
            ->set_width(50),
        Field::make('text', 'sec-dirs-subheading', 'Подзагаловок')
            ->set_width(50),
        Field::make('media_gallery', 'sec-dirs-orgs', 'Организации')
            ->set_type('image')
            ->set_duplicates_allowed(false)
    ])

    ->add_tab('Секция клиник', [
        Field::make('complex', 'sec-clinics-slider', 'Клиники (слайдер)')
            ->add_fields([
                Field::make('text', 'title', 'Название'),
                Field::make('image', 'img', 'Изображение')
            ])
    ])
    
    ->add_tab('Секция формы', [
        Field::make('text', 'sec-form-heading', 'Заголовок')
            ->set_width(50),
        Field::make('text', 'sec-form-subheading', 'Подзагаловок')
            ->set_width(50),
        Field::make('image', 'sec-form-img', 'Изображение')
    ]);