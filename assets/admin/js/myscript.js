(function($) {
    "use strict";

  $(document).ready(function() {


function disablekey()
{
 document.onkeydown = function (e)
 {
  return false;
 }
}

function enablekey()
{
 document.onkeydown = function (e)
 {
  return true;
 }
}

// **************************************  AJAX REQUESTS SECTION *****************************************

  // Status Start
      $(document).on('click','.status',function () {
        var link = $(this).attr('data-href');
            $.get( link, function(data) {
              }).done(function(data) {
                  table.ajax.reload();
                  $('.alert-danger').hide();
                  $('.alert-success').show();
                  $('.alert-success p').html(data);
            })
          });
  // Status Ends


  // Display Subcategories & attributes
      $(document).on('change','#cat',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#subcat').load(link);
          $('#subcat').prop('disabled',false);
        }
        $.get(getattrUrl + '?id=' + this.value + '&type=category', function(data) {
          console.log(data);
          let attrHtml = '';
          for (var i = 0; i < data.length; i++) {
            attrHtml += `
            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">${data[i].attribute.name} *</h4>
                </div>
              </div>
              <div class="col-lg-7">
            `;

            for (var j = 0; j < data[i].options.length; j++) {
              let priceClass = '';
              if (data[i].attribute.price_status == 0) {
                priceClass = 'd-none';
              }
              attrHtml += `
                <div class="row mb-0 option-row">
                  <div class="col-lg-5">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="${data[i].attribute.input_name}${data[i].options[j].id}" name="${data[i].attribute.input_name}[]" value="${data[i].options[j].name}" class="custom-control-input attr-checkbox">
                      <label class="custom-control-label" for="${data[i].attribute.input_name}${data[i].options[j].id}">${data[i].options[j].name}</label>
                    </div>
                  </div>
                  <div class="col-lg-7 ${priceClass}">
                    <div class="row">
                      <div class="col-2">
                        +
                      </div>
                      <div class="col-10">
                        <div class="price-container">
                          <span class="price-curr">${curr.sign}</span>
                          <input type="text" class="input-field price-input" id="${data[i].attribute.input_name}${data[i].options[j].id}_price" data-name="${data[i].attribute.input_name}_price[]" placeholder="0.00 (Additional Price)" value="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              `;
            }

            attrHtml +=  `
              </div>
            </div>
            `;
          }

          $("#catAttributes").html(attrHtml);
          $("#subcatAttributes").html('');
          $("#childcatAttributes").html('');
        });
      });
  // Display Subcategories Ends

  // Display Childcategories & Attributes
      $(document).on('change','#subcat',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#childcat').load(link);
          $('#childcat').prop('disabled',false);
        }

        $.get(getattrUrl + '?id=' + this.value + '&type=subcategory', function(data) {
          console.log(data);
          let attrHtml = '';
          for (var i = 0; i < data.length; i++) {
            attrHtml += `
            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">${data[i].attribute.name} *</h4>
                </div>
              </div>
              <div class="col-lg-7">
            `;

            for (var j = 0; j < data[i].options.length; j++) {
              let priceClass = '';
              if (data[i].attribute.price_status == 0) {
                priceClass = 'd-none';
              }
              attrHtml += `
                  <div class="row option-row">
                    <div class="col-lg-5">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="${data[i].attribute.input_name}${data[i].options[j].id}" name="${data[i].attribute.input_name}[]" value="${data[i].options[j].name}" class="custom-control-input attr-checkbox">
                        <label class="custom-control-label" for="${data[i].attribute.input_name}${data[i].options[j].id}">${data[i].options[j].name}</label>
                      </div>
                    </div>
                    <div class="col-lg-7 ${priceClass}">
                      <div class="row">
                        <div class="col-2">
                          +
                        </div>
                        <div class="col-10">
                          <div class="price-container">
                            <span class="price-curr">${curr.sign}</span>
                            <input type="text" class="input-field price-input" id="${data[i].attribute.input_name}${data[i].options[j].id}_price" data-name="${data[i].attribute.input_name}_price[]" placeholder="0.00 (Additional Price)" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              `;
            }

            attrHtml +=  `
              </div>
            </div>
            `;
          }

          $("#subcatAttributes").html(attrHtml);
          $("#childcatAttributes").html('');
        });
      });
  // Display Childcateogries & Attributes Ends


  // Display Attributes for Selected Childcategory Starts
      $(document).on('change','#childcat',function () {

        $.get(getattrUrl + '?id=' + this.value + '&type=childcategory', function(data) {
          console.log(data);
          let attrHtml = '';
          for (var i = 0; i < data.length; i++) {
            attrHtml += `
            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">${data[i].attribute.name} *</h4>
                </div>
              </div>
              <div class="col-lg-7">
            `;

            for (var j = 0; j < data[i].options.length; j++) {
              let priceClass = '';
              if (data[i].attribute.price_status == 0) {
                priceClass = 'd-none';
              }
              attrHtml += `
                  <div class="row option-row">
                    <div class="col-lg-5">
                      <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="${data[i].attribute.input_name}${data[i].options[j].id}" name="${data[i].attribute.input_name}[]" value="${data[i].options[j].name}" class="custom-control-input attr-checkbox">
                        <label class="custom-control-label" for="${data[i].attribute.input_name}${data[i].options[j].id}">${data[i].options[j].name}</label>
                      </div>
                    </div>
                    <div class="col-lg-7 ${priceClass}">
                      <div class="row">
                        <div class="col-2">
                          +
                        </div>
                        <div class="col-10">
                          <div class="price-container">
                            <span class="price-curr">${curr.sign}</span>
                            <input type="text" id="${data[i].attribute.input_name}${data[i].options[j].id}_price" class="input-field price-input" data-name="${data[i].attribute.input_name}_price[]" placeholder="0.00 (Additional Price)" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              `;
            }

            attrHtml +=  `
              </div>
            </div>
            `;
          }

          $("#childcatAttributes").html(attrHtml);
        });
      });
  // Display Attributes for Selected Childcategory Ends



  // Droplinks Start
      $(document).on('change','.droplinks',function () {

        var link = $(this).val();
        var data = $(this).find(':selected').attr('data-val');
        if(data == 0)
        {
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-success").addClass("drop-danger");
        }
        else{
          $(this).next(".nice-select.process.select.droplinks").removeClass("drop-danger").addClass("drop-success");
        }
        $.get(link);
        $.notify("Status Updated Successfully.","success");
      });


      $(document).on('change','.vdroplinks',function () {

        var link = $(this).val();
        var data = $(this).find(':selected').attr('data-val');
        if(data == 0)
        {
          $(this).next(".nice-select.process.select1.vdroplinks").removeClass("drop-success").addClass("drop-danger");
        }
        else{
          $(this).next(".nice-select.process.select1.vdroplinks").removeClass("drop-danger").addClass("drop-success");
        }
        $.get(link);
        $.notify("Status Updated Successfully.","success");
      });

      $(document).on('change','.data-droplinks',function (e) {
          $('#confirm-delete1').modal('show');
          $('#confirm-delete1').find('.btn-ok').attr('href', $(this).val());
          table.ajax.reload();
          var data = $(this).children("option:selected").html();
          if(data == 'Pending') {
            $('#t-txt').addClass('d-none');
            $('#t-txt').val('');
          }
          else {
            $('#t-txt').removeClass('d-none');
          }
          $('#t-id').val($(this).data('id'));
          $('#t-title').val(data);
        });

      $(document).on('change','.vendor-droplinks',function (e) {
          $('#confirm-delete1').modal('show');
          $('#confirm-delete1').find('.btn-ok').attr('href', $(this).val());
          table.ajax.reload();
        });

    $(document).on('change','.order-droplinks',function (e) {
        $('#confirm-delete2').modal('show');
        $('#confirm-delete2').find('.btn-ok').attr('href', $(this).val());
      });


  // Droplinks Ends



