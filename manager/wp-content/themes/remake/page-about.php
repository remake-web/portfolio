<?php
/*
Template Name: Re:makeについて
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

  <section class="about_desc pc_maxInr">
    <dl class="about_desc_con">
			<dt class="about_desc_con_ttl">第一印象は人だけじゃない<br class="sp_only">ホームぺージもだ。</dt>
			<dd class="about_desc_con_txt">
				私は印象一つで人に与える影響が大きく変わると常々思います。<br>
        人の第一印象は３秒で決まると言われており、その大半が目から入ってくる情報によってその人の印象に大きく影響を与えます。これは人だけでなくホームページにも言えることだと私は思います。<br><br>
        今やホームページは私たちの生活において身近な存在になっています。<br>
        例えば、旅行で宿を探すとき、週末のデートでレストランを探すとき、欲しい商品を探すとき。これらのシーンで、必ず目にするホームページは第一印象と言っても過言ではありません。<br><br>
        そんな大事な第一印象を作るお手伝いをさせて頂けませんか？
			</dd>
		</dl>

		<figure class="about_desc_img"><img src="/assets/img/about/about_txt.svg" alt="Re:make" width="840" height="216" lading="lazy"></figure>
	</section>

	<div class="about_slide">
		<figure class="about_slide_img01"><img src="/assets/img/about/about_img01.jpg" alt="" width="1110" height="550" lading="lazy"></figure>
		<figure class="about_slide_img02"><img src="/assets/img/about/about_img02.jpg" alt="" width="1110" height="550" lading="lazy"></figure>
	</div>

	<div class="about_profile pc_minInr">
		<figure class="about_profile_img"><img src="/assets/img/about/about_profile.svg" alt="" width="400" height="400" lading="lazy"></figure>
		<dl class="about_profile_con">
			<dt class="about_profile_con_ttl">代表：<em>上田 知哉</em> Ueda Tomoya</dt>
			<dd class="about_profile_con_txt">
				1998年生まれ。滋賀県出身、京都市内在住<br>
        旅行の専門学校を卒業後、新卒で地元の旅行会社に就職。その後飛行機を作る工場に転職。働きながら1年間独学でWEBの勉強を始め、現在京都のWEB制作会社にフロントエンジニアとしていろんなホームページを制作しています。
			</dd>
		</dl>
	</div>

	<section class="about_product pc_maxInr">
		<h2 class="about_product_ttl ttl02">事業内容</h2>
		<ul class="about_product_list">
			<li class="about_product_list_item">
			  <dl class="about_product_list_item_con">
					<dt class="about_product_list_item_con_ttl">ホームページ制作</dt>
					<dd class="about_product_list_item_con_txt">企業(事業)や店舗のウェブサイト制作・キャンペーン/ランディングページ制作・リニューアルなど</dd>
				</dl>
			</li>
			<li class="about_product_list_item">
			  <dl class="about_product_list_item_con">
					<dt class="about_product_list_item_con_ttl">コーディング代行</dt>
					<dd class="about_product_list_item_con_txt">いただいたデザインデータをそのままブラウザに反映させます。</dd>
				</dl>
			</li>
			<li class="about_product_list_item">
			  <dl class="about_product_list_item_con">
					<dt class="about_product_list_item_con_ttl">CMSの構築</dt>
					<dd class="about_product_list_item_con_txt">誰もがホームページの更新がしやすいようにWordPressを用いて構築いたします。</dd>
				</dl>
			</li>
			<li class="about_product_list_item">
			  <dl class="about_product_list_item_con">
					<dt class="about_product_list_item_con_ttl">運用・保守サポート</dt>
					<dd class="about_product_list_item_con_txt">サイトの管理や修正などサポートいたします。</dd>
				</dl>
			</li>
		</ul>

		<p class="about_product_btn"><a href="/works/" class="btn01">制作事例</a></p>
	</section>
</main>

<?php 
endwhile; endif;

get_footer();