
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
            <form action="/facultystore" method="Post">
              <div class="header">
                <div>
                  <h2>Add Faculty</h2>
                </div>
                <div class="submit-btn">
                  <button class="submit" type="submit">
                    Add
                  </button>
                </div>
              </div>
      
              <!-- {/* PERSONAL DETAILS */} -->
              <fieldset>
                <legend>Faculty Details</legend>
                <div class="form-container">
                  <div class="row">
                    <div>
                      <label For="name">Faculty Name</label>
      
                      <input
                        class="form-inputs"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Enter Name"
                     
                      />
                    </div>
                   
                    <div>
                        <label For="username">Username</label>
        
                        <input
                          class="form-inputs"
                          type="text"
                          name="username"
                          id="username"
                          placeholder="Enter Username"
                       
                        />
                      </div>

                      <div>
                        <label For="password">Password</label>
        
                        <input
                          class="form-inputs"
                          type="password"
                          name="password"
                          id="password"
                         placeholder="Enter Password"
                        />
                      </div>
                     
                      <div style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                        
                        <label For="coordinator">Coordinator</label>
        
        
                        <input class="ch-box" type="checkbox" name="coordinator" value="true" id="">
                       
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
           
          </div>       

    </div>
	     
    

</body>
</html>