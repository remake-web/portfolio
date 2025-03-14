<?php
/*
Template Name: お問い合わせ
*/

if(have_posts()) : while(have_posts()) : the_post();
$page_slug = $post->post_name;
$page_name = get_the_title(); //TOPの場合は空けておく
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
  
  <div class="page_contact pc_minInr">
    <div class="page_contact_con">
      <?php the_content();?>
    </div>
  </div>
</main>

<?php 
endwhile; endif;

get_footer();