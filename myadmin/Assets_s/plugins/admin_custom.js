
        $(document).ready(function() {
            $('#trrade_roi').on('click', function() {
                $.ajax({
                    url: main_base_Urll+'home/roi_generate',
                    type: 'POST', // You can also use 'GET' if that's more appropriate
                    success: function() {
                        // Optionally, handle success
                        alert('Action executed trade roi successfully!');
                    },
                    error: function() {
                        alert('An error occurred while executing the action.');
                    }
                });
            });
        });
        
// $(document).ready(function() {
//             $('#Level_roi').on('click', function() {
//                 $.ajax({
//                     url: main_base_Urll+'home/getdailylevelincom',
//                     type: 'POST', // You can also use 'GET' if that's more appropriate
//                     success: function() {
//                         // Optionally, handle success
//                         alert('Action executed  Level income genrate successfully!');
//                     },
//                     error: function() {
//                         alert('An error occurred while executing the action.');
//                     }
//                 });
//             });
//         });
// $(document).ready(function() {
//             $('#Level_booster').on('click', function() {
//                 $.ajax({
//                     url: main_base_Urll+'home/get_booster_task_income',
//                     type: 'POST', // You can also use 'GET' if that's more appropriate
//                     success: function() {
//                         // Optionally, handle success
//                         alert('Action executed  Booster successfully!');
//                     },
//                     error: function() {
//                         alert('An error occurred while executing the action.');
//                     }
//                 });
//             });
//         });
$(document).ready(function() {
            $('#sallry_booster').on('click', function() {
                $.ajax({
                    url: main_base_Urll+'home/rewaerd_create',
                    type: 'POST', // You can also use 'GET' if that's more appropriate
                    success: function() {
                        // Optionally, handle success
                        alert('Action executed reward successfully!');
                    },
                    error: function() {
                        alert('An error occurred while executing the action.');
                    }
                });
            });
        });

$('#showhide_img').submit(function(e){
  e.preventDefault(); 
       $.ajax({
           url: base_Url+'Admin/updteadds_img',
           type:"post",
           data:new FormData(this),
           processData:false,
           contentType:false,
           cache:false,
           async:false,
     success: function(res)
                  { 
                    //alert(res);
                      window.location.reload(); 
      
      },
                    
          error: function()
          {
           alert("errorv issue ");
          } 
       });
       e.preventDefault(); 
  });
$('#usdt_form').submit(function(e){
  e.preventDefault(); 
       $.ajax({
           url: base_Url+'Admin/usdt_Qr',
           type:"post",
           data:new FormData(this),
           processData:false,
           contentType:false,
           cache:false,
           async:false,
     success: function(res)
                  { 
                  //  alert(res);
                    
         //alert(res.name);
          const obj = JSON.parse(res);
          if(obj.imag_error)
          {
            if(obj.img_error != '')
                                  {
                                  $('#img_error').html(obj.img_error);
                                  }
                              else
                                  {
                                  $('#img_error').html('');
                                  }
          }
          else if(obj.success)  {
                    
                $('#img_error').html(''); 
                $('$mssuccess').html(obj.success_fully);
                window.location.reload();
          }
          
      },
                    
          error: function()
          {
           alert("errorv issue ");
          } 
       });
       e.preventDefault(); 
  });
$('#inr_Qr').submit(function(e){
  e.preventDefault(); 
       $.ajax({
           url: base_Url+'Admin/inrQr',
           type:"post",
           data:new FormData(this),
           processData:false,
           contentType:false,
           cache:false,
           async:false,
     success: function(res)
                  { 
                  //  alert(res);
                    
         //alert(res.name);
          const obj = JSON.parse(res);
          if(obj.imag_error)
          {
            if(obj.imgg_error != '')
                                  {
                                  $('#imgg_error').html(obj.imgg_error);
                                  }
                              else
                                  {
                                  $('#imgg_error').html('');
                                  }
          }
          else if(obj.success)  {
                    
                $('#imgg_error').html(''); 
                $('$msgsuccess').html(obj.success_fully);
                  window.location.reload();
          }
          
      },
                    
          error: function()
          {
           alert("errorv issue ");
          } 
       });
       e.preventDefault(); 
  });
