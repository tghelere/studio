$(document).ready(function () {

//nanobar
  var colorbar = new Nanobar({target: document.getElementById('color')});
  colorbar.go(100);

//Alertas
  var alertas = $("#alertas");
  $.ajax({
      type: "POST",
      url: "/alert/",
      dataType: "json",
      success: function (data) {
        if(data != null){
          var alert = noty({text: data.msg, type: data.type, theme: 'metroui', layout: 'top', timeout: 10000, closeWith: ['click']});
          $("#alertas").html('<script type="text/javascript">'+alert+'</script>');
        }
        // noty({type:'alert'});
        // noty({type:'information'});
        // noty({type:'error'});
        // noty({type:'warning'});
        // noty({type:'success'});
      }
  });

//menu
  $('#ChangeToggle').click(function() {
    $('#navbar-menu').toggleClass('hidden');
    $('#navbar-close').toggleClass('hidden');
  });

//facebook likebox
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=936028466417582";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

//banners
   var pag = window.document.activeElement.classList[0];
   if (pag == "index") {
       var slideHeight = $(window).height() - 58; //altura da tela* menos a altura do menu
   } else {
       var slideHeight = 445;
   }
   $('#banners .item').css('height', slideHeight);
   $(window).resize(function () {
       'use strict', $('#banners .item').css('height', slideHeight);
   });

//Scroll Menu
   $(window).on('scroll', function () {
       if ($(window).scrollTop() > slideHeight) {
           $('.main-nav').addClass('navbar-fixed-top');
       } else {
           $('.main-nav').removeClass('navbar-fixed-top');
       }
   });

// mascara do form contato
  var maskBehavior = function (val) {
   return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
  options = {onKeyPress: function(val, e, field, options) {
   field.mask(maskBehavior.apply({}, arguments), options);
   }
  };

  $('.fone').mask(maskBehavior, options);

// scroll do mapa na pagina contato
  $('.mapa').click(function () {
    $('.mapa iframe').css("pointer-events", "auto");
  });

  $( ".mapa" ).mouseleave(function() {
    $('.mapa iframe').css("pointer-events", "none");
  });

//fancybox
  $('.fancy').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',

    prevEffect : 'none',
    nextEffect : 'none',

    closeBtn  : false,

    helpers : {
      title : {
        type : 'inside'
      },
      buttons	: {}
    },

    afterLoad : function() {
      this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
    }
  });

// 

});
