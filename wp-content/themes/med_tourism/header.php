<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Medical Tourism</title>

    <?php wp_head(); ?>
</head>

<body>
    <header class='container'>
        <div class='left'>
            <!-- <img src='<?php echo get_template_directory_uri(); ?>/assets/icons/logo.svg' alt='logo'> -->
            <img src='<?php echo get_img('logo'); ?>' alt='logo'>
            <img src='<?php echo get_template_directory_uri(); ?>/assets/icons/burger.svg' alt='burger'>
        </div>
        <div class='right'>
            <select>
                <option value='kaz'>ҚАЗ</option>
                <option value='rus' selected>РУС</option>
                <option value='eng'>ENG</option>
            </select>

            <?php 
                $partners = carbon_get_theme_option('partner_logos');
                foreach($partners as $p) :
            ?>
                <img src='<?php echo wp_get_attachment_image_url($p); ?>' alt='partner'>
            <?php
                endforeach;
            ?>
        </div>
    </header>