$('#update_bank').submit(function(e){
    e.preventDefault(); 
         $.ajax({
             url: base_Url+'admin/update_profi_bank',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
       success: function(res)
                    { 
                      //alert(res);
         //alert(res.name);
           
            const obj = JSON.parse(res);
            if(obj.error)
                        {
                            if(obj.bank_name_error != '')
                                    {
                                       $('#bank_name_error').html(obj.bank_name_error);
                                    }
                                  else
                                    {
                                    $('#bank_name_error').html('');
                                     }
                            if(obj.acc_holder_name_error != '')
                                    {
                                    $('#acc_holder_name_error').html(obj.acc_holder_name_error);
                                    }
                                  else
                                    {
                                    $('#acc_holder_name_error').html('');
                                    }
                            if(obj.acc_no_error != '')
                                    {
                                    $('#acc_no_error').html(obj.acc_no_error);
                                    }
                                else
                                    {
                                    $('#acc_no_error').html('');
                                    }
                              if(obj.confirm_acc_no_error != '')
                                    {
                                    $('#confirm_acc_no_error').html(obj.confirm_acc_no_error);
                                    }
                                else
                                    {
                                    $('#confirm_acc_no_error').html('');
                                    }
                              if(obj.ifsc_error != '')
                                    {
                                    $('#ifsc_error').html(obj.ifsc_error);
                                    }
                                else
                                    {
                                    $('#ifsc_error').html('');
                                    }
                              if(obj.msg_error != '')
                                    {
                                  $('#update_bank_msg').html(obj.msg_error)
                                    }
                                else
                                    {
                                    $('#update_bank_msg').html('');
                                    }
                                    
         
                           // alert('error in validation');

                        }
          
            else if(obj.success){            
                            $('#bank_name_error').html('');
                            $('#acc_holder_name_error').html('');
                            $('#acc_no_error').html('');
                            $('#confirm_acc_no_error').html(''); 
                             $('#ifsc_error').html(''); 
                            $('#update_bank_msg').html(obj.success_fully);
                            //  alert();
                    //$('#createForm')[0].reset();
                 
            //$("#mytable") .DataTable().ajax.reload();
            }

            
        },
                      
            error: function()
            {
             alert("Ajax issue update profile bank form load ");
            } 
         });
     e.preventDefault();
    });
$('#update_profile').submit(function(e){
    e.preventDefault(); 
         $.ajax({
             url:  base_Url+'Admin/update_profilrform',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
       success: function(res)
                    { 
                     // alert(res);
          //alert(res.name);
           
            const obj = JSON.parse(res);
            if(obj.error)
                        {
                            if(obj.fullname_error != '')
                                    {
                                       $('#full_error').html(obj.fullname_error);
                                    }
                                  else
                                    {
                                    $('#fullname_error').html('');
                                     }
                            if(obj.mobile_error != '')
                                    {
                                    $('#mobile_error').html(obj.mobile_error);
                                    }
                                  else
                                    {
                                    $('#mobile_error').html('');
                                    }
                            if(obj.email_error != '')
                                    {
                                    $('#email_error').html(obj.email_error);
                                    }
                                else
                                    {
                                    $('#email_error').html('');
                                    }
                              if(obj.password_error != '')
                                    {
                                    $('#password_error').html(obj.password_error);
                                    }
                                else
                                    {
                                    $('#password_error').html('');
                                    }
         
                           // alert('error in validation');

                        }
          
            else if(obj.success){            
                            $('#fullname_error').html('');
                            $('#mobile_error').html('');
                            $('#email_error').html('');
                            $('#password_error').html(''); 
                            $('#success_msg').html(obj.success_fully)
                            //  alert();
                    //$('#createForm')[0].reset();
                 
            //$("#mytable") .DataTable().ajax.reload();
            }

            
        },
                      
            error: function()
            {
             alert("Ajax issue form load ");
            } 
         });
     e.preventDefault();
    });
    function funcdrequestAction(id)
    {
      var action_request=id;
      $('#fundrequest_id').val(action_request);
     $('#actionfund_rquest').modal('show'); 
    }
      function percent_Action(id)
                    {
                         var delurl = base_Url+'Admin/get_royalti_details';
                        var id =id;
                         $.ajax({
                            url: delurl,
                            data: {id: id},
                            cache: false,
                            dataType: 'html',
                            type: "POST",
                            success: function(data)
                            {
                                const oobbj = JSON.parse(data);
      var idd=(oobbj.id);
     
      var rankname=(oobbj.rank);
       const percent_roy=(oobbj.perce_nt);
        //alert(percent_roy)
     $('#percent_id').val(id);
     $('#royatiper').val(percent_roy);
     $('#royaltiname').html('<span class="text-success">'+oobbj.rank+'</span>');
      $('#percent_royal').modal('show');
                            },
                              error: function (jqXHR, textStatus, errorThrown)
                              {
                              alert('ajaxError get data for  user block unblock ajax');
                              }

                              });

                    } 

// function stopGrowth(id) {
//      var delurl = base_Url+'Admin/update_comiite_groth';
//    var id =id;
//    $.ajax({
//     url: delurl,
//     data: {id: id},
//     cache: false,
//     dataType: 'html',
//     type: "POST",
//     success: function(data)
//     {
//         alert(data);
//     }
//     error: function (jqXHR, textStatus, errorThrown)
//       {
//       alert('ajaxError get data for  user block unblock ajax');
//       }

//       });   
//     alert(id); // This will alert the passed commit_id value, like "Request_6881"
// }

