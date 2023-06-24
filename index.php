<?php
  session_start();
  require 'dbcon.php';
?>

<?php include('includes/header.php')?>

    <div class="container mt-4">

      <?php include('message.php')?>

      <div class="row">
        <div class="col-md-12">
          <div class="card-header">
            <h4>User Details
              <a href="user-create.php" class="btn btn-primary float-end">Add Users</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM users ";
                  $query_run = mysqli_query($dbconn, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $user)
                    {
                      ?>
                      <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['phone']; ?></td>
                        <td><?= $user['city']; ?></td>
                        <td>
                          <a href="user-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                          <a href="user-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                          <form action="code.php" method="POST" class="d-inline">
                            <button type="submit" name="delete_user" value="<?= $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                          </form>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  else
                  {
                    echo "<h5> No Record Found </h5>";
                  }
                ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php include('includes/footer.php')?>
    

