
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
            <form action="<?= base_url('/update-programstore/'.$program['id'])?>" method="Post">
              <div class="header">
                <div>
                  <h2>Update Program</h2>
                </div>
                <div class="submit-btn">
                  <button class="submit" type="submit">
                    Update
                  </button>
                </div>
              </div>
      
              <!-- {/* PERSONAL DETAILS */} -->
              <fieldset>
                <legend>Program Details</legend>
                <div class="form-container">
                  <div class="row">
                    <div>
                       
                      <label for="productname">Program Name</label>
      
                      <input
                        class="form-inputs"
                        type="text"
                        name="program_name"
                        id="program_name"
                        placeholder="Enter Program Name"
                        value="<?=$program['program_name']?>"
                      />
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
           
          </div>
        
           
        </div>
	     
    </div>

</body>
</html>