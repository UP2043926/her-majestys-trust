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
                    <h2> Her Majesty's Trust <h2>          
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="payments.php">Payments</a></li>    
                        <li><a href="paymentHistory.php">Payment History</a></li>    
                        <li><a href="https://www.thesparksfoundationsingapore.org/" target="_blank">About Us</a></li>        
                    </ul>
                </nav>
               <img src="Pictures/menu.png" class="menu-icon" 
               onclick="menutoggle()">
            </div>


            <!----------body---------->
            <div class="row">
                <div class="col-2">
                    <h1>Her Majesty's Trust.<br>Your Trusted Bank.</h1>
                    <p> </p>
                    <a href= "https://www.thesparksfoundationsingapore.org/" target="_blank" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="Pictures/wings.png" >    
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Personal Banking.<br></h1>
                    <p> </p>
                    <a href= "payments.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="Pictures/monkey1.jpeg" >    
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <h1>Disclaimer</h1>
                    <p> This website is the outcome of a intern project, and does not necessarily represent the views of any organisation or any other individuals referenced or acknowledged within the website. Anyone may reproduce, distribute, adapt, translate the content on the website, without explicit permission, provided that the content is accompanied by an acknowledgement that Her Majesty's Trust website is the source and that it is clearly indicated if changes were made to the original content. </p>
                </div>   
            </div>
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

</body>