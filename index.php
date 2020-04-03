
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Bellota:400,700,700i&display=swap" rel="stylesheet">
    </link>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     
    <title>Hello note</title>
    <!-- Sign up form -->
    
    <!-- Title Note -->
    <style>
        .jumbotron {
            background: none;             /* Transparent background */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<!-- AJAX validate -->
<script type="text/Javascript">

  $(document).ready(function(){
        $("#logInButton").click(function(){
          email = $("#emailLogIn").val();
          console.log("email: "+ email)
          password = $("#passwordLogIn").val();
          console.log("pass: "+password)
    // collect data input
          $.ajax({
              type: "POST",
              url: "pcheck.php",
              data: {emailLogIn: email, passwordLogIn: password},
              success: function(data,status, xhr){
               alert(data);
               
               console.log("type: "+typeof(data));
                console.log("data will be in success():"+data);
                if(data == 'yes'){
                  
                  $("#logInMessage").html("<div class='alert alert-success'> Success Log In</div>");

                  // direct after sign up
                  <?php
                  echo "reach here";
                  header('Location: afterLogIn.php');
                  echo "reach after here";
                  exit();
                  
      
                  ?>
                    
                } else if (data =='no'){
                  $("#logInMessage").html("<div class='alert alert-danger'>User have not signed up yet.Please Sign up ! </div>");

                }else {
                
                  $("#logInMessage").html("<div class='alert alert-danger'> I dont know what the heck happened </div>");

                }
              },
              beforeSend: function(){
                $("#logInMessage").html("loading.....");
              }
          });
          return false;
        });
  })

</script>

</head>

<body>
  
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary narbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"> Oliver Note Online </a>
                
            </div>
            <div>

                <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#logInFormDiv" >
                Log in
            </button>
        </div>
        </div>
    </nav>
    <?php 
        // if(isset($_GET['logOut'])){
        //   if($_GET['logOut']){
        //     echo "<div class='alert alert-success'>
        //     <a class='close' data_dismiss='alert' aria-label='close'></a>
        //     <strong>You have been loged out successfully</strong></div>";
            
          
        //   }
        // }
    
    ?>
     <!-- Title note -->
      <div class="jumbotron bg-cover text-blue" style="font-style: bold ;">
        <div class="container">
        <h1 class="display-4">Online Note</h1>
        <p class="lead">Your Note with you wherever you go</p>
        <hr class="my-4">
        <p>Enjoy your life</p>
        
        <a class="btn btn-warning btn-lg float-center" data-toggle="modal" data-target="#signUpForm" >Sign Up</a> 
        
        </div>
      
      </div>

   
   
   
   
    <!-- Login form -->
      <div id="logInFormDiv" class="modal" >
        <div class="container-fluid">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-xs-center"> Log In Form</h4>
                </div>
                <div class="modal-body">
                <!-- error will be here -->
                    <div id="logInMessage"> 
                    </div>
                    <form id="formLogIn"  >
                    <!-- <form id="formLogIn"  action ="pcheck.php" method="post" > -->
                      
                        <!-- email -->
                        <div class="form-group">
                            <label class="control-label">E-Mail Address</label>
                            <div>
                                <input type="email" class="form-control input-lg" id="emailLogIn" name="emailLogIn" >
                            </div>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div>
                                <input type="password" class="form-control input-lg" id="passwordLogIn" name="passwordLogIn">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input id="remember" type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div>
                                <a class="btn btn-link" data-toggle="modal" data-dismiss="modal" data-target="#forgotPasswordForm" >Forgot Your Password?</a>
                                Don't have an account? <a href="/auth/register">Sign up »</a>
                                
                            </div>
                            
                        </div> -->
                        <div class="modal-footer text-xs-center">
                          <div class="clearfix"></div>
                          <button class="btn btn-danger" type="button" data-dismiss="modal" >Cancel</button>
                          <button type="submit" id="logInButton" class="btn btn-info">Login</button>
          </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
     
     
     
     
     
     
      <!-- Sign Up form  -->
      <div id="signUpForm" class="modal">

        <form class="modal-content" action="signUp.php" method="post">
          <div class="container">
            <div class="modal-header">
              <h1>Sign Up</h1>
              
            </div>
            <p>Please fill in this form to create an account.</p>
            <hr>


            <!-- Email -->
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <br>
              <input id="email" type="text" placeholder="Enter Email" name="email" required>
            </div>
            
            
            <!-- password -->
            <div class="form-group">
              <label for="psw"><b>Password</b></label>
              <br>
              <input id="password" type="password" placeholder="Enter Password" name="password" required>
            </div>
            

            
            <!-- <div class="form-group">
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
            </div> -->
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <div class="modal-footer">
                 <div class="clearfix">
                <button class="btn btn-danger" type="button" data-dismiss="modal" >Cancel</button>
                <button class="btn btn-success" type="submit" class="signupbtn">Sign Up</button>
              </div>

            </div>
            
      
            
          </div>
        </form>
      </div>
    
      <!-- Modal HTML Markup -->




      <!-- forgot password form -->
      <div id="forgotPasswordForm" class="modal" >
        <div class="container-fluid">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-xs-center">Forget your password ??</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="" id="forgotPassword">
                        <input type="hidden" name="_token" value="">
                        <div class="form-group">
                            <label class="control-label">E-Mail Address</label>
                            <div>
                                <input type="email" class="form-control input-lg" name="email" value="">
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer text-xs-center">
                          <div class="clearfix"></div>
                          <button class="btn btn-danger" type="button" data-dismiss="modal" >Cancel</button>
                          <button type="submit" class="btn btn-info" name="forgotPasswordButton">Submit</button>
          </div>
                
                    </form>
                </div>
                
            </div>
        </div>
    </div>









    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

