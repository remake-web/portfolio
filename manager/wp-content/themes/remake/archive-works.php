<?php
$page_slug = 'works';
$page_name = '制作実績'; //TOPの場合は空けておく
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
		'post_type' => $page_slug,
		'posts_per_page' => 12,
		'paged' => $paged,
		'post_status' => 'publish',
		'orderby' => 'post_date',
		'order' => 'DESC',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()) :
?>
  <ul class="works_list pc_maxInr">
<?php 
while($the_query->have_posts()): $the_query->the_post(); 
  $img = ( get_the_post_thumbnail_url($post->ID, 'medium_large') ) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : '/assets/img/common/noimg.png';
?>
    <li class="works_list_item">
      <a href="<?php the_permalink(); ?>" class="works_list_item_link">
        <figure class="works_list_item_link_img"><img src="<?php echo $img;?>" alt="<?php the_title();?>" width="300" height="300" lading="lazy"></figure>
        <p class="works_list_item_link_ttl"><?php the_title();?></p>
<?php if($works_cats = get_the_terms($post->ID, 'works_cat')) : // タグ ?>
        <p class="works_list_item_link_cat"><?php echo $works_cats[0]->name;?></p>
<?php endif;?>
      </a>
    </li>
<?php endwhile; wp_reset_postdata();?>
  </ul>
<?php endif;?>
</main>

<?php 
get_footer();
