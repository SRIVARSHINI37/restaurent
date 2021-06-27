<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php 
        if(isset($_SESSION['add']))
        {
                echo $_SESSION['add'];//display message
                unset($_SESSION['add']);//remove message
        }
        if(isset($_SESSION['upload']))
        {
                echo $_SESSION['upload'];//display message
                unset($_SESSION['upload']);//remove message
        }
        
        ?>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                    <input type="text" name="title" placeholder="Category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                <td>Featured:</td>
                    <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                
                <tr>
                <td>Active:</td>
                    <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        

    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php 
        
        if(isset($_POST['submit']))
    {
        // button clicked
        //get data from form
        $title = $_POST['title'];
        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        // print_r($_FILES['image']);
        // die();
        if(isset($_FILES['image']['name']))
        {
            //upload image
            $image_name = $_FILES['image']['name'];
            //upload image only if image is selecte
            if($image_name != "")
            {
            
            //auto rename image
            //get the extension like(jpg,png,)
            $ext = end(explode('.', $image_name));
            $image_name = "Food_Category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "category/".$image_name;
            $upload = move_uploaded_file($source_path , $destination_path);
            if($upload==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                header('location:'.SITEURL.'admin/add-category.php');
                die();
            }
        }
            
        }
        else
        {
            // dont upload image
            $image_name = "";
        }
    

        //sql query to save the data into database
        $sql = "INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
        ";
        // execute query and save data in database
        
        $res = mysqli_query($conn, $sql); 
        
        // check whether the query us executed or not 
        if($res == true)
        {
            //create session variable
            $_SESSION['add']= "Category  Added Succesfully";
            header("location:".SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['add']= "Failed to add Category";
            header("location:".SITEURL.'admin/add-category.php');
        }
    }
    

?>

