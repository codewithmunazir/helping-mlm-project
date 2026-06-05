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
                                                                    <th>SN.</th>
                                                                         <th >UserId</th>
                                                                        <th >Full Name</th>
                                                                        <th >Sponsor</th>
                                                                        <th >Deposit Amount</th>
                                                                        <th >Joining Date</th>
                                                                        <th> level</th>
                                                                         
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php 
              usort($data, function($a, $b) {
        // Compare registration dates and times
        return strtotime($b['register_date']) - strtotime($a['register_date']);
    });
  $ii=0;
      $items = [];
      foreach ($data as $row) {
          $items[$row['user_id']] = $row;
          $items[$row['user_id']]['children'] = [];
          }
          function buildSubTree(&$items, $parentId = null) {
          $branch = [];
          foreach ($items as &$item) {
              if ($item['sponserd_id'] == $parentId) {
                  $children = buildSubTree($items, $item['user_id']);
                  if ($children) {
                      $item['children'] = $children;
                  }
                  $branch[] = $item;
              }
          }
          return $branch;
      }  
// To build the entire tree:
$tree = buildSubTree($items);
// To build a specific subtree (e.g., starting from node with id = 2):
$subTree = buildSubTree($items, $userId);
        function printTree($tree, $level = 1) {
           
            //print_r($tree);
              foreach ($tree as $node) {
            $i=1;
           ?>
            <tr>
            <td></td>
            <td><?php echo $node['user_id'];?></td>
            <td><?php echo $node['fullname'];?></td>
            <td><?php echo $node['sponserd_id'];?></td>
          <!--  <td><?php// echo  "diposite date";//$myref['id'];?></td>-->
            <td> $
                 <?php
            $yt=gettopopsum($node['user_id']);
                            if(!empty($yt))
                            {
                                echo $yt;
                            }
                            else{
                                echo "0.00";
                            }

                            ?>
            </td> 
            <td><?php echo $node['register_date'];?></td>
            <td> L-<?php echo $level; ?></td> 
          </tr><?php
    
         // echo $level;
          //echo " ".$node['fullname'];
          //echo "<br>"; 
                  //echo str_repeat("-", $level) . $node['name'] . "\n";
                  if (!empty($node['children'])) {
                      printTree($node['children'], $level + 1);
                  }
    $i++;          }
              
          }
          
          printTree($subTree);
        ?> 
                                                                            
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