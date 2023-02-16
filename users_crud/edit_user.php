<?php
include('db.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $name = $row['NOMBRE'];
        $age = $row['EDAD'];
        $gender = $row['SEXO'];
        $rolid = $row['ROLID'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $rolid = $_POST['rolid'];

    $query = "UPDATE usuarios set NOMBRE = '$name', EDAD = '$age', SEXO = '$gender', ROLID = '$rolid' WHERE ID = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'User Updated Successfully';
    $_SESSION['message_type'] = 'info';
    header('Location: index.php');
}

include 'includes/header.php';

?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">

            <div class="card card-body">
                <form action="edit_user.php?id=<?php echo $_GET['ID']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Update Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" value="<?php echo $age; ?>" class="form-control" placeholder="Update Age">
                    </div>
                    <div class="form-group">
                        <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control" placeholder="Update Gender">
                    </div>
                    <div class="form-group">
                        <input type="text" name="rolid" value="<?php echo $rolid; ?>" class="form-control" placeholder="Update Rol ID">
                    </div>
                  
                    <button class="btn btn-success mt-2" style="width:100%" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>