// ADD OPERATION

$(document).on('click','#add-data',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal1').find('.modal-title').html('ADD NEW '+$('#headerdata').val());
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }

    });
});

// ADD OPERATION END


// Attribute Modal

$(document).on('click','.attribute',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#attribute').find('.modal-title').html($('#attribute_data').val());
  $('#attribute .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }

    });
});



// Attribute Modal Ends


// EDIT OPERATION

$(document).on('click','.edit',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal1').find('.modal-title').html('EDIT '+$('#headerdata').val());
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }
    });
});


// EDIT OPERATION END


// FEATURE OPERATION

$(document).on('click','.feature',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal2').find('.modal-title').html($('#headerdata').val()+' Highlight');
  $('#modal2 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }

          var dateToday = new Date();
          $( "#discount_date" ).datepicker({
              changeMonth: true,
              changeYear: true,
              minDate: dateToday,
          });

      }
    });
});


// EDIT OPERATION END


// SHOW OPERATION

$(document).on('click','.view',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal1').find('.modal-title').html($('#headerdata').val()+' DETAILS');
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }

    });
});


// SHOW OPERATION END


// TRACK OPERATION

$(document).on('click','.track',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal1').find('.modal-title').html('TRACK ' + $('#headerdata').val());
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }

    });
});


// TRACK OPERATION END


