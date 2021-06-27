<?php 
    include('config/constant.php');
    // 1.get the id of admin
    $id= $_GET['id'];

    //2. create sql query
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the queery
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Admin deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. redirect to manage admin page 

?>