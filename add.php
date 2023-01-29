
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"/>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">





        <nav>
 
          <h3><a href="">Health Database</a></h3>
 
 
          <ul>
             <li><a href="index.html">Home</a></li>
             <li><a href="">Contact</a></li>
             <li><a href="add.html">Add To Database</a></li>
          </ul>
 
 
        </nav>



        <form action="add.php" method="post">
           
            <input type="text" placeholder="Enter first name" name="firstname" id="firstname"/>
            <input type="text" placeholder="Enter last name" name="lastname" id="lastname"/>
            <input type="text" placeholder="Enter phone number" name="phonenumber" id="phonenumber"/>
           

            <button type="submit" name="submit">Add To Database</button>
            




        </form>


        <?php


             require 'databasehandler.php';


             

             if(isset($_POST['submit'])){


                 if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phonenumber'])){

                      $firstname = $_POST['firstname'];
                      $lastname = $_POST['lastname'];
                      $phonenumber = $_POST['phonenumber'];


                      $sql = "INSERT INTO patient (firstname, lastname, phonenumber) VALUES ('$firstname', '$lastname', '$phonenumber')";
                      if($connection->query($sql)){


                          echo "<script type='text/javascript'> alert('Data has been successfully added')</script>";
                          $connection->close();
                      } else{

                        echo 'Error Error Error' . $connection->error;
                      }

                 }
             }
             









             


        ?>


    </div>

</body>
</html>


