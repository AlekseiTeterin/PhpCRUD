<?php
session_start();
require 'dbcon.php';
?>
<?php include('includes/header.php')?>
    <div class="container mt-5">

        <?php include('message.php'); ?>    

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Edit
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

                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?= $user['id']?>">
                                        <div class="mb-3">
                                            <label>User Name</label>
                                            <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>User Email</label>
                                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>User Phone</label>
                                            <input type="text" name="phone" value="<?= $user['phone']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>User City</label>
                                            <input type="text" name="city" value="<?= $user['city']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                        </div>
                                    </form>

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