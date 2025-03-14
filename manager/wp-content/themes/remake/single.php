<?php
if(have_posts()) : while(have_posts()) : the_post();
$page_slug = $post->post_name;
$page_name = get_the_title(); //TOPの場合は空けておく
$parent_slug = 'news'; //第3階層の場合入力
$parent_name = 'お知らせ'; //第3階層の場合入力

//$grand_slug = ''; //第4階層の場合入力
//$grand_name = ''; //第4階層の場合入力

// $page_dsc = '';

$page_css = $parent_slug; //cssファイル名

//現在ページだけヘッダーに追加したいものがあれば下記のコメントアウトを解除してに中に記入
// $add_css = <<<CSSDOC
// CSSDOC;

get_header();
?>

<main class="mainContents">
	<hgroup class="page_mv">
		<h1 class="page_mv_ttl"><span class="pc_maxInr"><?php echo $parent_name;?></span></h1>
		<p class="page_mv_en"><span class="pc_maxInr"><?php echo $parent_slug;?></span></p>
	</hgroup>

<?php get_template_part( 'inc/breadcrumb' );// ぱんくず ?>

  <section class="news_single pc_minInr">
    <h2 class="news_single_ttl ttl02"><?php the_title();?></h2>
    <time class="news_single_time" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>

    <div class="news_single_con wp_contents"><?php the_content();?></div>

    <p class="news_single_btn"><a href="/news/" class="btn01">お知らせ一覧へ</a></p>
  </section>
</main>

<?php 
endwhile; endif;

get_footer();
