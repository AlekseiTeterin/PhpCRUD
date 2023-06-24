<?php
require 'dbcon.php';
?>
<?php include('includes/header.php')?>
    <div class="container mt-5">

        <?php include('message.php'); ?>    

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User View Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['id'])){
                                $user_id = mysqli_real_escape_string($dbconn, $_GET['id']);
                                $query = "SELECT * FROM users WHERE id='$user_id' ";
                                $query_run = mysqli_query($dbconn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $user = mysqli_fetch_array($query_run);
                                    ?>
                                        <div class="mb-3">
                                            <label>User Name</label>
                                            <p class="form-control">
                                                <?= $user['name']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>User Email</label>
                                            <p class="form-control">
                                                <?= $user['email']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>User Phone</label>
                                            <p class="form-control">
                                                <?= $user['phone']; ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>User City</label>
                                            <p class="form-control">
                                                <?= $user['city']; ?>
                                            </p>
                                        </div>

                                    <?php
                                            }
                                            else{
                                                echo "<h4>No Such ID Found</h4>";
                                            }
                                        }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php include('includes/footer.php')?>