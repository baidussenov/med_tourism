<?php 
    get_header();
    $URI = get_template_directory_uri();
?>

<section id='welcome' class='container'>
    <h1><?php echo carbon_get_theme_option('sec-wel-heading'); ?></h1>
    <p><?php echo carbon_get_theme_option('sec-wel-subheading'); ?></p>
</section>
<section id='fields' class='container'>
    <div class='content'>
        <h1><?php echo carbon_get_theme_option('sec-dirs-heading'); ?></h1>
        <h2><?php echo carbon_get_theme_option('sec-dirs-subheading'); ?></h2>
        <img class='organs' src='<?php echo $URI; ?>/assets/icons/organs.svg' alt='organs'>
        <div class='line'></div>
        <div class='logos'>
            <?php 
                $orgs = carbon_get_theme_option('sec-dirs-orgs');
                foreach($orgs as $o) :
            ?>
                <img src='<?php echo wp_get_attachment_image_url($o); ?>' alt='org'>
            <?php endforeach; ?>
        </div>
    </div>
    <div class='emps'>
        <div>
            <img src='<?php echo $URI; ?>/assets/imgs/emp-1.png' alt='employees'>
            <img src='<?php echo $URI; ?>/assets/imgs/emp-2.png' alt='employees'>
        </div>
        <img class='shifted' src='<?php echo $URI; ?>/assets/imgs/emp-3.png' alt='employees'>
    </div>
</section>
<section id='clinics' class='container-left'>
    <a class='title-link' href='#'>Клиники</a>
    <div class='slider-container'>
        <div class='slider'>
            <?php 
                $clinics = carbon_get_theme_option('sec-clinics-slider');
                foreach($clinics as $c) :
            ?>
                <div class='card' style="background: url('<?php echo wp_get_attachment_image_url($c['img']); ?>') no-repeat center / cover">
                    <h4><?php echo $c['title']; ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section id='form' class='container-left'>
    <div class='content'>
        <h1><?php echo carbon_get_theme_option('sec-form-heading'); ?></h1>
        <h2><?php echo carbon_get_theme_option('sec-form-subheading'); ?></h2>
        <form method='post'>
            <input type='text' name='name' placeholder='Введите ваше имя' required>
            <input type='text' name='name' placeholder='Введите ваш телефон' required>
            <div>
                <input id='per_data' type='checkbox' name='agreed_personal_data' required>
                <label for='per_data'>Я согласен на обработку моих персональных данных</label>
            </div>
            <div>
                <input id='fam_pol' type='checkbox' name='familiar_policies' required>
                <label for='fam_pol'>Я ознакомлен с <a href='#'>правилами</a> внутреннего распорядка</label>
            </div>
            <div>
                <button type='submit'>
                    <span>Оставить</span>
                    <img src='<?php echo $URI; ?>/assets/icons/arr_right.svg' alt='arrow'>
                </button>
            </div>
        </form>
    </div>
    <div class='back'>
        <div 
            class='bg_img doctor'
            style="background-image: url('<?php echo get_img('sec-form-img'); ?>')"
        ></div>
        <img class='bg_img icons' src='<?php echo $URI; ?>/assets/imgs/back-3.svg' alt='background'>
</section>
<section id='news' class='container'>
    <a class='title-link' href='#'>Новости</a>
    <div class='posts-container'>
        <?php 
            $args = array(
                'post_type' => 'news', // Replace 'your_post_type' with the actual post type name
                'post_status' => 'publish', // Include only published posts
                'posts_per_page' => -1, // Retrieve all posts (use -1 for unlimited)
            );

            $query = new WP_Query($args);
            
            if ($query->have_posts()) {
                for ($i = 0; $i < 3 && $query->have_posts(); ++$i) :
            ?>
                <?php 
                    $query->the_post();
                    $id = $post->ID;
                    $title = $post->post_title;
                    $guid = $post->guid;
                    $descr = carbon_get_post_meta($id, 'descr');
                    $dateObj = new DateTime($post->post_date);
                    $date = convertDateToRussian($dateObj->format('j F'));
                    $preview = wp_get_attachment_image_url(carbon_get_post_meta($id, 'preview'));
                ?>
                    <a class='post' href='<?php echo $guid; ?>'>
                        <img src='<?php echo $preview; ?>' alt='preview'>
                        <div class='content'>
                            <span><?php echo $date; ?></span>
                            <h4><?php echo $title; ?></h4>
                            <p><?php echo $descr; ?></p>
                            <img src='<?php echo $URI; ?>/assets/icons/arr_title.svg' alt='arrow'>
                        </div>
                    </a>
            <?php
                endfor;
                wp_reset_postdata();
            }
        ?>
    </div>
</section>
<section>
    <h1 class='container'>Медицинские учреждения</h1>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10012.697964843166!2d71.4185785740534!3d51.14213329771777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424586ba8c32a281%3A0xe52c231f9edfc09d!2sShubar%20Township%2C%20020000%20Astana!5e0!3m2!1sen!2skz!4v1705407582715!5m2!1sen!2skz"
        width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php get_footer(); ?>