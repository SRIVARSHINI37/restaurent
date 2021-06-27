<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

           

            <?php 
                // create sql query to display categories from database
                $sql = "SELECT * FROM tbl_category WHERE active='yes'";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    // categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values 
                        $id= $row['id'];
                        $title=$row['title'];
                        $image_name = $row['image_name'];
                        ?>
                         <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            

                          
                            
                        <?php  
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not Found.</div>";
                        }
                        else
                        {
                             ?>
                            <img src="<?php echo SITEURL; ?>admin/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve" style="width: 300px; height:300px;">
                            <?php
                       }
               ?>
                  <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                      </a>
                                                

                   


            <?php
                    }

                }
                else
                {
                    //categories not available
                    echo "<div class='error'>Category not Found.</div>";
                }
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>