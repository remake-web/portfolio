<?php
if(have_posts()) : while(have_posts()) : the_post();
$page_slug = $post->post_name;
$page_name = get_the_title(); //TOPの場合は空けておく
$parent_slug = 'works'; //第3階層の場合入力
$parent_name = '制作実績'; //第3階層の場合入力

//$grand_slug = ''; //第4階層の場合入力
//$grand_name = ''; //第4階層の場合入力

// $page_dsc = '';

$page_css = 'works'; //cssファイル名

//現在ページだけヘッダーに追加したいものがあれば下記のコメントアウトを解除してに中に記入
$add_css = <<<CSSDOC
<!-- Splide -->
<link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
CSSDOC;

get_header();

$img = ( get_the_post_thumbnail_url($post->ID, 'medium_large') ) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : '/assets/img/common/noimg.png';
?> 

<main class="mainContents">
  <section class="works_single">
    <figure class="works_single_img"><img src="<?php echo $img;?>" alt="<?php echo $page_name;?>"></figure>
    <section class="works_single_con">
      <hgroup class="works_single_con_mv">
<?php if($works_cats = get_the_terms($post->ID, 'works_cat')) : // タグ ?>
        <p class="works_single_con_mv_date"><?php echo get_the_date('Y.m.d'); ?> <?php echo $works_cats[0]->name;?></p>
<?php endif;?>
        <h2 class="works_single_con_mv_ttl"><?php echo $page_name;?></h2>
        <p class="works_single_con_mv_more"><a href="#more">もっとみる</a></p>
      </hgroup>

      <div class="works_single_con_area wp_contents" id="more">
        <?php the_content();?>
      </div>
    </section>
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
  <section class="works_more">
    <h2 class="works_more_ttl ttl01">制作実績<span>WORKS</span></h2>

    <div class="swiper works_more_sldr">
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

    <p class="works_more_btn"><a href="/works/" class="btn01">一覧ページへ</a></p>
  </section>
<?php endif;?>
</main>

<!-- Splide -->
<script src="/assets/js/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.works_more_sldr', {
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
</script>

<script>
  $(window).on('scroll',function(){
    var scroll_top = $(window).scrollTop() + $(window).height() * 0.1;
    $('.works_more').each(function(){
      var offset_top = $(this).offset().top - $(this).height();
      if( scroll_top > offset_top){
          $(this).addClass('shadow');       
      }else{
          $(this).removeClass('shadow');       
      }
    });
});
</script>

<?php
endwhile; endif;

get_footer();
