<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Matt's PHP CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Contacts:</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Contact</a>
                    </div>
                    <?php
                    // DB Info File
                    require_once "dbinfo.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM contact_info";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){

                            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                            $(document).ready(function(){
                              $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });
                            </script>

                            <script>
                            function sortTable() {
                                var table, rows, switching, i, x, y, shouldSwitch;
                                table = document.getElementById("myTable");
                                switching = true;
                                /*Make a loop that will continue until
                                no switching has been done:*/
                                while (switching) {
                                  //start by saying: no switching is done:
                                  switching = false;
                                  rows = table.rows;
                                  /*Loop through all table rows (except the
                                  first, which contains table headers):*/
                                  for (i = 1; i < (rows.length - 1); i++) {
                                    //start by saying there should be no switching:
                                    shouldSwitch = false;
                                    /*Get the two elements you want to compare,
                                    one from current row and one from the next:*/
                                    x = rows[i].getElementsByTagName("TD")[0];
                                    y = rows[i + 1].getElementsByTagName("TD")[0];
                                    //check if the two rows should switch place:
                                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                      //if so, mark as a switch and break the loop:
                                      shouldSwitch = true;
                                      break;
                                    }
                                  }
                                  if (shouldSwitch) {
                                    /*If a switch has been marked, make the switch
                                    and mark that a switch has been done:*/
                                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                    switching = true;
                                  }
                                }
                              }
                              </script>

                            <style>
                            table {
                              font-family: arial, sans-serif;
                              border-collapse: collapse;
                              width: 100%;
                            }
                            
                            td, th {
                              border: 1px solid #dddddd;
                              text-align: left;
                              padding: 8px;
                            }
                            
                            tr:nth-child(even) {
                              background-color: #dddddd;
                            }
                            </style>

                            <style>
                            * {
                                box-sizing: border-box;
                              }
                              
                              #myInput {
                                background-image: url("/css/searchicon.png");
                                background-position: 10px 10px;
                                background-repeat: no-repeat;
                                width: 100%;
                                font-size: 16px;
                                padding: 12px 20px 12px 40px;
                                border: 1px solid #ddd;
                                margin-bottom: 12px;
                              }
                              
                              #myTable {
                                border-collapse: collapse;
                                width: 100%;
                                border: 1px solid #ddd;
                                font-size: 18px;
                              }
                              
                              #myTable th, #myTable td {
                                text-align: left;
                                padding: 12px;
                              }
                              
                              #myTable tr {
                                border-bottom: 1px solid #ddd;
                              }
                            </style>
                            ';

                            echo '<p><button class="btn btn-primary" onclick="sortTable()">Sort</button></p>
                            <input id="myInput" type="text" placeholder="Search..">
                            <table class="table table-bordered table-striped" id="myTable">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Image</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Email Address</th>";
                                        echo "<th>Phone Number</th>";
                                        echo "<th>#</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td class='firstName'>" . $row['fName'] . "</td>";
                                        //Add Image Functionality Later
                                        echo "<td>" . $row['image'] . "</td>";
                                        echo "<td>" . $row['lName'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);

                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }

                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
</body>
</html>