<?php include('uheader.php');?>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

<!-- Start Container Fluid -->
<div class="container-xxl">

     <div class="row justify-content-center">
          <div class="col-lg-6 col-sm-12 m-autonahi">
               
               <h4 class="card-title">My Team</h4>
                <div id="tree"></div>
          </div>
     </div>



<!-- End Container Fluid -->

       <?php include('ufooter.php');?>

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
            fetch(`${ubase_Url}user/get_user_data/${d.data.user_id}`)
                .then(response => response.json())
                .then(userData => {
                    const tooltipContent = `
                        <table class="table table-bordered">
                            <tr><th>Activation:</th><td class="${userData.istopup == 1 ? 'text-success' : 'text-danger'}">${userData.istopup == 1 ? 'Active' : 'Inactive'}</td></tr>
                            <tr><th>Name:</th><td>${userData.fullname || 'N/A'}</td></tr>
                            <tr><th>Sponsor:</th><td>${userData.sponserd_id || 'N/A'}</td></tr>
                            <tr><th>Parent:</th><td>${userData.parent_idd || 'N/A'}</td></tr>
                            <tr><th>Left Team:</th><td>${userData.left_team || 0}</td></tr>
                            <tr><th>Right Team:</th><td>${userData.right_team || 0}</td></tr>
                            <tr><th>Left Business:</th><td>${userData.left_team_business || 0}</td></tr>
                            <tr><th>Right Business:</th><td>${userData.right_team_business || '$0'}</td></tr>
                            <tr><th>Total Business:</th><td>${userData.teambusiness || '$0'}</td></tr>
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
        fetch(`${ubase_Url}/user/subtree/${userId}`)
            .then(response => response.json())
            .then(data => {
                const newData = { name: `User ${userId}`, user_id: userId, children: data };
                const newRoot = d3.hierarchy(newData);
                drawTree(newRoot);
            })
            .catch(error => console.error('Error fetching subtree:', error));
    }
</script>

