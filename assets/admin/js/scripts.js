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
  if ($('.departments_country').length) {
     var  departnemt_id =  $('.departments_country:checked').val();
     if (departnemt_id == 2 || departnemt_id == 1) {
        $('.restaurant_inputs').removeClass('hidden');
     }else{
        $('.restaurant_inputs').addClass('hidden');
     }
  }
  $('.departments_country').change(function(){
        var id =  $(this).val();
        if (id == 2 || id == 1) {
            $('.restaurant_inputs').removeClass('hidden');
        }else{
            $('.restaurant_inputs').addClass('hidden');
        }
        $('#departments_countries').html('');
        $('#departments_countries').addClass('loader');
        $.get(base_url+'/admin/check/departments',{id:id},function(data){
                $('#departments_countries').removeClass('loader');
                  if (data.countries) {
                    $('#departments_countries').append('<h3>Countries</h3>');
                    $.each(data.countries,function(key,value){
                         console.log(value);
                        $('#departments_countries').append('<input type="radio" name="store_country[]" value="'+key+'">'+value);
                    });
                  }
                  if (data.categories ) {
                      $('#departments_countries').append('<h3>Categories</h3>');
                      $.each(data.categories,function(key,value){
                            $('#departments_countries').append('<span><input type="checkbox" name="store_category[]" value="'+key+'">'+value+'</span>');
                        });
                  }
                  
          });
  });
  var  ast = "<div class='row color_item'>\
          <a class='close_color'>x</a>";
  $.each(langs,function(key,value){
    ast+=        "<div class='col-md-4'>\
                        <div class='input-group mb-3'>\
                        <div class='input-group-prepend'>\
                            <span class='input-group-text'> Name In "+value.name+" </span>\
                        </div>\
                        <div class='custom-file'>\
                        <div class='custom-file'>\
                          <input type='text'  class='form-control' placeholder='enter name in "+value.name+"'  required name='size_name_"+value.locale+"[]'>\
                        </div>\
                        </div>\
                        </div>\
                    </div>";
  });
  
          
  ast+="<div class='col-md-4'>\
              <div class='input-group mb-3'>\
                  <div class='input-group-prepend'>\
                      <span class='input-group-text'> Price </span>\
                  </div>\
                  <div class='custom-file'>\
                     <input type='number' required min='0' step='any' class='form-control' name='size_price[]'>\
                  </div>\
              </div>\
          </div>\
          </div>";
  $('#add_size').click(function(){
       $('#sizes').append(ast);
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  $('.close_color').click(function(){
      $(this).parent().remove();
  });
  var x = 0;
  var  aot = "<div class='row color_item'>\
          <a class='close_color'>x</a>";
  $.each(langs,function(key,value){
          aot+="<div class='col-md-6'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Name In "+value.name+"  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the question title in "+value.name+"' class='form-control'  required name='option_name_"+value.locale+"[]'>\
              </div>\
              </div>\
              </div>\
          </div>";
  })
       

          aot+="<div class='col-md-6'>\
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
              <div class='row'>";
      $.each(langs,function(key,value){
        aot+="<div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option in "+value.name+" </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require placeholder='option in "+value.name+"' class='form-control' name='option_items_"+value.locale+"_"+x+"[]'>\
                      </div>\
                  </div>";
      });
            
         aot+="</div></div>\
          </div>";
  var aoit =  "<div class='row choose_item'>\
                  <a class='close_color'>x</a>";
  $.each(langs,function(key,value){
           aoit+="<div class='input-group mb-3 col-md-6'>\
                      <div class='input-group-prepend'>\
                          <span class='input-group-text'> option in "+value.name+" </span>\
                      </div>\
                      <div class='custom-file'>\
                         <input type='text' require  placeholder='option title in "+value.name+"'  class='form-control' name='option_items_"+value.locale+"_"+x+"[]'>\
                      </div>\
                  </div>";
  });
             
  aoit+="</div>";
  $('#add_option').click(function(){

       $('#options').append(aot);
       $('.add_option_item').click(function(){
          $(this).parent().append(aoit)
          $('.close_color').click(function(){
              $(this).parent().remove();
          });
       })
       x++;
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  var aut = "<div class='row color_item'>\
          <a class='close_color'>x</a>";
  $.each(langs,function(key,value){
    aut+= "<div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> title in "+value.name+"  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='text' placeholder='enter the title in "+value.name+"' class='form-control'  required name='upon_name_"+value.locale+"[]'>\
              </div>\
              </div>\
              </div>\
          </div>";
  })
    

    aut+="<div class='col-md-4'>\
              <div class='input-group mb-3'>\
              <div class='input-group-prepend'>\
                  <span class='input-group-text'> Price  </span>\
              </div>\
              <div class='custom-file'>\
              <div class='custom-file'>\
                <input type='number'  class='form-control' step='any'  required name='upon_price[]'>\
              </div>\
              </div>\
              </div>\
          </div>\
          </div>";
  $('#add_upon').click(function(){

       $('#upon').append(aut);
       
       $('.close_color').click(function(){
              $(this).parent().remove();
          })
  });
  $('.add_option_item').click(function(){
    $(this).parent().append(aoit);
    $('.close_color').click(function(){
        $(this).parent().remove();
    });
  });
  $('.add_option_item2').click(function(){
    var index  =  $(this).data('id');
    var text =  "<div class='row choose_item'>\
                  <a class='close_color'>x</a>";
    $.each(langs,function(key,value){
             text+="<div class='input-group mb-3 col-md-6'>\
                        <div class='input-group-prepend'>\
                            <span class='input-group-text'> option in "+value.name+" </span>\
                        </div>\
                        <div class='custom-file'>\
                           <input type='text' require  placeholder='option title in "+value.name+"'  class='form-control' name='option_items_"+value.locale+"_"+index+"[]'>\
                        </div>\
                    </div>";
    });
               
    text+="</div>";
    $(this).parent().append(text);
    $('.close_color').click(function(){
        $(this).parent().remove();
    });
  });
  $('.close_img').click(function(){
    $(this).parent().remove();
  });
  $('.ajax_form').submit(function(e){
      e.preventDefault();
      $(this).addClass('form_loader');
      var  el = $(this);
      var  url = $(this).attr('action');
      $.post(url,$( this ).serialize(),function(data){
        if (data.state == 1) {
          $('.modal').modal('hide');
          el.children('.form_error').removeClass('error').text('');
          el[0].reset();
          successClick(data.msg);
          if (el.hasClass('edit_form')) {
            setTimeout(function(){
              location.reload();
            },2000)
          }
        }else{
          el.children('.form_error').addClass('error').text(data.msg);
        }
        el.removeClass('form_loader');
      });
  });
  var successClick = function(msg){
    $.notify({

      // options

      title: '<strong>Done Successfully</strong>',

      message: "<br>"+msg,

        icon: 'glyphicon glyphicon-ok',
    },{

      // settings

      element: 'body',

      //position: null,

      type: "success",

      //allow_dismiss: true,

      //newest_on_top: false,

      showProgressbar: false,

      placement: {

        from: "top",

        align: "left"

      },

      offset: 150,

      spacing: 10,

      z_index: 1031,

      delay: 3000,

      timer: 1000,

      url_target: '_blank',

      mouse_over: null,

      animate: {

        enter: 'animated fadeInDown',

        exit: 'animated fadeOutRight'

      },

      onShow: null,

      onShown: null,

      onClose: null,

      onClosed: null,

      icon_type: 'class',
    });
  } 
  
})(jQuery);
if ($('.basic-select').length) {
    $('.basic-select').select2();
}
if ($('.alert-success').length) {
    setTimeout(function(){
                  $('.alert-success').hide();
                },2000)
}
var gurantee_index = 0;
$('#add_gurantee').click(function(){
     var text = '\
     <div class="row gurantee_item">\
         <a class="close_item">X</a> \
         <div class="col-md-12">\
         <div class="input-group mb-3">\
            <div class="input-group-prepend">\
                <span class="input-group-text"> Icon </span>\
            </div>\
          <div class="custom-file">\
             <input class="form-control" required="" name="gurantee_image[]" type="file">\
          </div> </div>\
         </div>\
         <div class="col-md-6">\
            <div class="input-group mb-3">\
               <div class="input-group-prepend">\
                  <span class="input-group-text" id="basic-addon1">Name In English</span>\
               </div>\
               <input class="form-control" placeholder="Name In English" required="" name="gurantee_en[]" type="text">\
            </div>\
            <div class="input-group mb-3">\
               <label class="label-control">text in english</label>\
               <textarea class="form-control ck-gurantee_'+gurantee_index+'" placeholder="text In English" required="" name="gurantee_text_en[]" cols="50" rows="10"></textarea>\
            </div>\
         </div>\
         <div class="col-md-6">\
            <div class="input-group mb-3">\
               <div class="input-group-prepend">\
                  <span class="input-group-text" id="basic-addon1">Name In Arabic</span>\
               </div>\
               <input class="form-control" placeholder="Name In Arabic" required="" name="gurantee_ar[]" type="text">\
            </div>\
            <div class="input-group mb-3">\
               <label class="label-control">text in arabic</label>\
               <textarea class="form-control ck-gurantee_'+gurantee_index+'" placeholder="text In Arabic" required="" name="gurantee_text_ar[]" cols="50" rows="10"></textarea>\
            </div>\
         </div>\
      </div>';
      $('#gurantees').append(text);
      CKEDITOR.replaceAll('ck-gurantee_'+gurantee_index);
      gurantee_index++;
      $('.close_item').click(function(){
        $(this).parent().remove();
      });
})
if ($('#ck-gurantee').length) {
  CKEDITOR.replaceAll('ck-gurantee');
}
$('.close_item').click(function(){
  $(this).parent().remove();
});
$('#add_filter_item').click(function(){
      console.log(22);
      var text = '<div class="row gurantee_item">\
         <a class="close_item">X</a>';
      $.each(langs,function(index,value){
       text +='<div class="col-md-6">\
           <input name="item_'+value.locale+'[]" placeholder="name in '+value.name+'" class="form-control">\
       </div>'
      })
      text += '</div>';
      $('#filter_items').append(text);
      
      $('.close_item').click(function(){
        $(this).parent().remove();
      });
})