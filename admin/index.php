
<?php include('partials/menu.php'); ?>
        <!--Main section starts --->
        <div class="main-content">
        <div class="wrapper">
           <h1>DASHBOARD</h1>
           <br><br>

           <?php
        if(isset($_SESSION['login']))
        {
                echo $_SESSION['login'];//display message
                unset($_SESSION['login']);//remove message
        }
        
        ?>
        <br><br>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
        <!--Main section ends --->

<?php include('partials/footer.php'); ?>