<?php  include('uheader.php');?>
<div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark">MY TEAM</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Request History</li>
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>

                   <!-- Main content -->
                    <section class="content">
                                    <div class="row justify-content-center">
                                      <div class="col-lg-6 col-sm-12 m-auto">
                                           
                                         
                                            <div id="tree"></div>
                                            
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
 <?php include('ufooter.php');?> -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Initialize DataTable -->

<!-- //////////////////////////////////////////////////////////////////////////-->
<script>
    const initialData = <?= json_encode(['name' => 'RootUser', 'user_id' => $usid, 'children' => $tree]); ?>;
    const width = 600;
    const height = 500;

    // Create SVG container
    const svg = d3.select("#tree").append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")
        .attr("transform", "translate(0, 40)");

    const treeLayout = d3.tree().size([width - 150, height - 100]);
    let root = d3.hierarchy(initialData);

    // Create tooltip div and hide initially
    const tooltip = d3.select("body").append("div")
        .attr("class", "tooltip")
        .style("opacity", 0);

function drawTree(data) {
    // Clear existing nodes and links
    svg.selectAll(".link").remove();
    svg.selectAll(".node").remove();

    // Generate tree structure
    treeLayout(data);

    svg.selectAll(".link")
        .data(data.links())
        .enter()
        .append("line")
        .classed("link", true)
        .attr("x1", d => d.source.x)
        .attr("y1", d => d.source.y)
        .attr("x2", d => d.target.x)
        .attr("y2", d => d.target.y)
        .style("stroke", "#ccc");

    const node = svg.selectAll(".node")
        .data(data.descendants())
        .enter()
        .append("g")
        .classed("node", true)
        .attr("transform", d => `translate(${d.x}, ${d.y})`);

    // Draw circles with user ID and color based on activation status
    node.append("circle")
        .attr("r", 30)
        // .style("fill", d => d.data.istopup == 1 ? "green" : "white") // Set color based on isActive
        .style("fill", d => {
                if (d.depth == 0) {
                    return "orange";  // Root node color is orange
                }
                
                if (d.data.istopup == 1) {
                    return "green";  // Green for active users
                }
                return "white";  // White for inactive users
            })
        .on("mouseover", function(event, d) {
            // Show tooltip with user details on hover
            fetch(`https://equityplus.club/user/get_user_data/${d.data.user_id}`)
                .then(response => response.json())
                .then(userData => {
                    const tooltipContent = `
                        <table class="table table-bordered">
                            <tr><th>Activation:</th><td class="${userData.istopup == 1 ? 'text-success' : 'text-danger'}">${userData.istopup == 1 ? 'Active' : 'Inactive'}</td></tr>
                            <tr><th>Name:</th><td class="text-white">${userData.fullname || 'N/A'}</td></tr>
                            <tr><th>Sponsor:</th><td class="text-white">${userData.sponserd_id || 'N/A'}</td></tr>
                            <tr><th>Parent:</th><td class="text-white">${userData.parent_idd || 'N/A'}</td></tr>
                            <tr><th>Left Team:</th><td class="text-white">${userData.left_team || 0}</td></tr>
                            <tr><th>Right Team:</th><td>${userData.right_team || 0}</td></tr>
                            <tr><th>Left Business:</th><td class="text-white">${userData.left_team_business || 0}</td></tr>
                            <tr><th>Right Business:</th><td class="text-white">${userData.right_team_business || '$0'}</td></tr>
                            <tr><th>Total Business:</th><td class="text-white">${userData.teambusiness || '$0'}</td></tr>
                            <tr><th>Total BV:</th><td class="text-white">${userData.BV || '0'}</td></tr>
                        </table>
                    `;
                    tooltip.style("display", "block")
                        .style("opacity", 0.9)
                        .html(tooltipContent)
                        .style("left", (event.pageX + 10) + "px")
                        .style("top", (event.pageY - 30) + "px");
                })
                .catch(error => console.error('Error fetching user data:', error));
        })
        .on("mousemove", function(event) {
            tooltip.style("left", (event.pageX + 10) + "px")
                .style("top", (event.pageY - 30) + "px");
        })
        .on("mouseout", function() {
            tooltip.style("display", "none").style("opacity", 0);
        })
        .on("click", function(event, d) {
            loadSubtree(d.data.user_id);
        });

    // Add user ID text inside the circles
    node.append("text")
        .attr("dy", 5)
        .attr("text-anchor", "middle")
        .text(d => d.data.user_id);
}

// Initial drawing of the tree
drawTree(root);

    // Function to load subtree
    function loadSubtree(userId) {
        fetch(`https://equityplus.club/user/subtree/${userId}`)
            .then(response => response.json())
            .then(data => {
                const newData = { name: `User ${userId}`, user_id: userId, children: data };
                const newRoot = d3.hierarchy(newData);
                drawTree(newRoot);
            })
            .catch(error => console.error('Error fetching subtree:', error));
    }
</script>
