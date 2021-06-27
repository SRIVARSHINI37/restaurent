<?php include('partials/menu.php'); ?>

<div class="main-content">

    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php 
            //1.get id of admin
            $id = $_GET['id'];

            //2.create sql query
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //execute query
            $res=mysqli_query($conn, $sql);

            //checking query
            if($res==TRUE)
            {
                $count= mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                    <input type="text" name="full_name" value="<?php echo $full_name ?>">
                    </td>

                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            
            </table>
        </form>
    </div>

</div>

<?php 
    //check whether submit button is clicked 
    if(isset($_POST['submit']))
    {
        //get all values from form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //cretae sql query
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";
        //execute the query
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to update Updated .</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>