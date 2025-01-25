
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


       
        <div class="container add-form">
          
          <?php
             
              if(!empty($program)){

          ?>
            <form action="<?= base_url('/update-subjectstore/'.$subject['id'])?>" method="Post">
              <div class="header">
                <div>
                  <h2>Update Subject</h2>
                </div>
                <div class="submit-btn">
                  <button class="submit" type="submit">
                    Update
                  </button>
                </div>
              </div>
      
              <!-- {/* PERSONAL DETAILS */} -->
              <fieldset>
                <legend>Subject Details</legend>
                <div class="form-container">
                  <div class="row">
                   

                    <div>
                      <label For="sub_name">Subject Name</label>
      
                      <input
                        class="form-inputs"
                        type="text"
                        name="sub_name"
                        id="sub_name"
                        placeholder="Enter Name"
                        value="<?=$subject['sub_name']?>"
                      />
                    </div>
                   
                
                    <div>
                        <label For="program_id">Program</label>
                
                        <select name="program_id" id="" class="dropdown" style="width: fit-content;">
                         
                        <?php
                            foreach ($program as $row) {
                              if($row['id']==$subject['program_id']){
                                echo "<option selected value=".$row['id'].">".$row['program_name']."</option>";
                           
                              } 
                              else{
                                echo "<option value=".$row['id'].">".$row['program_name']."</option>";
                           
                              }
                            
                             } ?>
                        </select>
                      </div>

                      <div>
                        <label For="semester_id">Semester</label>
        
                        <select name="semester_id" id="" class="dropdown">
                        <?php
                            foreach ($semester as $row) {
                              if($row['id']==$subject['semester_id']){
                                echo "<option selected value=".$row['id'].">".$row['semester']."</option>";
                            
                              } 
                              else{
                                echo "<option value=".$row['id'].">".$row['semester']."</option>";
                           
                              }
                            
                             } ?>
                        </select>
                       
                      </div>
                     
                   
                </div>

                <?php
                        if(isset($validation)){?>
                         <div class="row" style="color: crimson;">
                            <?=$validation->listErrors();?>
                        </div><?php
                        }
                        if(isset($validationdup)){?>
                          <div class="row" style="color: crimson;">
                             <?=$validationdup;?>
                         </div><?php
                         }
                    ?>
              </fieldset>
              
            </form>
            <?php }else{
              ?>
              
                 <div class="row" style="color: crimson;">
                           <h1>Please Add Programs</h1>
                  </div>
                        
              <?php } ?>
          </div>
          
       

    </div>
	     
    

</body>
</html>