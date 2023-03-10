<?php
session_start();
include('includes/header.php'); 
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
            <?php 
              if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                echo '<h2 class = "bg-danger text-white"> '.$_SESSION['status'].'</h2>';
                unset($_SESSION['status']);
              }
            
            ?>
             </div>
             
             <div class="form-container">

                <form class="user" action="code.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" required placeholder="Enter your Username">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" required placeholder="Enter your Password">
                    </div>
            
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                    <p>Don't have an account? <a href="index.php">Register now</a></p>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>