(function ($) {
  "use strict";

  // Preloader (if the #preloader div exists)
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  $(window).on('load', function () {
    $('[data-toggle="popover"]').popover();   
  });

  $(function(e) {
    var url = 'http://localhost:8001/api.php/rss_sources';
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(result) {
        $.each(result['rss_sources']['records'], function(index, value) {
          if(value[5] == 0){
            $('.news_provider_boxes').append('<div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s"><div class="box"><h4 class="title"><a href="javascript:;">'+value[1]+'</a></h4><a href="javascript:;" style="padding: 1px 40px;">'+value[2]+'</a><p class="description">Last Succsessfull update: '+value[4]+'</p><p class="description">Last Update attempt: '+value[6]+'</p><div><a href="javascript:;" class="btn-edit-provide scrollto" data-id="'+value[0]+'">Edit</a><a href="javascript:;" class="btn-delete-provide scrollto" data-id="'+value[0]+'">Delete</a><div class="custom-control custom-switch" style="padding: 1px 5px 0px 69px;position: absolute;margin: -149px 258px;" ><input type="checkbox" data-id="'+value[0]+'" class="custom-control-input change-prod-state" id="customSwitches-'+value[0]+'"><label class="custom-control-label" for="customSwitches-'+value[0]+'">State</label></div></div></div></div>');
          }else if (value[5] == 1){
            $('.news_sources').append('<li data-filter=".filter-'+value[0]+'">'+value[1]+'</li>');
            $('.news_provider_boxes').append('<div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s"><div class="box"><h4 class="title"><a href="javascript:;">'+value[1]+'</a></h4><a href="javascript:;" style="padding: 1px 40px;">'+value[2]+'</a><p class="description">Last Succsessfull update: '+value[4]+'</p><p class="description">Last Update attempt: '+value[6]+'</p><div><a href="javascript:;" class="btn-edit-provide scrollto" data-id="'+value[0]+'">Edit</a><a href="javascript:;" class="btn-delete-provide scrollto" data-id="'+value[0]+'">Delete</a><div class="custom-control custom-switch" style="padding: 1px 5px 0px 69px;position: absolute;margin: -149px 258px;" ><input type="checkbox" data-id="'+value[0]+'" class="custom-control-input change-prod-state" id="customSwitches-'+value[0]+'" checked><label class="custom-control-label" for="customSwitches-'+value[0]+'">State</label></div></div></div></div>');
          }
        });
      }
    });
  });

  $(function(e) {
    var url = 'http://localhost:8001/api.php/rss_feeds';
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(result) {
        $(".rss_feeds").empty();
        $.each(result['rss_feeds']['records'], function(index, value) {
          var text_to_popover = "<ul><li><a href='javascript:;' data-id='"+value[0]+"' class='edit-news-feed'>Edit</a></li><li><a href='javascript:;' data-id='"+value[0]+"' class='delete-news-feed'>Delete</a></li></ul>"
          $('.rss_feeds').append('<div class="col-lg-12 col-md-6 portfolio-item filter-'+value[1]+'"> \
            <div class="box"> \
              <h4 class="title"><a href="">'+value[2]+'</a>\
              <i class="fa fa-ellipsis-h pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="'+text_to_popover+'" aria-hidden="true"></i> \
              <span class="pull-right" style="padding-right: 36px;">Pub Date: '+value[5]+'</span> \
              </h4> \
              <p class="description">'+value[3]+'</p> \
              <a href="'+value[4]+'" target="_blank">Visit Link....</a> <span class="pull-right" style="padding-right: 36px">Updated at: '+value[7]+'</span>\
            </div> \
          </div>');
        });
      }
    });
  });

  // Smooth scroll for the navigation and links with .scrollto classes
  $('#update_feeds_data').on('click', function() {
    var url = "http://localhost:8001/get_feeds.php"
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });

  $('.save-new-source').on('click',function(){
    var form_data = $('#add-new-source-form').serialize();
    var url = "http://localhost:8001/api.php/rss_sources"
    $.ajax({
      url: url,
      type: 'post',
      data: form_data,
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });

  $('#delete_old_feeds_data').on('click', function() {
    var url = "http://localhost:8001/delete_old_feeds.php"
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });

  $('body').on('click','.btn-delete-provide', function() {
    var record_id = $(this).attr('data-id');
    var url = "http://localhost:8001/api.php/rss_sources/"+record_id
    $.ajax({
      url: url,
      type: 'DELETE',
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });

  $('body').on('click','.btn-edit-provide', function() {
    var record_id = $(this).attr('data-id');
    var url = "http://localhost:8001/api.php/rss_sources/"+record_id;
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(result) {
        $('#edit-name').val(result["name"]);
        $('#edit-link').val(result["link"]);
        $('.save-edit-new-source').attr('data-id',result['id'])
        //if(result["status"] == 0){
        //  $('#edit-status').prop('checked', false);
        //}else if(result["status"] == 1){
        //  $('#edit-status').prop('checked', true);
        //}
        $('#editSource').modal('show');
      }
    });
  });

  $('.save-edit-new-source').on('click',function(){
    var record_id = $(this).attr('data-id');
    var d = new Date();
    var date_time =d.getFullYear() +"-"+(d.getMonth() + 1) +"-"+d.getDate()+" "+ d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    var form_data = $('#edit-news-source-form').serialize();
    form_data = form_data+"&updated_data="+date_time;
    var url = "http://localhost:8001/api.php/rss_sources/"+record_id;
    $.ajax({
      url: url,
      type: 'PUT',
      data: form_data,
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });


  $('body').on('click','.edit-news-feed', function() {
    var record_id = $(this).attr('data-id');
    var url = "http://localhost:8001/api.php/rss_feeds/"+record_id;
    $.ajax({
      url: url,
      type: 'GET',
      dataType: 'json',
      success: function(result) {
        $('#edit-news-title').val(result["title"]);
        $('#edit-news-link').val(result["link"]);
        $('.save-edit-new-feed').attr('data-id',result['id'])
        //if(result["status"] == 0){
        //  $('#edit-status').prop('checked', false);
        //}else if(result["status"] == 1){
        //  $('#edit-status').prop('checked', true);
        //}
        $('#editNews').modal('show');
      }
    });
  });

  $('.save-edit-new-feed').on('click',function(){
    var record_id = $(this).attr('data-id');
    var d = new Date();
    var date_time =d.getFullYear() +"-"+(d.getMonth() + 1) +"-"+d.getDate()+" "+ d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    var form_data = $('#edit-news-feed-form').serialize();
    form_data = form_data+"&updated_date="+date_time;
    var url = "http://localhost:8001/api.php/rss_feeds/"+record_id;
    $.ajax({
      url: url,
      type: 'PUT',
      data: form_data,
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });


  $('body').on('change','.change-prod-state',function(){ 
    var record_id = $(this).attr('data-id');
    if($(this).prop("checked") == true){
      var data_state = 'status=1';
    }
    else if($(this).prop("checked") == false){
      var data_state = 'status=0'
    }

    var url = "http://localhost:8001/api.php/rss_sources/"+record_id
    $.ajax({
      url: url,
      type: 'PUT',
      data: data_state,
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });


  $('body').on('click','.delete-news-feed',function(){ 
    var record_id = $(this).attr('data-id');
    var url = "http://localhost:8001/api.php/rss_feeds/"+record_id
    $.ajax({
      url: url,
      type: 'DELETE',
      dataType: 'json',
      complete: function(result) {
        window.location.reload(true);
      }
    });
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Smooth scroll for the navigation and links with .scrollto classes
  $('.main-nav a, .mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (! $('#header').hasClass('header-scrolled')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.main-nav, .mobile-nav').length) {
          $('.main-nav .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.main-nav, .mobile-nav');
  var main_nav_height = $('#header').outerHeight();

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop();
  
    nav_sections.each(function() {
      var top = $(this).offset().top - main_nav_height,
          bottom = top + $(this).outerHeight();
  
      if (cur_pos >= top && cur_pos <= bottom) {
        main_nav.find('li').removeClass('active');
        main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('active');
      }
    });
  });

  // jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  // Porfolio isotope and filter
  $(window).on('load', function () {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
    });
    $('#portfolio-flters li').on( 'click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');
  
      portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

})(jQuery);

