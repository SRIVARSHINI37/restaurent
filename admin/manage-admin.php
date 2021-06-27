<?php include('partials/menu.php'); ?>

        <!--Main section starts --->
        <div class="main-content">
        <div class="wrapper">
           <h1>Manage Admin</h1>
           <br>
        <?php 
                if(isset($_SESSION['add']))
                {
                        echo $_SESSION['add'];//display message
                        unset($_SESSION['add']);//remove message
                }
                if(isset($_SESSION['delete']))
                {
                        echo $_SESSION['delete'];//display message
                        unset($_SESSION['delete']);//remove message
                }
                if(isset($_SESSION['update']))
                {
                        echo $_SESSION['update'];//display message
                        unset($_SESSION['update']);//remove message
                }
                if(isset($_SESSION['user-not-found']))
                {
                        echo $_SESSION['user-not-found'];//display message
                        unset($_SESSION['user-not-found']);//remove message
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                        echo $_SESSION['pwd-not-match'];//display message
                        unset($_SESSION['pwd-not-match']);//remove message
                }
                if(isset($_SESSION['change-pwd']))
                {
                        echo $_SESSION['change-pwd'];//display message
                        unset($_SESSION['change-pwd']);//remove message
                }
        ?>
        <br><br><br>

           <a href="add-admin.php" class="btn-primary">Add Admin</a>
           <br><br>
           <table style=" width: 100%;">
                <tr>
                        <th>S.no</th>
                        <th>FullName</th>
                        <th>UserName</th>
                        <th>Actions</th>
                </tr>

                <?php 
                        // query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //execute the query
                        $res = mysqli_query($conn, $sql);
                        //check the query
                        if($res==TRUE)
                        {
                                $count= mysqli_num_rows($res); 
                                $sn=1;
                                if($count>0)
                                {
                                    while($rows=mysqli_fetch_assoc($res)) 
                                    {
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];

                                        //display values in table
                                        ?>
                                                <tr>
                                                        <td><?php echo $sn++; ?></td>
                                                        <td><?php echo $full_name; ?></td>
                                                        <td><?php echo $username; ?></td>
                                                        <td>
                                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>
                                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete admin</a>
                                                        </td>
                                                </tr>
                                        <?php
                                    }   
                                }

                           
                        }                   


                ?>
                
            </table>
           
        </div>
        </div>
        <!--Main section ends --->

<?php include('partials/footer.php'); ?>