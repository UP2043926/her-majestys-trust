<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    //  checking input for negative values
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values cannot be transferred!!! Please Try Again!!!")';  
        echo '</script>';
    }


  
    // checking for insufficient balance
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Funds!!! Please Try Again!!!")';  
        echo '</script>';
    }
    


    // checking for zero value
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Invalid Amount!!! Please Try Again!!!')";
         echo "</script>";
     }


    else {
        
                // deducting from sender
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding to reciever
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transactionHistory(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful!!!');
                                     window.location='paymentHistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

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
                    <h2> <a href="index.php" style = "color: black;">Her Majesty's Trust</a> <h2>          
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
            
        </div>
    </div>

    <!----------body---------->

	<div class="container" style = "margin-bottom: 200px;">
    <div class="col-1-1">
            <h1>Payment</h1>
        </div>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table>
                <tr>
                    <th class="text-center" style="text-align: center;" >Account No.</th>
                    <th class="text-center" style="text-align: center;" >Account Name</th>
                    <th class="text-center" style="text-align: center;" >E-mail</th>
                    <th class="text-center" style="text-align: center;" >Account Balance(£)</th>
                </tr>
                <tr>
                    <td class="py-2" style="text-align: center;"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2" style="text-align: right;"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label><b>Transfer To:</b></label>
        <select name="to" style = " width: 100%; padding: 12px 0;"class="form-control" required>
            <option value="" disabled selected>Select User</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label><b>Enter Amount:</b></label>
            <input type="number" class="formControl" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn mt-3" style= "padding:20px 20px;" name="submit" type="submit" id="myBtn" >Transfer Money</button>
            </div>
            <div></div>
        </form>
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
</html>