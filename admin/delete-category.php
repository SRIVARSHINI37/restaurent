<?php 
    include('config/constant.php');
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id= $_GET['id'];
        $image_name= $_GET['image_name'];

        //remove the physical image file
        if($image_name != "")
        {
            $path = "category/".$image_name;
            $remove = unlink($path);

            if($remove==true)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to remove image</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }

        //delete data from databse 
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        //execute query
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Category deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to delete Category.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>