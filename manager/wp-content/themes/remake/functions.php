<?php

/************************************************/
/* WordPressのヘッダーに出力される不要なタグを削除する */
/************************************************/
//絵文字スクリプト削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
//絵文字スタイル削除
remove_action('wp_print_styles', 'print_emoji_styles');
//EditURIの何か削除
remove_action('wp_head', 'rsd_link');
//Windows Live Writerの何か削除
remove_action('wp_head', 'wlwmanifest_link');
//WordPressのバージョン表示削除
remove_action('wp_head', 'wp_generator');
//shortlink削除
remove_action('wp_head', 'wp_shortlink_wp_head');
//shortlink削除（レスポンスヘッダー）
remove_action('template_redirect', 'wp_shortlink_header', 11);
//dns-prefetch削除
function custom_remove_dns_prefetch($hints, $relation_type) {
  if('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_filter('wp_resource_hints', 'custom_remove_dns_prefetch', 10, 2);

function custom_remove_css_styles() {
  //追加プラグインstylesheet削除
  wp_dequeue_style('wp-pagenavi');
}
add_action('wp_enqueue_scripts', 'custom_remove_css_styles');

//wp5.9以降のglobal-styles-inline-cssを削除
// add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
// function remove_my_global_styles() {
// 	wp_dequeue_style( 'global-styles' );
// }

//ビジュアルエディタから見出し1を削除
function custom_tiny_mce_formats( $settings ){
  $settings[ 'block_formats' ] = '段落=p;見出し1=h3;見出し2=h4;見出し3=h5;';
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_formats' );

//Gutenbergのエディターからいらないものを削除
function my_block_style() {
  echo '<style>
  button[aria-label="見出し1"],button[aria-label="見出し2"],button[aria-label="見出し6"]
{
	display: none;
}
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_block_style');

//デフォルトのサイトマップ非表示
add_filter( 'wp_sitemaps_enabled', '__return_false' );

/************************************************/
/* アイキャッチ表示 */
/************************************************/
add_theme_support('post-thumbnails');


/************************************************/
/* デフォルトの投稿名を変更 */
/************************************************/
function post_has_archive( $args, $post_type ) {
  if ( 'post' == $post_type ) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'news';
  }
  return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

function add_article_post_permalink( $permalink ) {
  $permalink = '/news' . $permalink;
  return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );

function add_article_post_rewrite_rules( $post_rewrite ) {
  $return_rule = array();
  foreach ( $post_rewrite as $regex => $rewrite ) {
    $return_rule['news/' . $regex] = $rewrite;
  }
  return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );


/************************************************/
/* MW WP Form */
/************************************************/
if( class_exists('MW_WP_Form_Admin') ) {
  //ID取得
  $mw_wp_form_admin = new MW_WP_Form_Admin();
  $mw_forms = $mw_wp_form_admin->get_forms();

  foreach( $mw_forms as $form ) {
    //wpautop自動改行（<p>タグ自動挿入）を無効
    add_filter( 'mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false' );

    //バリデーションルール メッセージカスタム
    add_filter( 'mwform_error_message_mw-wp-form-' . $form->ID, 'my_error_message', 10, 3 );

    //css削除
    add_action( 'mwform_enqueue_scripts_mw-wp-form-' . $form->ID, 'my_mwform_enqueue_scripts' );
  }
}

// バリデーションルール メッセージカスタム
function my_error_message( $error, $key, $rule ) {
  if($rule === 'noempty') {
    return '*必須項目に入力してください';
  }
  return $error;
}

// css削除
function my_mwform_enqueue_scripts() {
  wp_dequeue_style('mw-wp-form');
}


/************************************************/
/* 投稿の日本語スラッグを[post type _ post id]に挿げ替える */
/************************************************/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
  if( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
    $slug = utf8_uri_encode( $post_type ) . '_' . $post_ID;
  }
  return $slug;
}
add_filter('wp_unique_post_slug', 'auto_post_slug', 10, 4);

function twpp_change_excerpt_length( $length ) {
  return 130; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );


/************************************************/
/* 投稿ビジュアルエディタCSSカスタム */
/************************************************/
function add_block_editor_styles() {
  wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/block-style/block_style.css' );
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );


/************************************************/
/* /?author=1で検索時404ページリダイレクト */
/************************************************/
add_filter( 'author_rewrite_rules', '__return_empty_array' );
function disable_author_archive() {
if( isset($_GET['author']) || preg_match('#/author/.+#', $_SERVER['REQUEST_URI']) ){
wp_redirect( home_url( '/404.php' ) );
exit;
}
}
add_action('init', 'disable_author_archive');

/************************************************/
/* snow-monkey-formsのインラインCSSを無効化 */
/************************************************/
function remove_global_styles_inline_css() {
  wp_dequeue_style('snow-monkey-forms-control-checkboxes-style');
  wp_dequeue_style('snow-monkey-forms-control-email-style');
  wp_dequeue_style('snow-monkey-forms-control-file-style');
  wp_dequeue_style('snow-monkey-forms-item-style');
  wp_dequeue_style('snow-monkey-forms-control-radio-buttons-style');
  wp_dequeue_style('snow-monkey-forms-control-select-style');
  wp_dequeue_style('snow-monkey-forms-control-tel-style');
  wp_dequeue_style('snow-monkey-forms-control-text-style');
  wp_dequeue_style('snow-monkey-forms-control-textarea-style');
  wp_dequeue_style('snow-monkey-forms-control-url-style');
}
add_action( 'wp_print_styles', 'remove_global_styles_inline_css' );
add_action('wp_footer', 'remove_global_styles_inline_css' ); //フッター

//snow-monkey-formsのスタイルシートの読み込みを停止
add_action( 'wp_enqueue_scripts', function() {
  wp_dequeue_style( 'snow-monkey-forms@fallback' );
  wp_dequeue_style( 'snow-monkey-forms' );
});

//郵便番号から住所を自動入力
function add_link_files() {
  if ( is_page('contact')){
    wp_enqueue_script('yubinbango’', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), null, true);
  }
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );
