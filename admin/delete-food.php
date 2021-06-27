<?php

    //include constants page
    include('config/constant.php'); 


    if((isset($_GET['id'])) && isset($_GET['image_name']))
    {
        //process to delete
        
        //1.get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2.remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name != "")
        {
            //it has img and need to remove from folder
            $path = "category/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check is img removed or not
            if($remove==false)
            {
                $_SESSION['upload'] ="<div class='error'>Failed to remove image file.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');

                //stop the procees of deleting food
                die();

            }
        }

        //3. delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";

        //execute the query 
        $res = mysqli_query($conn, $sql);
        //4. Redirect to manage food with Session msg
        if($res==true)
        {
            //food delted
            $_SESSION['delete'] ="<div class='sucess'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

        }
        else{
            // not deleted
            $_SESSION['delete'] ="<div class='error'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }


        
    }
    else
    {
        //redirect to manage page
        $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Acess.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>