
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
        
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	
    
<?php include APPPATH . 'Views/navbar.php';?>

    <div class="main-wrapper">
       
        <?php include APPPATH . 'Views/header.php';?>

          <div class="card">
            <div class="header">
              <div class="heading">
                <h2>Faculties</h2>
              </div>
              <div class="add-btn">
                <a href="/add-faculty" class="add-p">
                  Add New
                </a>
              </div>
            </div>
	     
            <div class="table-wrapper data-table">
              <table>
                <thead>
            
                  <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Username</th>  
                    <th>Password</th>  
                    <th>Coordinator</th>     
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                	
                  
                      <?php
                            foreach ($faculty as $row) {
                                echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['password']."</td>";

                                if($row['coordinator']==true){
                                    echo "<td style='color: rgb(33, 125, 33);'>Yes</td>";
                                }
                                else{
                                    echo "<td style='color: crimson;'>No</td>";
                                }

                            
                        ?>

                                <td><a href="<?= base_url('update-faculty/'.$row['id'])?>" class="material-icons">edit</a>
                                <a href="<?= base_url('delete-faculty/'.$row['id'])?>" class="material-icons">delete</a></td>

                            </tr>

                    <?php
                    }
                  ?>


			
                      
                </tbody>
              </table>
            </div>
           
          </div>

           
        </div>
	     
    </div>

</body>
</html>