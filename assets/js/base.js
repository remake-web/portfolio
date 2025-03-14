$(function(){
  
   //スムーススクロール
   var $target;

   //ページ内リンク
   $('a[href^="#"], area[href^="#"]').on('click', function() {
     _href = $(this).attr('href');
     //ページトップとアンカー判別
     if(_href == '#') {
       $target = $('html');
       _speed = 800;
     }
     else {
       $target = $(_href);
       _speed = 500;
     }
     if(!$target[0]) return false;
     smoothScroll($target, _speed);
     return false;
   });
 
   // 別ページからのリンク
   $(window).on('load', function() {
     if(location.hash != "") {
       $target = $(location.hash);       
       smoothScroll($target, 400);
     }
   });
 
   function smoothScroll($target, _speed) {
     _tt = $target.offset().top;
     _menu_h = $('.header').height() + 60;
     _pos = (_tt > 0) ? _tt - _menu_h : _tt;
     $('html, body').animate({scrollTop : _pos}, _speed, 'swing');
   }

  //ドロワーメニュー
  $menu = $('.header_area');
  $header = $('.header');

  $('.header_menu').on('click', function() {
    _scr_p = $(window).scrollTop();
    _addcls = 'header_nav_open';

    if($(this).hasClass('active')) {//閉じる
      $(this).removeClass('active');
      $menu.removeClass('show');
      $header.removeClass('show');

      if($(window).width() < 1080) {//スマホのみ
        _scr_p = $('body').css('top');
        $('body').removeClass(_addcls).css({'top': ''});
        $(window).scrollTop( -(parseInt(_scr_p)) );
      }
    }
    else {//開く
      $(this).addClass('active');
      $menu.addClass('show');
      $header.addClass('show');

      if($(window).width() < 1080) {//スマホのみ
        $('body').addClass(_addcls).css({'top': -_scr_p});
      }
    }
  });

  //スクロールでフェードイン セッティング
  var $scrfade = $(
    '.top_lead' 
  );
  //スクロールでフェードイン セッティング（左から）
  var $fade_left = $(
    '.about_slide_img01' //aboutページ
  );
  
  //スクロールでフェードイン セッティング（右から）
  var $fade_right = $(
    '.about_slide_img02' //aboutページ
  );
  var _fadep = $(window).height() * 0.75;//画面上部から何割のところでフェードインさせるか設定

  //ロード後、スクロール、リサイズ時
  $(window).on('load scroll resize', function() {
    //フェードイン
    $scrfade.each(function() {
      _thisp = $(this).offset().top;
      if( _thisp < $(window).height() || _thisp < ( $(window).scrollTop() + _fadep) ) {
        $(this).addClass('fade_in');
      }
      else {
        $(this).addClass('fade');
      }
    });

    //フェードイン(左から)
    $fade_left.each(function() {
      _thisp = $(this).offset().top;
      if( _thisp < $(window).height() || _thisp < ( $(window).scrollTop() + _fadep) ) {
        $(this).addClass('fade_left');
      }
      else {
        $(this).addClass('fade');
      }
    });
    
    //フェードイン(右から)
    $fade_right.each(function() {
      _thisp = $(this).offset().top;
      if( _thisp < $(window).height() || _thisp < ( $(window).scrollTop() + _fadep) ) {
        $(this).addClass('fade_right');
      }
      else {
        $(this).addClass('fade');
      }
    });
    
    //ページトップへボタン表示
    $pagetop = $('.pagetop');
    if($(window).scrollTop() > 200) {
      $pagetop.addClass('show');
    }
    else {
      if( !$pagetop.hasClass('stop') ) $pagetop.removeClass('show');
    }
    //ページトップへボタンの下辺がフッターの上辺に達すると止める
    _scr_wh = $(document).height() - ( $(window).scrollTop() + (window.innerHeight - 60) );// 画面下からの位置
    _stop_p = $('.footer').height() - ($pagetop.height() - 30);// フッター上部からの位置
    _stop_p = ($(window).width() < 768) ? _stop_p + 50 : _stop_p;// スマホ下部余白
    if(_scr_wh <= _stop_p) {
      $pagetop.addClass('stop').addClass('show');
    }
    else {
      $pagetop.removeClass('stop');
    }
    
    //スクロールでメニューのスタイル切り替え
    if($(window).width() < 768){//スマホ時
      if( $(window).scrollTop() > 90) {
        $('.header').addClass('change');
      }
      else {
        if( !$menu.hasClass('show') ) {//ドロワーメニューの処理でスクロール位置が変わるので回避
          $('.header').removeClass('change');
        }
      }
    }else{
      if( $(window).scrollTop() > 130) {
        $('.header').addClass('change');
      }
      else {
        if( !$menu.hasClass('show') ) {//ドロワーメニューの処理でスクロール位置が変わるので回避
          $('.header').removeClass('change');
        }
      }
    }
  });
});

//汎用アコーディオン
$('.acc_btn, .acc_btn_sp').on('click', function() {
  $slide = $(this).next('.acc_slide');
  if($(this).hasClass('acc_btn_sp')) {//スマホのみ
    if($(window).width() < 768) {
      accordion($(this), $slide);
      return false;
    }
  }
  else {//PCスマホ汎用
    accordion($(this), $slide);
    return false;
  }

  function accordion($this, $slide) {
    if($this.hasClass('active')){//閉じる
      $this.removeClass('active');
      $slide.slideUp();
    }
    else {//開く
      $this.addClass('active');
      $slide.slideDown();
    }
  }
});