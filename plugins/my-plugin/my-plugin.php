<?php
/*
* Plugin Name: マイプラグイン
* Version: 1.0
* Description: 自分専用のプラグイン
* Author: Takaki
*/

add_shortcode('date', function () {
  // return get_the_title();
  return '<p>' . date('Y年 n月 j日') . '</p>';
});

add_shortcode('sum', function ($atts) {
  $atts = shortcode_atts([
    'x' => 0,
    'y' => 0,
  ], $atts, 'sum');
  return $atts['x'] + $atts['y'];
});

add_action('init', function () {
  register_post_type('item', [
    'label' => '商品',
    'public' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-store',
    'supports' => ['thumbnail', 'title', 'editor', 'custom-fields'],
    'has_archive' => true,
    'show_in_rest' => true,
  ]);
  register_taxonomy('genre', 'item', [
    'label' => '商品ジャンル',
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);
});

add_action('get_footer', function() {
  echo 'アクションフックが動作しました';
});
