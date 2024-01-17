<?php

function get_img($slug) {
   return wp_get_attachment_image_url(carbon_get_theme_option($slug));
}

define('MONTH_MAPPING', array(
   'January' => 'января',
   'February' => 'февраля',
   'March' => 'марта',
   'April' => 'апреля',
   'May' => 'мая',
   'June' => 'июня',
   'July' => 'июля',
   'August' => 'августа',
   'September' => 'сентября',
   'October' => 'октября',
   'November' => 'ноября',
   'December' => 'декабря',
));

function convertDateToRussian($dateString) {
   list($day, $month) = explode(' ', $dateString);
   $russianMonth = defined('MONTH_MAPPING') && isset(MONTH_MAPPING[$month]) ? MONTH_MAPPING[$month] : $month;
   $outputDate = $day . ' ' . $russianMonth;

   return $outputDate;
}