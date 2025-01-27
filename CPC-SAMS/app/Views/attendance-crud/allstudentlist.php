
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

        <?php
             
             if(!empty($student)){

         ?>

        <form action="<?= base_url()?>" method="Post">
            
            <div class="header" style="margin-bottom: 30px;display: flex;flex-direction: column;justify-content: start;align-items: start;">
              <div class="heading">
                <h2>Attendance</h2>
              </div>

             <div style="width:100%; display: flex;flex-direction: row;justify-content: space-between;align-items: center;">
              <div>
                <input type="date" id="" name="" class="form-inputs">
               
              </div>
              
            


              <div class="add-btn">
                <button type="reset" class="submit" style="margin-right: 20px;">
                  Clear
                </button>
               <button type="submit" class="submit">
                  Submit
                </button>
              </div>
             </div>
            </div>
            <div class="table-wrapper data-table">
              <table>
                <thead>
            
                  <tr>
                    <th>Enrollment No</th>
                    <th>Name</th>
                  
                    <th>Present/Absent</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  
              
                    <?php
                                foreach ($student as $row) {
                                    echo "<tr>";
                                    echo "<td>".$row['enroll_no']."</td>";
                                    echo "<td>".$row['stud_name']."</td>";
                            
                                
                                    ?>

                                    <td> <input class="ch-box" type="checkbox" name="coordinator" value="true" id=""></td>

                                </tr>

                        <?php
                        }
                    ?>

                  
              
      
                      
                </tbody>
              </table>
            </div>
            </div>

             </form>
            <?php
            
             }else{
                ?>

                <div class="row" style="color: crimson;">
                           <h1>No students Found</h1>
                  </div>
                <?php
             }
            ?>
	     
    </div>

</body>
</html>