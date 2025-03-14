<?php
global $site_url;
global $page_url;

global $page_slug;

global $page_name;
global $parent_name;
global $page_dsc;

global $page_css;
global $add_css;

global $ogp_img;

// META
$site_tit = get_bloginfo('name') . '｜' . get_bloginfo('description');

if ($page_slug == 'top') {
  $page_tit = $site_tit;
} elseif (isset($grand_name)) { //第4階層
	$page_tit = $page_name . '｜' . $parent_name . '｜' . $grand_name . '｜' . $site_tit;
} elseif (isset($parent_name)) { //第3階層
  $page_tit = $page_name . '｜' . $parent_name . '｜' . $site_tit;
} else { //第2階層
  $page_tit = $page_name . '｜' . $site_tit;
}

//canonical
$site_htp = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
$site_url = $site_htp . $_SERVER["SERVER_NAME"];
$page_url = $site_htp . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
// $page_url = strtok($page_url, '?');

//user agent
// $ua = $_SERVER['HTTP_USER_AGENT'];
// $browser = ((strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Android') !== false));

//version
$version = '?v=' . date("Ymd-His");
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7Z650R3HRX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7Z650R3HRX');
</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no,address=no,email=no">
  
  <!-- web font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,600;9..40,700&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
  
<?php wp_head(); ?>
  
  <!-- css -->
<?php if (isset($add_css)) echo $add_css; ?>
  <link rel="stylesheet" href="/assets/css/common.min.css<?php echo $version; ?>">
<?php if(isset($page_css)) : ?>
  <link rel="stylesheet" href="/assets/css/<?php echo $page_css; ?>.min.css<?php echo $version; ?>">
<?php endif; ?>
    
  <!-- js -->
  <link rel="prefetch" href="/assets/js/jquery.min.js" as="script">
  <link rel="prefetch" href="/assets/js/base.js" as="script">
  <script src="/assets/js/jquery.min.js"></script>

  <!-- meta & OGP -->
  <meta name="copyright" content="Copyright © Re:make All Rights Reserved. ">
    
<?php if( isset($page_dsc) ) : ?>
  <meta name="description" content="<?php echo $page_dsc; ?>">
  <meta property="og:description" content="<?php echo $page_dsc; ?>">
<?php endif;?>
      
<?php 
if( !is_404() ): 
  // 記事詳細
  if( is_single() ) :
    if( empty($ogp_img) ){
      // アイキャッチ有の場合はOGPに設定
      global $post;
      $ogp_img = ( get_the_post_thumbnail_url($post->ID) ) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : $site_url.'/assets/img/common/ogp.png';
    }
?>
  <meta property="og:image" content="<?php echo $ogp_img; ?>">
<?php else : ?>
  <meta property="og:image" content="<?php echo $site_url; ?>/assets/img/common/ogp.png">
<?php endif; ?>

  <meta property="og:title" content="<?php echo $page_tit; ?>">
  <meta property="og:url" content="<?php echo $page_url; ?>">
  <meta property="og:type" content="<?php if ($page_slug == 'top') : ?>website<?php else : ?>article<?php endif; ?>">
  <meta name="twitter:card" content="summary_large_image">
<?php endif; ?>
        
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $site_url; ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo $site_url; ?>/assets/img/common/apple-touch-icon.png">
        
  <title><?php echo $page_tit; ?></title>
</head>

<body>

<header class="header<?php if($page_slug !== 'top') echo ' page_header';?>">
  <h1 class="header_logo">
    <a href="/" class="header_logo_link">
      <img src="/assets/img/common/logo.svg" alt="京都のWEBデザインスタジオ Re:make" width="201" height="70">
    </a>
  </h1>

  <div class="header_area">
    <nav class="header_area_nav">
      <ul class="header_area_nav_list">
        <li class="header_area_nav_list_item -about">
          <a href="/about/" class="header_area_nav_list_item_link">Re:makeについて</a>
        </li>
        <li class="header_area_nav_list_item -works">
          <a href="/works/" class="header_area_nav_list_item_link">制作事例</a>
        </li>
        <!-- <li class="header_area_nav_list_item -service">
          <a href="/about/" class="header_area_nav_list_item_link">サービス</a>
        </li> -->
        <li class="header_area_nav_list_item -news">
          <a href="/news/" class="header_area_nav_list_item_link">お知らせ</a>
        </li>
        <li class="header_area_nav_list_item -blog">
          <a href="https://blog.remake-web.com" class="header_area_nav_list_item_link" target="_blank">ブログ</a>
        </li>
      </ul>
    </nav>

    <p class="header_area_btn"><a href="/contact/" class="btn01">お問い合わせ</a></p>

    <h2 class="header_area_logo">
      <a href="/" class="header_area_logo_link">
        <img src="/assets/img/common/logo.svg" alt="京都のWEBデザインスタジオ Re:make" width="201" height="70">
      </a>
    </h2>

    <address class="header_area_addr">
      <dl class="header_area_addr_data">
        <dt class="header_area_addr_data_ttl">所在地</dt>
        <dd class="header_area_addr_data_con">京都府京都市在住<small>※自宅兼事務所のため、ご契約の際にお伝えいたします。</small></dd>
      </dl>
    </address>

    <ul class="header_area_sns">
      <li class="header_area_sns_item">
        <a href="https://www.instagram.com/remake_web/?igsh=cnZrOWhtMHZ2MHZ4&utm_source=qr" class="header_area_sns_item_link" target="_blank"><img src="/assets/img/common/icon_instagram.svg" alt="instagram"></a>
      </li>
      <li class="header_area_sns_item">
        <a href="https://twitter.com/Remak_web" class="header_area_sns_item_link" target="_blank"><img src="/assets/img/common/icon_x.svg" alt="x"></a>
      </li>
    </ul>
  </div>

  <p class="header_btn"><a href="/contact/" class="header_btn_link">お問い合わせ</a></p>

  <button class="header_menu">
    <span></span>
  </button>
</header>