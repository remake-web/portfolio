<?php
$page_slug = 'top';
$page_dsc = '';

$add_css = <<<CSSDOC
<!-- Splide -->
<link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
CSSDOC;

$page_css = $page_slug; //cssファイル名

get_header();
?>

<main class="mainContents top_mainContents">
  <section class="top_about pc_maxInr">
    <figure class="top_about_img"><img src="/assets/img/top/top_about.png" alt="Re:makeについて" width="500" height="444"></figure>

    <div class="top_about_con">
      <p class="top_about_con_subttl">Webサイト制作スタジオのRe:makeです。</p>
      <h2 class="top_about_con_ttl">デザインやホームページなど<br>Web事業に関わる制作をしています。</h2>
      <p class="top_about_con_btn"><a href="/about/" class="btn01">Re:makeについて</a></p>
    </div>
  </section>

<?php 
$args = array(
	'post_type' => 'works',
	'posts_per_page' => 5,
	'post_status' => 'publish',
	'orderby' => 'post_date',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);
if($the_query->have_posts()) :
?>
  <section class="top_card top_works">
    <h2 class="top_card_ttl ttl01">制作実績<span>WORKS</span></h2>
    <p class="top_card_desc">Re:makeで携わった制作の一部をご紹介しています。<br>その他の制作実績や情報についてはお問い合わせ下さいませ。</p>
    <div class="swiper top_card_sldr" id="works_slide">
      <ul class="swiper-wrapper">
<?php 
while($the_query->have_posts()): $the_query->the_post(); 
$img = ( get_the_post_thumbnail_url($post->ID, 'medium_large') ) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : '/assets/img/common/noimg.png';
?>
        <li class="swiper-slide list_item">
          <a class="list_item_link" href="<?php the_permalink(); ?>">
            <figure class="list_item_link_img">
              <img src="<?php echo $img;?>" alt="<?php the_title();?>" width="400" height="400" lading="lazy">
              <figcaption><?php the_title();?></figcaption>
            </figure>
          </a>
        </li>
<?php endwhile; wp_reset_postdata();?>
      </ul>
    </div>
    <p class="top_card_btn"><a href="/works/" class="btn01">もっと見る</a></p>
  </section>
<?php endif;?>

<?php 
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post_status' => 'publish',
	'orderby' => 'post_date',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);
if($the_query->have_posts()) :
?>
  <section class="top_news pc_maxInr">
    <h2 class="top_news_ttl ttl01">お知らせ<span>NEWS</span></h2>
    <p class="top_news_desc">業務に関わる重要なお知らせを発信しています。</p>

    <ul class="top_news_list news_list">
<?php 
while($the_query->have_posts()): $the_query->the_post(); 
  $link = (get_field('link'))? get_field('link'): get_the_permalink();
?>
      <li class="news_list_item">
        <a href="<?php echo $link; ?>" class="news_list_item_link"<?php if(get_field('exlink')) echo ' target="_blank"';?>>
          <time class="news_list_item_link_date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
          <p class="news_list_item_link_ttl"><?php the_title();?></p>
        </a>
      </li>
<?php endwhile; wp_reset_postdata();?>
    </ul>

    <p class="top_news_btn"><a href="/news/" class="btn01">もっと見る</a></p>
  </section>
<?php endif;?>

  <section class="top_card top_blog">
    <h2 class="top_card_ttl ttl01">ブログ<span>BLOG</span></h2>
    <p class="top_card_desc">日々の暮らしの中で気になった事を書いています。<br>WEB・デザイン・趣味の旅行・競馬・トレカのことなどよかったら覗いてみてください。</p>
    <div class="swiper top_card_sldr" id="blog_slide">
      <ul class="swiper-wrapper" id="blog_json"></ul>
    </div>
    <p class="top_card_btn"><a href="https://blog.remake-web.com" class="btn01" target="_blank">もっと見る</a></p>
  </section>
</main>

<!-- Splide -->
<script src="/assets/js/swiper-bundle.min.js"></script>
<script>
$(function(){
  $.ajax({
    type: 'GET',
    url: 'https://blog.remake-web.com/wp-json/wp/v2/posts?_embed',
    dataType: 'json'
  }).done(function(json){
    var html = '';
    //記事の件数分イテレートする
    $.each(json, function( i, row ) {
   
      //ブログのタイトル
      var title = row.title.rendered;
      //ブログのURL
      var link = row.link;
      //サムネイル画像のURL
      var thumbnail
      if( row['_embedded']['wp:featuredmedia'] ) {
        thumbnail = row['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url']
      }
      html += '<li class="swiper-slide list_item">';
      html += '<a class="list_item_link" href="' + link + '" target="_blank">';
      html += '<figure class="list_item_link_img"><img src="' + thumbnail + '" alt="' + title + '" width="400" height="400" lading="lazy">';
      html += '<figcaption>' + title + '</figcaption></figure>';
      html += '</a></li>';
    });
    //整形した記事の情報をページに追加する
    $('#blog_json').append(html)
    const blogSwiper = new Swiper('#blog_slide', {
      effect: 'slide',
      loop: true,// 無限ループさせる
      loopAdditionalSlides: 1, // 無限ループさせる場合に複製するスライド数
      slidesPerView: 'auto',
      centeredSlides: true,
      allowTouchMove: true,// 操作可能か
      spaceBetween: 15,
      speed: 1000,
      autoplay:{
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints:{
        767:{//PC
          spaceBetween: 25,
        },
      }
    });
  }).fail(function(json){
    console.error('ブログ記事取得に失敗しました。')
  });
});

// const sliders = document.querySelectorAll('.swiper');
const worksSwiper = new Swiper('#works_slide', {
  effect: 'slide',
  loop: true,// 無限ループさせる
  loopAdditionalSlides: 1, // 無限ループさせる場合に複製するスライド数
  slidesPerView: 'auto',
  centeredSlides: true,
  allowTouchMove: true,// 操作可能か
  spaceBetween: 15,
  speed: 1000,
  autoplay:{
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints:{
    767:{//PC
      spaceBetween: 25,
    },
  }
});
// sliders.forEach((slider) => {
// });

</script>

<?php 
get_footer();
