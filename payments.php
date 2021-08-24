<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content = "width=device-width, initial-scale=1.0">
    <link rel="icon" type="jpeg" href="Pictures/crown.jpeg">
    <title>Her Majesty's Trust</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <div class="container">

            <!----------Navigation Bar---------->
            
            <div class="navbar">
                <div class="logo">
                <h2 id = "logo1"> <a href="index.php" style = "color: black;" >Her Majesty's Trust</a> <h2>         
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Payments</a></li>    
                        <li><a href="paymentHistory.php">Payment History</a></li>    
                        <li><a href="https://www.thesparksfoundationsingapore.org/" target="_blank">About Us</a></li>        
                    </ul>
                </nav>
               <img src="Pictures/menu.png" class="menu-icon" 
               onclick="menutoggle()">
            </div>
            
        </div>
    </div>


    <!-------body------->

    <div class="container">
        <div class="col-1-1">
            <h1>Customer Database</h1>
        </div>
        
       <br>
       <div class="table-responsive-sm" style = "padding-bottom: 200px;">
    <table style = "border: white;">
        <thead>
            <tr>
                <th class="text-center" style="text-align: center;" >Account no.</th>
                <th class="text-center" style="text-align: center;" >Account Holder Name</th>
                <th class="text-center" style="text-align: center;" >E-mail</th>
                <th class="text-center"style="text-align: center;" >Account Balance(£)</th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from users";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2" style="text-align: center;"><?php echo $rows['id']; ?></td>
            <td class="py-2"><?php echo $rows['name']; ?></td>
            <td class="py-2"><?php echo $rows['email']; ?></td>
            <td class="py-2"style="text-align: right;"><?php echo $rows['balance']; ?> </td>
            <td style="text-align: center; border: white;"> <a href="paymentDetails.php?id= <?php echo $rows['id'] ;?>" class="btntable">Transfer money</a></td>
    
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>


         
     <!----------footer---------->

     <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3><a id = "joinus" href="https://www.thesparksfoundationsingapore.org/join-us/events-volunteer/" target="_blank">Join Us</a></h3>
                        <p> Join the cause. Become a Volunteer. Help save lives. <br> Raise Awareness And Help Individuals Affected By Covid-19 </p> 
                    </div>
                    <div class="footer-col-2">
                        <h1> Her Majesty's Trust </h1>
                        <p>Your Trusted Bank </p> 
                    </div>
                    <div class="footer-col-3">
                        <ul>
                            <li><h3>Useful Links</h3></li>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Join Affiliate</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">  
                        <ul>
                            <li><h3>Follow us</h3></li>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>Youtube</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="copyright">Copyright 2021 - Her Majesty's Trust</p>
            </div>
        </div>

        <!-----------js for toggle menu-->

    <script>
        var menuItems   = document.getElementById("menuItems");


        menuItems.style.maxHeight = "0px";

        function menutoggle(){

            if (menuItems.style.maxHeight == "0px")
            {
            menuItems.style.maxHeight = "200px";
            }
            else
            {
            menuItems.style.maxHeight = "0px";
            }
        }

    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

</body>