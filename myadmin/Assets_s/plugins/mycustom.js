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

function getplanvalue()
{
var selvalue=$("#topup_sel").val();
var wallate=$("#activefundcheckf").val();
if(parseFloat(selvalue) <= parseFloat(wallate))
{

  $("#selalertmsg").html('');
 $("#topup_sel").val(selvalue);
 
}
else{
  
 $("#selalertmsg").html('<span class="text-danger">Please Enter sufficient Amount</span>');
  $("#topup_sel").val(' ');
 
}

//alert(selvalue);
}
  function check_mainAmount()
  {
    var mainamunt = $("#main_amount").val();
    var mainval =$("#mainfundcheck").val();
   if(mainamunt<=mainval)
   {
    
    $("#main_amount_alertmsg").html('');
    $("#main_amount").val(amutnt);
   }
   else{
    
    $("#main_amount_alertmsg").html('<span class="text-danger">Please Enter sufficient Amount</span>');
  $("#main_amount").val('');
   }
  }
  function checkamountfromwallet()
  {
    //var delurl = "http://localhost/ownzo/User/getspornserd";
var amutnt = $("#amout").val();
var wallateamt=$("#activefundcheck").val();
if(amutnt<=wallateamt)
{
  $("#amountalertmsg").html('');
  $("#amout").val(amutnt);
}
else{
  $("#amountalertmsg").html('<span class="text-danger">Please Enter sufficient Amount</span>');
  $("#amout").val('');
}
//alert(wallateamt);
  }
  function getsponserdId()
{
var delurl = "http://localhost/demor/User/getspornserd";
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
    

        }
        if(data != 0)
        {
            $("#alertmsg").html('<span class="text-success">'+data+'</span>');
          
          $("#userid").val(us_val);
          
        }
        
     },
      error: function (jqXHR, textStatus, errorThrown)
      {
      alert('ajaxError get data from ajax');
      }

      });
      
}
function myReferral() {
    // Get the text field
    var copyText = document.getElementById("reff_Id");
  
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
  
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    
    // Alert the copied text
    //alert("Copied the text: " + copyText.value);
  }
  
  $(document).ready( function () {
    $('#Mytable').DataTable();
    $('#table_id').DataTable();
    $('#table_topup').DataTable();
    $('#table_roi').DataTable();
    $('#table_mainwallete').DataTable();
    $('#table_levelincome').DataTable();
    $('#table_mywitdrawal_history').DataTable();
    


    
    
   
    });
 
  

  $(document).ready(function(){
    $('#old_passwordform').submit(function(e){
      e.preventDefault();
      
      var form = $(this);
      var actionUrl = "http://localhost/demor/User/check_pass";
      var passwd = $('#chnpwd').val();
      var current_user_id=$('#current_user_Id').val();
      jQuery.ajax({
        type: "POST",
        url: actionUrl,
        dataType: 'html',
        data: {passwd: passwd, id:current_user_id},
        success: function(data) 
        {   
         // alert(data)
         if(data==1)
         {
          $('#old_passwordform').hide();
          $('#show_enable_password').show();
          

         }if(data==0){
          $("#old_passwordform").trigger('reset');    
          $("#wrongpass").html('Worng entry<b>Try again !</b>');
      
         }
        //location.reload(true);
        },
        error:function()
        {
        alert('data not error find');   
        }
        });
        

    });
    $("#butsave").click(function() 
          {
         // var id = $('#id').val();
          var password = $('#password').val();
          var repassword = $('#repassword').val();
          var idd=$('#current_user_Idd').val();
          var targeturll="http://localhost/demor/User/update_pass";
          if(password==repassword)
          {
              jQuery.ajax({
              type: "POST",
              url: targeturll,
              dataType: 'html',
              data: {id: idd, password:password },
              success: function(res) 
              {
                if(res==1)
                {
                  alert('your password change successfully');
                  location.reload(true);
                }
              },
              error:function()
              {
              alert('data not error find');   
              }
              });
             
          }
          else{
            $("#updtepassform").trigger('reset');    
            $("#mismatch").html('Password or Re-password <b> mismatch!</b>');
          }
         
            });
// transection password 
$('#txnform').submit(function(e){
  e.preventDefault();
  
  var form = $(this);
  var actionUrl = "http://localhost/demor/User/check_txnpass";
  var txnpasswd = $('#chnTnxpwd').val();
  var currentxn_user_id=$('#currentnx_user_Id').val();
  jQuery.ajax({
    type: "POST",
    url: actionUrl,
    dataType: 'html',
    data: {txnpass: txnpasswd, id:currentxn_user_id},
    success: function(data) 
    {   
     if(data==1)
     {
      
      $('#txnform').hide();
      $('#show_enable_txnpassword').show();
      

     }if(data==0){
    
      $("#txnform").trigger('reset');    
      $("#wrongtxnpass").html('Worng entry<b>Try again !</b>');
  
     }
    
    //location.reload(true);
    },
    error:function()
    {
    alert('ajax not working in txn form');   
    }
    });
    

    

});

$("#butsavetxn").click(function() 
          {
         // var id = $('#id').val();
          var txnpassword = $('#txnpassword').val();
          var txnrepassword = $('#txnrepassword').val();
          var txnid=$('#current_user_idtxn').val();
          var targeturltxn="http://localhost/demor/User/update_txnpass";
        
          if(txnpassword==txnrepassword)
          {
            
            
              jQuery.ajax({
              type: "POST",
              url: targeturltxn,
              dataType: 'html',
              data: {id: txnid, txnpassword:txnpassword },
              success: function(res) 
              {
                
                if(res==1)
                {
                  alert('your password change successfully');
                  location.reload(true);
                }
                if(res==0)
                {
                  alert('Sorryn not change !');
                }
                  
             },
              error:function()
              {
              alert('transaction form ajax not working');   
              }
              });
             
          }
          else{
            
            $("#updtetxnpassform").trigger('reset');    
            $("#mitxnsmatch").html('Password or Re-password <b> mismatch!</b>');
          }
         
            });
    
    });
    $(document).ready(function(){ 

      $("#old_htoggle_pwd").click(function() 
      {
            
              $('#old_htoggle_pwd').hide();
              $('#old_stoggle_pwd').show();
              $('#old_password').attr('type', 'text');
          
          });
      $("#old_stoggle_pwd").click(function() 
      {
  
          $("#old_htoggle_pwd").show();
              $("#old_stoggle_pwd").hide();
              $('#old_password').attr('type', 'password');
  
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
  
   