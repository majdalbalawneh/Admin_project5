<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="table.css">
    <style>
        .prod{
            width:100%;
        }
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
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 style="text-align:center">Product Details</h2>
                        <!-- <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a> -->
                    </div>
                    <?php

                    // Include config file
                    include_once '../Configration/connection.php';
                  
                    // Attempt select query execution
                    $sql = "SELECT * FROM products;";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<div class="table-responsive"> ';
                            echo '<table class="table table-secondary table-bordered">';                                echo "<thead>";
                                    echo "<tr>";
                                    echo '<table  class="rwd-table">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th style='text-align:center'>Product ID </th>";
                                            echo "<th style='text-align:center'>Product Name</th>";
                                            echo "<th style='text-align:center'>Description</th>";
                                            echo "<th style='text-align:center'>Price</th>";
                                            echo "<th style='text-align:center'>Status</th>";
                                            echo "<th style='text-align:center'>Category</th>";

                                            echo "<th style='text-align:center'>Img</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){

                                    echo "<tr>";
                                        echo "<td  >" . $row['product_id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['category_id'] . "</td>";
                                        echo "<td><img style='width:200px' src=". $row['img'] ."></td>";



                                        // echo "<td>";
                                        //     echo '<a href="update.php?product_id='. $row['product_id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        //     echo '<a href="delete.php?product_id='. $row['product_id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    }else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>