<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Microservice Example</title>
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
    <div class="wrapper">
        <div class="container-fluid">
        <div className="my-4">
          <h1 align="center"><span className="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Microservice</span> Example</h1>
          <p  align="center">Learn more at https://github.com/titocbd/microservice-react-nestjs-at-gcp/</p>
        </div>		
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">User Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
                    <?php
                    // Include base url file 
                    require_once "url.php";
                     
                    $api_url = $base_url .'/users'; 
                    $data = file_get_contents($api_url); 
                    $users = json_decode($data);
                    //print_r($users); 
                        if(count($users) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $id = 1;
                                foreach($users as $user){
                                    echo "<tr>";
                                        echo "<td>" . $id . "</td>";
                                        echo "<td>" . $user->first_name . "</td>";
                                        echo "<td>" . $user->last_name . "</td>"; 
                                        echo "<td>" . $user->address . "</td>"; 
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $user->id .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $user->id .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $user->id .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                 $id++;
                                }
                                echo "</tbody>";                            
                            echo "</table>"; 
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        } 
                     
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
