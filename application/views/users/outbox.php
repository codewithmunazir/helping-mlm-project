<?php  include('uheader.php');?>
<div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark"><?php echo  $tag;?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="https://aidigitalassets.global">Home</a></li>
                            <li class="breadcrumb-item active">Request History</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid" style="margin-top: -35px;">
                            <div class="row">
                            <!-- Primary table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="single-table">
                                            <div class="table-responsive">
                                               <!-- fund history -->

                                                        <table class="table text-center auto-index" id="example">
                                                            <thead class="text-capitalize">
                                                              
                                                      <tr>    
                                                              <th>Sr No</th>                               
                                                              <th>Date-Time</th>
                                                              <th>Send To</th>
                                                              <th>Subject</th>
                                                              <th>Message</th>
                                                              <th>Action</th>
                                               
                                                      </tr>
                                                </thead>
                                              <tbody>
                                                <?php foreach($outbox as $outmail){
                                            $head_ing=$outmail['description'];
                                            $short_heading= substr($head_ing, 0, 15);
                                            ?>
                                        
                                        <tr><a href="#">
                                            <td></td>     
                                            <td><?php echo $outmail['create_date'];?></td>
                                            <td><?php echo $outmail['mail_to'];?></td>
                                            <td><?php echo $outmail['subject']; ?></td>
                                             <td><?php echo  $short_heading;?>  ... <a href="<?php echo base_url();?>mail/<?php echo $outmail['chat_key'];?>">Show</a></td>
                                             <td>
                                                    <div class="d-flex">
                                                
                                        
                                                        <a href="<?php echo base_url()?>delemail/<?php echo $outmail['chat_key'];?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    </div>                                              
                                                </td>
                                        </a>
                                        </tr><?php } ?>    
                                    </tbody>
                                                        </table>
                                                        <br><br>
                                                        <center>
                                                            <div>
                                                                
                                                            </div>
                                                        </center>

                                                        <!-- fund history -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Primary table end -->
                        </div>
                      </div>
                    </section>
                
            </div>
        <!-- main content area end -->
    
<!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="">GoldenChance</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer> -->

  </div>
<!-- ./wrapper -->
<?php include('ufooter.php');?>