function withdrawalAction(id)
{ 

  //var delurl = "https://masterbottrade.com/myadmin/Admin/getbank_details_requesrt_user";
   var delurl = base_Url+'Admin/getwidthrequet_detilsd';
   var id =id;
   $.ajax({
    url: delurl,
    data: {id: id},
    cache: false,
    dataType: 'html',
    type: "POST",
    success: function(data)
    {
      const obj = JSON.parse(data);
      var reg=(obj.registeruser_id);
      var amouttypet=(obj.eth_add);
      const reqamout=(obj.request_amt);
      const inramt=(obj.inr_amtt);
      const deduc_inramt=(obj.inr_deduct_amout);
      const deduc_dolor=(obj.Doular_deduct_amont);  
      var reqamtinr=inramt-deduc_inramt;
      var reqamtdolar=reqamout-deduc_dolor;
      
    var  dpelurl = base_Url+'Admin/getbank_details_requesrt_user';
      $.ajax({
        url: dpelurl,
        data: {id: id},
        cache: false,
        dataType: 'html',
        type: "POST",
        success: function(res)
        {
          const objj = JSON.parse(res);
         if(amouttypet==="INR")
          {
            $('#bankname').html('<span class="text-success">Bank Name :<span class="text-dark">'+objj.bank_name+'</span></span>');
          $('#Holder_acc').html('<span class="text-success">Account Holder name :<span class="text-dark">'+objj.acc_holder_name+'</span></span>');
          $('#Account_no').html('<span class="text-success">Account No. :<span class="text-dark">'+objj.acc_no+'</span></span>');
          $('#ifsc_no').html('<span class="text-success">IFSC :<span class="text-dark">'+objj.ifsc+'</span></span>');
          $('#usdt_no').html('');
          $('#reqamtinr').html('<label><b>Net Amount </b></label><b><span class="text-primary p-2" >₹'+reqamtinr+'</span></b>');
          } 
          else if(amouttypet==="USDT")
          {
            $('#usdt_no').html('<span class="text-success">USDT :<span class="text-dark">'+objj.usdt_add+'</span></span>');
            $('#bankname').html('');
            $('#Holder_acc').html('');
            $('#Account_no').html('');
            $('#ifsc_no').html('');
            $('#reqamtinr').html('<label><b>Net Amount </b></label><b><span class="text-primary p-2" >$'+reqamtdolar+'</span></b>');
          }
          var withdrawId=id;
    $('#withdwal_id').val(withdrawId);
    $('#amountty').html(amouttypet);
    $('#reqamt').html('$'+reqamout);
    
   $('#actionwithdrawal').modal('show');
           
          
          





           // if(obj.error)
           // alert(res);
         // alert(obj.bank_name);
         //    
         //alert(data);
       //  
         //   window.location.reload();            
    
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data for  user block unblock ajax');
      }

      });            

 },
  error: function (jqXHR, textStatus, errorThrown)
  {
  alert('ajaxError get data for  user block unblock ajax');
  }

  });
 /* */
   
//alert(id);
}
function block_unblok(user_id)
{
  //alert(user_id);
  var delurl = base_Url+'Admin/block_unblock';
  var id =user_id;
  $.ajax({
        url: delurl,
        data: {id: id},
        cache: false,
        dataType: 'html',
        type: "POST",
        success: function(data)
        {
         // alert(data);
            window.location.reload();            
    
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data for  user block unblock ajax');
      }

      });

}
$(function () {
  $("#MyReffTable").DataTable({
    "responsive": true,
    "autoWidth": false,
  });
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
function getsponserdId()
{
var delurl = base_Url+'Admin/getspornserd';
var us_val = $("#userid").val();
//alert(us_val);
$.ajax({
        url: delurl,
        data: {id: us_val},
                cache: false,
        dataType: 'html',
        type: "POST",
        success: function(data)
        {
                   // alert(data);
          if(data==0)
        {
            $("#alertmsg").html('<span class="text-danger">User ID Not Available</span>');
            $("#userid").val('');
            $("#usname").val('');
    

        }
        if(data != 0)
        {
            $("#alertmsg").html('<span class="text-success">'+data+'</span>');
          
          $("#userid").val(us_val);
          $("#usname").val(data);
          
        }
        
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data from ajax');
      }

      });
      
}
  $(document).ready(function(){ 

      $(".old_htoggle_pwd").click(function() 
      {
            
              $('.old_htoggle_pwd').hide();
              $('.old_stoggle_pwd').show();
              $('.old_password').attr('type', 'text');
          
          });
      $(".old_stoggle_pwd").click(function() 
      {
  
          $(".old_htoggle_pwd").show();
              $(".old_stoggle_pwd").hide();
              $('.old_password').attr('type', 'password');
  
          });
  
      $(".htoggle_pwd").click(function() 
      {
            
              $('.htoggle_pwd').hide();
              $('.stoggle_pwd').show();
              $('.password').attr('type', 'text');
          
          });
      $(".stoggle_pwd").click(function() 
      {
  
          $(".htoggle_pwd").show();
              $(".stoggle_pwd").hide();
              $('.password').attr('type', 'password');
  
          });
     $(".htoggle_repwd").click(function() 
      {
            
              $('.htoggle_repwd').hide();
              $('.stoggle_repwd').show();
              $('.repassword').attr('type', 'text');
          
          });
      $(".stoggle_repwd").click(function() 
      {
  
          $(".htoggle_repwd").show();
              $(".stoggle_repwd").hide();
              $('.repassword').attr('type', 'password');
  
          });
  });

