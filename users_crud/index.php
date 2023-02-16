<?php include('db.php'); ?>

<?php include('includes/header.php'); ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>


            <?php session_unset();
            } ?>


            <div class="card card-body">
                <form action="save_user.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="NOMBRE" class="form-control" placeholder="User Name" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="EDAD" class="form-control mt-2" placeholder="User Age" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="SEXO" class="form-control mt-2" placeholder="Gender" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ROLID" class="form-control mt-2" placeholder="Rol ID" autofocus>
                    </div>
                    <input type="submit" style="width:100%" class="btn btn-success btn-default btn-block mt-2" name="save_user" value="Save User">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Rol ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM usuarios";
                    $result_users = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_users)) { ?>
                        <tr>
                            <td> <?php echo $row['NOMBRE'] ?> </td>
                            <td> <?php echo $row['EDAD'] ?> </td>
                            <td> <?php echo $row['SEXO'] ?> </td>
                            <td> <?php echo $row['ROLID'] ?> </td>
                            <td class="d-flex justify-content-around">
                                <!-- style="text-decoration: none;" -->
                                <a class="btn btn-secondary" href="edit_user.php?ID=<?php echo $row['ID'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <!-- style=" text-decoration: none;" -->
                                <a class="btn btn-danger" href="delete_user.php?ID=<?php echo $row['ID'] ?>">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>


                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php include('includes/footer.php'); ?>