/* Dore Theme Select & Initializer Script 

Table of Contents

01. Css Loading Util
02. Theme Selector And Initializer
*/

/* 01. Css Loading Util */
function loadStyle(href, callback) {
  for (var i = 0; i < document.styleSheets.length; i++) {
    if (document.styleSheets[i].href == href) {
      return;
    }
  }
  var head = document.getElementsByTagName("head")[0];
  var link = document.createElement("link");
  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = base_url+'/'+'assets/admin/'+href;
  if (callback) {
    link.onload = function () {
      callback();
    };
  }
  var mainCss = $(head).find('[href$="main.css"]');
  if (mainCss.length !== 0) {
    mainCss[0].before(link);
  } else {
    head.appendChild(link);
  }
}

/* 02. Theme Selector, Layout Direction And Initializer */
(function ($) {
  if ($().dropzone) {
    Dropzone.autoDiscover = false;
  }

  var themeColorsDom = /*html*/`
  
`;

 // $("body").append(themeColorsDom);


  /* Default Theme Color, Border Radius and  Direction */
  var theme = "dore.light.bluenavy.min.css";
  var direction = "ltr";
  var radius = "rounded";

  if (typeof Storage !== "undefined") {
    if (localStorage.getItem("dore-theme-color")) {
      theme = localStorage.getItem("dore-theme-color");
    } else {
      localStorage.setItem("dore-theme-color", theme);
    }
    if (localStorage.getItem("dore-direction")) {
      direction = localStorage.getItem("dore-direction");
    } else {
      localStorage.setItem("dore-direction", direction);
    }
    if (localStorage.getItem("dore-radius")) {
      radius = localStorage.getItem("dore-radius");
    } else {
      localStorage.setItem("dore-radius", radius);
    }
  }

  $(".theme-color[data-theme='" + theme + "']").addClass("active");
  $(".direction-radio[data-direction='" + direction + "']").attr("checked", true);
  $(".radius-radio[data-radius='" + radius + "']").attr("checked", true);
  $("#switchDark").attr("checked", theme.indexOf("dark") > 0 ? true : false);

  loadStyle("css/" + theme, onStyleComplete);
  function onStyleComplete() {
    setTimeout(onStyleCompleteDelayed, 300);
  }

  function onStyleCompleteDelayed() {
    $("body").addClass(direction);
    $("html").attr("dir", direction);
    $("body").addClass(radius);
    $("body").dore();
  }

  $("body").on("click", ".theme-color", function (event) {
    event.preventDefault();
    var dataTheme = $(this).data("theme");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("dore-theme-color", dataTheme);
      window.location.reload();
    }
  });

  $("input[name='directionRadio']").on("change", function (event) {
    var direction = $(event.currentTarget).data("direction");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("dore-direction", direction);
      window.location.reload();
    }
  });

  $("input[name='radiusRadio']").on("change", function (event) {
    var radius = $(event.currentTarget).data("radius");
    if (typeof Storage !== "undefined") {
      localStorage.setItem("dore-radius", radius);
      window.location.reload();
    }
  });

  $("#switchDark").on("change", function (event) {
    var mode = $(event.currentTarget)[0].checked ? "dark" : "light";
    if (mode == "dark") {
      theme = theme.replace("light", "dark");
    } else if (mode == "light") {
      theme = theme.replace("dark", "light");
    }
    if (typeof Storage !== "undefined") {
      localStorage.setItem("dore-theme-color", theme);
      window.location.reload();
    }
  });

  $(".theme-button").on("click", function (event) {
    event.preventDefault();
    $(this)
      .parents(".theme-colors")
      .toggleClass("shown");
  });

  $(document).on("click", function (event) {
    if (
      !(
        $(event.target)
          .parents()
          .hasClass("theme-colors") ||
        $(event.target)
          .parents()
          .hasClass("theme-button") ||
        $(event.target).hasClass("theme-button") ||
        $(event.target).hasClass("theme-colors")
      )
    ) {
      if ($(".theme-colors").hasClass("shown")) {
        $(".theme-colors").removeClass("shown");
      }
    }
  });
  $('#country_id').change(function(){
      var  id =  $(this).val();
      $.get(base_url+'/admin/country/change/'+id,function(data){
          $('#city').html(data);
      });
  });
  if ($('#country_id').length) {
      var  id =  $('#country_id').val();
      var city_id =  $('#city').data('city');
      $.get(base_url+'/admin/country/change/'+id,{city_id:city_id},function(data){
          $('#city').html(data);
      });
  }
  $('.departments_country').change(function(){
        var id =  $(this).val();
        $('#departments_countries').html('');
        $('#departments_countries').addClass('loader');
        $.get(base_url+'/admin/check/departments',{id:id},function(data){
                $('#departments_countries').removeClass('loader');
                  if (data.countries) {
                    $('#departments_countries').append('<h3>Countries</h3>');
                    $.each(data.countries,function(key,value){
                         console.log(value);
                        $('#departments_countries').append('<input type="radio" name="store_country" value="'+key+'">'+value);
                    });
                  }
                  if (data.categories ) {
                      $('#departments_countries').append('<h3>Categories</h3>');
                      $.each(data.categories,function(key,value){
                            $('#departments_countries').append('<input type="radio" name="store_category" value="'+key+'">'+value);
                        });
                  }
                  
          });
  });
  $('#add_size').click(function(){
       $('#sizes').append("<div class='row color_item'>\
          <a class='close_color'>x</a>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Name  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text'  class='form-control'  required name='size_name[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Name In Arabic </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text'  class='form-control'  required name='size_name_ar[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
                  <div class='input-group-prepend'>\
                      <span class='input-group-text'> Price </span>\
                  </div>\
                  <div class='custom-file'>\
                     <input type='number' required min='0' class='form-control' name='size_price[]'>\
                  </div>\
              </div>\
          </div>\
          </div>");
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  $('.close_color').click(function(){
      $(this).parent().remove();
  });
  var x = 0;
  $('#add_option').click(function(){

       $('#options').append("<div class='row color_item'>\
          <a class='close_color'>x</a>\
          <div class='col-md-6'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Name  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the question title ' class='form-control'  required name='option_name[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-6'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Name In Arabic  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the question title ' class='form-control'  required name='option_name_ar[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-6'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Minimum Options  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='number' min='0'  class='form-control'  required name='min_option[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-6'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> maximum Options  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='number' min='0'  class='form-control'  required name='max_option[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-12 option_items'>\
              <input type='hidden' value='"+x+"' name='option_index[]'> \
              <a class='btn btn-primary add_option btn-xs add_option_item'> add item</a>\
              <h3> Options </h3>\
              <div class='row'>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require placeholder='first option' class='form-control' name='option_items_"+x+"[]'>\
                      </div>\
                  </div>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option in arabic </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require placeholder='first option in arabic' class='form-control' name='option_items_ar_"+x+"[]'>\
                      </div>\
                  </div>\
              </div>\
              <div class='row'>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require placeholder='second option' class='form-control' name='option_items_"+x+"[]'>\
                      </div>\
                  </div>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option in arabic </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require placeholder='second option in arabic' class='form-control' name='option_items_ar_"+x+"[]'>\
                      </div>\
                  </div>\
              </div>\
          </div>\
          </div>");
       $('.add_option_item').click(function(){
          $(this).parent().append("<div class='row choose_item'>\
                  <a class='close_color'>x</a>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require  placeholder='option title'  class='form-control' name='option_items_"+(x-1)+"[]'>\
                      </div>\
                  </div>\
                  <div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require  placeholder='option title in arabic'  class='form-control' name='option_items_ar_"+(x-1)+"[]'>\
                      </div>\
                  </div>\
              </div>")
          $('.close_color').click(function(){
              $(this).parent().remove();
          });
       })
       x++;
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  $('#add_upon').click(function(){

       $('#upon').append("<div class='row color_item'>\
          <a class='close_color'>x</a>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> title  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the title ' class='form-control'  required name='upon_name[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> title in arabic  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the title in arabic ' class='form-control'  required name='upon_name_ar[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          <div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Price  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='number'  class='form-control'  required name='upon_price[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          </div>");
       
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  $('.add_option_item').click(function(){
    console.log(222);
    $(this).parent().append("<div class='row choose_item'>\
            <a class='close_color'>x</a>\
            <div class='input-group mb-3 col-md-6'>\
                <div class='input-group-prepend'>\
                    <span class='input-group-text'> option </span>\
                </div>\
                <div class='custom-file'>\
                   <input type='text' require  placeholder='option title'  class='form-control' name='option_items_"+(x-1)+"[]'>\
                </div>\
            </div>\
            <div class='input-group mb-3 col-md-6'>\
                <div class='input-group-prepend'>\
                    <span class='input-group-text'> option </span>\
                </div>\
                <div class='custom-file'>\
                   <input type='text' require  placeholder='option title in arabic'  class='form-control' name='option_items_ar_"+(x-1)+"[]'>\
                </div>\
            </div>\
        </div>")
    $('.close_color').click(function(){
        $(this).parent().remove();
    });
 })
})(jQuery);
 