// DELIVERY OPERATION

$(document).on('click','.delivery',function(){
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#modal1').find('.modal-title').html('DELIVERY STATUS');
  $('#modal1 .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }

    });
});


// DELIVERY OPERATION END



// ADD / EDIT FORM SUBMIT FOR DATA TABLE


$(document).on('submit','#geniusformdata',function(e){
  e.preventDefault();
if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('button.addProductSubmit-btn').prop('disabled',true);
  disablekey();
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          console.log(data);
          if ((data.errors)) {
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>');
            }
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
            $("#modal1 .modal-content .modal-body .alert-danger").focus();
            $('button.addProductSubmit-btn').prop('disabled',false);
            $('#geniusformdata input , #geniusformdata select , #geniusformdata textarea').eq(1).focus();
          }
          else
          {
            table.ajax.reload();
            $('.alert-success').show();
            $('.alert-success p').html(data);
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
            $('button.addProductSubmit-btn').prop('disabled',false);
            $('#modal1,#modal2,#verify-modal').modal('hide');

           }
          enablekey();
       }

      });

});


// ADD / EDIT FORM SUBMIT FOR DATA TABLE ENDS

// CATALOG OPTION

      $('#catalog-modal').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });

      $('#catalog-modal .btn-ok').on('click', function(e) {

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}

        $.ajax({
         type:"GET",
         url:$(this).attr('href'),
         success:function(data)
         {
              $('#catalog-modal').modal('toggle');
              table.ajax.reload();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data);


        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }


         }
        });
        return false;
      });


 // CATALOG OPTION ENDS

      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });

      $('#confirm-delete .btn-ok').on('click', function(e) {

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}

        $.ajax({
         type:"GET",
         url:$(this).attr('href'),
         success:function(data)
         {
              $('#confirm-delete').modal('toggle');
              table.ajax.reload();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data);


        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }


         }
        });
        return false;
      });

      $('#confirm-delete1 .btn-ok').on('click', function(e) {

      if(admin_loader == 1)
        {
        $('.submit-loader').show();
      }

        $.ajax({
         type:"GET",
         url:$(this).attr('href'),
         success:function(data)
         {
              $('#confirm-delete1').modal('toggle');
              table.ajax.reload();
              $('.alert-danger').hide();
              $('.alert-success').show();
              $('.alert-success p').html(data[0]);

        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }


         }
        });

        if($('#t-txt').length > 0)
{

      var tdata =  $('#t-txt').val();

      if(tdata.length > 0) {

        var id = $('#t-id').val();
        var title = $('#t-title').val();
        var text = $('#t-txt').val();
        $.ajax({
          url: $('#t-add').val(),
          method: "GET",
          data: { id : id, title: title, text : text }
        });

      }

}




        return false;
      });


    $('#confirm-delete2 .btn-ok').on('click', function(e) {

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}

      $.ajax({
       type:"GET",
       url:$(this).attr('href'),
       success:function(data)
       {

        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }

            $('#confirm-delete2').modal('toggle');
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html(data[0]);
            $(".nice-select.process.select.order-droplinks").attr('class','nice-select process select order-droplinks '+data[1]);
       }
      });

      return false;
    });

// DELETE OPERATION END

  });



// NORMAL FORM

