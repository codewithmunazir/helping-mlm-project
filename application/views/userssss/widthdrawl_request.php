<?php include('uheader.php');?>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">
<div class="row">
                  <div class="col-lg-6 col-sm-12 grid-margin stretch-card m-auto">
                    <div class="row" id="showpaneloo" style="display:none;">
                            <div class="col-xl-12 col-sm-12"> <span class="text-primary"><span id="nameincome"></span> </span>
                            </div>
                             <div class="col-xl-6 col-sm-12 mb-1">
                              <div class="card">
                                <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Credit</h4>
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                    <!--<span><small class="text-primary">76</small> left from target</span>-->
                                    <h4 class="mb-0 fs-32 font-w800">$ <span id="creditmy"></span><?php  //echo getfunds($userDetai->user_id);?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 mb-1">
                              <div class="card">
                                <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Debit</h4>
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                    <!--<span><small class="text-primary">76</small> left from target</span>-->
                                    <h4 class="mb-0 fs-32 font-w800">$ <span id="debitmy"></span><?php  //echo getfunds($userDetai->user_id);?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 mb-1">
                              <div class="card">
                                                  <div class="card-body px-4">
                                  <h4 class="fs-18 font-w600 mb-5 text-nowrap">Balance</h4>
                                  
                                  <div class="d-flex align-items-end mt-1 justify-content-between">
                                    <!--<span><small class="text-primary">76</small> left from target</span>-->
                                    <h4 class="mb-0 fs-32 font-w800" >$<span id="balancemy"></span> <?php  //echo getfunds($userDetai->user_id);?></h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-lg-6 col-sm-12 grid-margin stretch-card m-auto">
                <div class="card">
                  <div class="crad-header mt-2 m-auto">
                      <?php if($msg=$this->session->flashdata('msg_invalidw')) {
                      $msg_class=$this->session->flashdata('msg_class');?>
                      <div class="input-group mb-3 alert <?php echo $msg_class;?>">
                      <?= $msg; ?>
                      </div>
                      <?php } if($smsg=$this->session->flashdata('msg_successw')) {
                      $smsg_class=$this->session->flashdata('msg_class');?>
                      <div class="input-group mb-3 alert <?php echo $smsg_class;?>">
                      <?= $smsg; ?>
                      </div>
                      <?php } ?>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample" action="<?php echo base_url();?>withdrawal-request"  method="POST">
                       <?php echo form_error('select_wallete_val'); ?>
        <div class="form-gorup mb-3">
            <label class="mb-1" for="wtype"><strong>Select Wallete</strong></label>
                              <select class="default-select form-control wide mb-3" onchange="incomewallate()" id="incomeuvalue"name="select_wallete_val" >
                                                                  <option value="">Select Wallet</option>
                                            <option value="Non-Working-wallete ax_tbl_nonworking <?php echo getfunds_non_working($userDetai->user_id).' '.  getfunds_debit_non_working($userDetai->user_id).' '.getfunds_credit_non_working($userDetai->user_id);?>">My Income Wallet </option>
                                                                 <!--  <option value="Working-wallete direct_wallet <?php //echo getfunds_working($userDetai->user_id).' '.  getfunds_debit_working($userDetai->user_id).' '.getfunds_credit_working($userDetai->user_id);?>">Working Wallet</option> -->
                                                                  
                                          </select>
                              </div>
        
                          <div class="form-group mb-3" >
                                    <label class="mb-1" for="wtype"><strong>Fund Transfer To</strong></label>
                                    <?php echo form_error('widthrawal_type'); ?>
                                    <select class="default-select  form-control wide" name="widthrawal_type" id="wtype" onchange="widtype()">
                                                                    <option value="">--Select--</option>
                                                                    <option value="Widthrawal">Widthrawal</option>
                                                                    <option value="Activation">Self Activation</option>
                                                                </select>
                                    </div>
                                    <div class="form-group mb-3" id="currency_ty" style="display:none;">
                                            <!--<input class="form-control",type="text", id="wamount", name="wamount", placeholder="Enter amount">-->
                                    </div>
                                    <div class="form-group mb-3">
                                       <label class="mb-1" for="amount"><strong>Select Amount</strong></label> 
                                        <?php echo form_error('mywidrowamt'); ?>
                                       <select class="default-select form-control wide mb-3" name="mywidrowamt">
                                        <option value="0">--Select Amount--</option>
                                        <option value="5">$5</option>
                                        <option value="10">$10</option>
                                        <option value="20">$20</option>
                                        <option value="40">$40</option>
                                        <option value="80">$80</option>
                                        <option value="160">$160</option>
                                        <option value="320">$320</option>
                                        <option value="640">$640</option>
                                        <option value="1280">$1280</option>
                                        <option value="2560">$2560</option>
                                        <option value="5120">$5120</option>
                                        <option value="10240">$10240</option>
                                       </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="mb-1" for="withdrawmtnxpass"><strong>Transaction Password</strong></label>
                                        <?php echo form_error('mtnxpass'); ?>
                                       
                                         <div class="input-group">
                                               <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'withdrawmtnxpass', 'name'=>'mtnxpass','placeholder'=>'Enter transaction Password']);?> 
                                                <span class="input-group-text" onclick="togglePassword('withdrawmtnxpass', this)"  style="cursor: pointer;">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                               
                                            </div>
                                    </div>
                                </div>
                                <div class="crad-footer mb-3 p-2">
                                    <input type="submit" value="Request" class="btn btn-primary">
                                </div>
                      </form>
                      <script>
        function incomewallate()
{
    //alert('data');
    let sentence=$('#incomeuvalue').val();
   // alert(sentence);                 
 if (sentence == null || sentence == "") {
    $('#showpaneloo').hide();
    //$('#amounfield').hide();
           }
  else{
  let words = sentence.split(" ");

// Store each word in separate variables
 let incomedetlss1 = words[0];
 let incomedetlss2 = words[1];
 let incomedetlss3 = words[2];
 let incomedetlss4 = words[3];
 let incomedetlss5 = words[4];
// let incomedetlss6 = words[5];


 $('#showpaneloo').show();
 $('#amounfield').show();
 $('#debitmy').html(incomedetlss4);
 $('#creditmy').html(incomedetlss5);
 $('#balancemy').html(incomedetlss3);

 $('#nameincome').html('<span>'+incomedetlss1+'</span>');
}

 
    

   }
   function widtype()
   {
    let wtypeval=$('#wtype').val();
    if (wtypeval === "Widthrawal") {
     // alert(wtypeval);
    $('#currency_ty').show();
    $('#currency_ty').html('<label class="mb-1" for="curenc_t"><strong>Select Currency</strong></label> <select class="default-select form-control wide mb-3" name="mycuren_type" Required><option value="">--Select Currency--</option><option value="INR">INR</option><option value="USDT">USDT</option></select>');
    //$('#amounfield').hide();
           }
           else{
            $('#currency_ty').hide();
           }
    //alert(wtypeval);
   }

</script>
    
    </div>


</div>
<!-- End Container Fluid -->

       <?php include('ufooter.php');?>