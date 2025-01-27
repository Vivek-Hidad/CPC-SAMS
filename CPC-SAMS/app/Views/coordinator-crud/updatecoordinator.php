
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
        
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	
    
  <?php include APPPATH . 'Views/navbar.php';?>

    <div class="main-wrapper">
        
        <?php include APPPATH . 'Views/header.php';?>

       
        <div class="container add-form">
          
          <?php
             
              if(!empty($program)||!empty($coordinator_program)){

          ?>
            <form action="<?= base_url('/update-coordinatorstore/'.$coordinator['id'])?>"  method="Post">
              <div class="header">
                <div>
                  <h2>Update Coordinator</h2>
                </div>
                <div class="submit-btn">
                  <button class="submit" type="submit">
                    Update
                  </button>
                </div>
              </div>
      
              <!-- {/* PERSONAL DETAILS */} -->
              <fieldset>
                <legend>Faculty Details</legend>
                <div class="form-container">
                  <div class="row" style="justify-content: start;gap:100px;">
                   

                    <div>
                        <label For="faculty_id">Faculty</label>
        
                        <select name="faculty_id" id="" class="dropdown" style="width: fit-content;">
                        <?php
                            foreach ($faculty as $row) {
                                  
                                if($row['id']==$coordinator['faculty_id']){
                                    echo "<option selected value=".$row['id'].">".$row['name']."  </option>";
                                  
                                  } 
                                  else{
                                    echo "<option value=".$row['id'].">".$row['name']."  </option>";
                                  
                                  }
                                    
                             } ?>
                        </select>
                    </div>
                   
                
                    <div>
                        <label For="program_id">Program</label>
        
                        <select name="program_id" id="pro_id" class="dropdown p_change" style="width: fit-content;">
                            <option value="<?=$coordinator_program['id'] ?>"><?=$coordinator_program['program_name']?></option>
                        <?php
                            foreach ($program as $row) {
                             
                                echo "<option  value=".$row['id'].">".$row['program_name']."</option>";
                            
                      
                           
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
                    ?>
                   
              </fieldset>
              
            </form>
            <?php }else{
              ?>
              
                 <div class="row" style="color: crimson;">
                           <h1>Faculties Or Programs not available</h1>
                  </div>
                        
              <?php } ?>
          </div>
          
       


    </div>
	     
   
</body>
</html>