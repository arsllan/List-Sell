// $(document).ready(function(){
//   $('[data-toggle="tooltip"]').tooltip();
// });
////////
$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
      $('#content').toggleClass('active');
  });
});

// Time
$(document).ready(function() {
  var interval = setInterval(function() {
    $("#date-part").html(mydatetime());
  }, 100);
});
function mydatetime(){
  var currentdate = new Date();
  var datetime = '<span class="fa fa-clock-o m-t-10"></span>&nbsp;&nbsp;' + currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1)  + "-"
                + currentdate.getDate() + " "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

  return datetime;
}



//================================//

let Dashboard = (() => {
  let global = {
      tooltipOptions: {
          placement: "right" },

      menuClass: ".c-menu" };


  let menuChangeActive = el => {
      let hasSubmenu = $(el).hasClass("has-submenu");
      $(global.menuClass + " .is-active").removeClass("is-active");
      $(el).addClass("is-active");

      // if (hasSubmenu) {
      // 	$(el).find("ul").slideDown();
      // }
  };

  let sidebarChangeWidth = () => {
      let $menuItemsTitle = $("li .menu-item__title");

      $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
      $(".hamburger-toggle").toggleClass("is-opened");

      if ($("body").hasClass("sidebar-is-expanded")) {
          $('[data-toggle="tooltipe"]').tooltip("destroy");
      } else {
          $('[data-toggle="tooltipe"]').tooltip(global.tooltipOptions);
      }

  };

  return {
      init: () => {
          $(".js-hamburger").on("click", sidebarChangeWidth);

          $(".js-menu li").on("click", e => {
              menuChangeActive(e.currentTarget);
          });

          //$('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
      } };

})();


$(".collapse.show").each(function(){
  $(this).prev(".card-left").find(".fa").addClass("fa-chevron-down").removeClass("fa-chevron-right");
});
$(".collapse").on('show.bs.collapse', function(){
  $(this).prev(".card-left").find(".fa").removeClass("fa-chevron-right").addClass("fa-chevron-down");
}).on('hide.bs.collapse', function(){
  $(this).prev(".card-left").find(".fa").removeClass("fa-chevron-down").addClass("fa-chevron-right");
});



$('.minus-btn').on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());

  if (value > 1) {
    value = value - 1;
  } else {
    value = 0;
  }

  $input.val(value);

});

$('.plus-btn').on('click', function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.closest('div').find('input');
  var value = parseInt($input.val());

  if (value < 100) {
    value = value + 1;
  } else {
    value =100;
  }

  $input.val(value);
});



Dashboard.init();
//# sourceURL=pen.js




////////////////////////

var fullscreenButton = document.getElementById("fullscreenButton");
fullscreenButton.addEventListener("click", toggleFullScreen, false);

function toggleFullScreen() {
  $("fullscreenButton").attr("src", "assets/tecmyer/images/top-icon-5.png");
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    $("fullscreenButton").attr("src", "assets/tecmyer/images/top-icon-5.png");
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}