$(document).on('submit','#geniusform',function(e){
e.preventDefault();
if(admin_loader == 1)
  {
$('.gocover').show();
  }

  var fd = new FormData(this);

  if ($('.attr-checkbox').length > 0) {
    $('.attr-checkbox').each(function() {

      // if checkbox checked then take the value of corresponsig price input (if price input exists)
      if($(this).prop('checked') == true) {

        if ($("#"+$(this).attr('id')+'_price').val().length > 0) {
          // if price value is given
          fd.append($("#"+$(this).attr('id')+'_price').data('name'), $("#"+$(this).attr('id')+'_price').val());
        } else {
          // if price value is not given then take 0
          fd.append($("#"+$(this).attr('id')+'_price').data('name'), 0.00);
        }

        // $("#"+$(this).attr('id')+'_price').val(0.00);
      }
    });
  }

var geniusform = $(this);
$('button.addProductSubmit-btn').prop('disabled',true);
    $.ajax({
     method:"POST",
     url:$(this).prop('action'),
     data:fd,
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        console.log(data);
        if ((data.errors)) {
        geniusform.parent().find('.alert-success').hide();
        geniusform.parent().find('.alert-danger').show();
        geniusform.parent().find('.alert-danger ul').html('');
          for(var error in data.errors)
          {
            $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
          }
          geniusform.find('input , select , textarea').eq(1).focus();
        }
        else
        {
          geniusform.parent().find('.alert-danger').hide();
          geniusform.parent().find('.alert-success').show();
          geniusform.parent().find('.alert-success p').html(data);
          geniusform.find('input , select , textarea').eq(1).focus();
        }
          if(admin_loader == 1){
        $('.gocover').hide();
          }

        $('button.addProductSubmit-btn').prop('disabled',false);


        $(window).scrollTop(0);

     }

    });

});

// NORMAL FORM ENDS



// NORMAL FORM

$(document).on('submit','#trackform',function(e){
  e.preventDefault();
  if(admin_loader == 1)
  {
  $('.gocover').show();
  }

  $('button.addProductSubmit-btn').prop('disabled',true);
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('#trackform .alert-success').hide();
          $('#trackform .alert-danger').show();
          $('#trackform .alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('#trackform .alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
            }
            $('#trackform input , #trackform select , #trackform textarea').eq(1).focus();
          }
          else
          {
            $('#trackform .alert-danger').hide();
            $('#trackform .alert-success').show();
            $('#trackform .alert-success p').html(data);
            $('#trackform input , #trackform select , #trackform textarea').eq(1).focus();
            $('#track-load').load($('#track-load').data('href'));

          }
  if(admin_loader == 1)
  {
          $('.gocover').hide();
  }

          $('button.addProductSubmit-btn').prop('disabled',false);
       }

      });

});

// NORMAL FORM ENDS

// MESSAGE FORM

$(document).on('submit','#messageform',function(e){
  e.preventDefault();
  var href = $(this).data('href');
  if(admin_loader == 1)
  {
  $('.gocover').show();
  }
  $('button.mybtn1').prop('disabled',true);
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
            }
            $('#messageform textarea').val('');
          }
          else
          {
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html(data);
            $('#messageform textarea').val('');
            $('#messages').load(href);
          }
  if(admin_loader == 1)
  {
          $('.gocover').hide();
  }
          $('button.mybtn1').prop('disabled',false);
       }
      });
});

// MESSAGE FORM ENDS


// LOGIN FORM

$("#loginform").on('submit',function(e){
  e.preventDefault();
  $('button.submit-btn').prop('disabled',true);
  $('.alert-info').show();
  $('.alert-info p').html($('#authdata').val());
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-info').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger p').html(data.errors[error]);
            }
          }
          else
          {
            $('.alert-info').hide();
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html('Success !');
            window.location = data;
          }
          $('button.submit-btn').prop('disabled',false);
       }

      });

});


// LOGIN FORM ENDS


// FORGOT FORM

$("#forgotform").on('submit',function(e){
  e.preventDefault();
  $('button.submit-btn').prop('disabled',true);
  $('.alert-info').show();
  $('.alert-info p').html($('#authdata').val());
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-info').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger p').html(data.errors[error]);
            }
          }
          else
          {
            $('.alert-info').hide();
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html(data);
            $('input[type=email]').val('');
          }
          $('button.submit-btn').prop('disabled',false);
       }

      });

});


// FORGOT FORM ENDS

// USER REGISTER NOTIFICATION

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:$("#user-notf-count").data('href'),
                    success:function(data){
                        $("#user-notf-count").html(data);
                      }
              });
    }, 5000);
});

$(document).on('click','#notf_user',function(){
  $("#user-notf-count").html('0');
  $('#user-notf-show').load($("#user-notf-show").data('href'));
});

$(document).on('click','#user-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#user-notf-clear').data('href'));
});

// USER REGISTER NOTIFICATION ENDS

// ORDER NOTIFICATION

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:$("#order-notf-count").data('href'),
                    success:function(data){
                        $("#order-notf-count").html(data);
                      }
              });
    }, 5000);
});

