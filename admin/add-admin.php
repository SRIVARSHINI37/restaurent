<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
            
            if(isset($_SESSION['add']))
            {
                    echo $_SESSION['add'];//display message
                    unset($_SESSION['add']);//remove message
            }
        ?>

        <form action="" method="POST">

            <table style="width: 30%;">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Your password"></td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<?php 
    //process the value form and save it for database
    //check whether the submit button is clicked
    if(isset($_POST['submit']))
    {
        // button clicked
        //get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        // execute query and save data in database
        
        $res = mysqli_query($conn, $sql); 
        
        // check whether the query us executed or not 
        if($res==TRUE)
        {
            
            //create session variable
            $_SESSION['add']= "Admin Added Succesfully";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
         {
            echo "not insert";
            $_SESSION['add']= "Failed to add Admin";
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
?>