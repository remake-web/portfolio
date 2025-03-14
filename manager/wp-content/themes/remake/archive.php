<?php
$page_slug = 'news';
$page_name = 'お知らせ'; //TOPの場合は空けておく
//$parent_slug = ''; //第3階層の場合入力
//$parent_name = ''; //第3階層の場合入力
//$grand_slug = ''; //第4階層の場合入力
//$grand_name = ''; //第4階層の場合入力

// $page_dsc = '';

$page_css = $page_slug; //cssファイル名

//現在ページだけヘッダーに追加したいものがあれば下記のコメントアウトを解除してに中に記入
// $add_css = <<<CSSDOC
// CSSDOC;

get_header();
?>

<main class="mainContents">
	<hgroup class="page_mv">
		<h1 class="page_mv_ttl"><span class="pc_maxInr"><?php echo $page_name;?></span></h1>
		<p class="page_mv_en"><span class="pc_maxInr"><?php echo $page_slug;?></span></p>
	</hgroup>

<?php get_template_part( 'inc/breadcrumb' );// ぱんくず ?>

<?php 
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 12,
		'paged' => $paged,
		'post_status' => 'publish',
		'orderby' => 'post_date',
		'order' => 'DESC',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()) :
?>
  <div class="news_archive">
    <ul class="pc_minInr news_list">
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
	</div>
<?php endif;?>
</main>

<?php 
get_footer();