$(document).on('click','#notf_order',function(){
  $("#order-notf-count").html('0');
  $('#order-notf-show').load($("#order-notf-show").data('href'));
});

$(document).on('click','#order-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#order-notf-clear').data('href'));
});

// ORDER NOTIFICATION ENDS

// PRODUCT NOTIFICATION

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:$("#product-notf-count").data('href'),
                    success:function(data){
                        $("#product-notf-count").html(data);
                      }
              });
    }, 5000);
});

$(document).on('click','#notf_product',function(){
  $("#product-notf-count").html('0');
  $('#product-notf-show').load($("#product-notf-show").data('href'));
});

$(document).on('click','#product-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#product-notf-clear').data('href'));
});

// PRODUCT NOTIFICATION ENDS

// CONVERSATION NOTIFICATION

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:$("#conv-notf-count").data('href'),
                    success:function(data){
                        $("#conv-notf-count").html(data);
                      }
              });
    }, 5000);
});

$(document).on('click','#notf_conv',function(){
  $("#conv-notf-count").html('0');
  $('#conv-notf-show').load($("#conv-notf-show").data('href'));
});

$(document).on('click','#conv-notf-clear',function(){
  $(this).parent().parent().trigger('click');
  $.get($('#conv-notf-clear').data('href'));
});

// CONVERSATION NOTIFICATION ENDS


// SEND MESSAGE SECTION
$(document).on('click','.send',function(){
  $('.eml-val').val($(this).data('email'));
});

          $(document).on("submit", "#emailreply1" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var to = $(this).find('input[name=to]').val();
          $('#eml1').prop('disabled', true);
          $('#subj1').prop('disabled', true);
          $('#msg1').prop('disabled', true);
          $('#emlsub1').prop('disabled', true);
            $.ajax({
            type: 'post',
            url: mainurl+'/admin/user/send/message',
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'to'   : to
                  },
                 success: function( data) {
                  $('#eml1').prop('disabled', false);
                  $('#subj1').prop('disabled', false);
                  $('#msg1').prop('disabled', false);
                  $('#subj1').val('');
                  $('#msg1').val('');
                  $('#emlsub1').prop('disabled', false);
                  if(data == 0)
                    $.notify("Oops Something Goes Wrong !!","error");
                  else
                    $.notify("Message Sent !!","success");
                  $('.close').click();
            }
        });
          return false;
        });

// SEND MESSAGE SECTION ENDS



// SEND EMAIL SECTION

          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var to = $(this).find('input[name=to]').val();
          $('#eml').prop('disabled', true);
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: mainurl+'/admin/order/email',
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'to'   : to
                  },
            success: function( data) {
          $('#eml').prop('disabled', false);
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        if(data == 0)
        $.notify("Oops Something Goes Wrong !!","error");
        else
        $.notify("Email Sent !!","success");
        $('.close').click();
            }

        });
          return false;
        });
// SEND EMAIL SECTION ENDS

// ORDER TRACKING STARTS

$(document).on('click','.track-edit',function(){
$('#track-title').focus();
var title = $(this).parent().parent().parent().find('.t-title').text();
var text = $(this).parent().parent().parent().find('.t-text').text();

$('#track-title').val(title);
$('#track-details').val(text);

$('#track-btn').text($('#edit-text').val());
$('#trackform').prop('action',$(this).data('href'));
$('#cancel-btn').removeClass('d-none');

});


$(document).on('click','#cancel-btn',function(){

$(this).addClass('d-none');
$('#track-btn').text($('#add-text').val());
$('#track-title').val('');
$('#track-details').val('');
$('#trackform').prop('action',$('#track-store').val());
});


$(document).on('click','.track-delete',function(){
        $(this).parent().parent().parent().remove();
        $.get($(this).data('href'), function(data, status){
            $('#trackform .alert-success').show();
            $('#trackform .alert-success p').html(data);
  });

});



// ORDER TRACKING ENDS

$(document).on('click','.godropdown .go-dropdown-toggle', function(){
  $('.godropdown .action-list').hide();
  var $this = $(this);
  $this.next('.action-list').toggle();
});


$(document).on('click', function(e)
{
    var container = $(".godropdown");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
      container.find('.action-list').hide();
    }
});



// **************************************  AJAX REQUESTS SECTION ENDS *****************************************


})(jQuery);
