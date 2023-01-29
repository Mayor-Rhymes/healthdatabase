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
            <li><a href="add.php">Add To Database</a></li>
         </ul>


       </nav>


       <div class="searcher">

          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
             <input type="text" placeholder="Search Database" class="searchbox" name="searchbox"/>
             <button class="searchbutton" name="submit" type="submit">Search</button>
          </form>

       </div>
      
       

       <?php
       
       
          require 'databasehandler.php';


          if(isset($_GET['submit'])){

             if(isset($_GET['searchbox'])){


                  $searchbox = $_GET['searchbox'];

                  $sql = "SELECT * FROM patient where firstname = '$searchbox' || lastname = '$searchbox'" ;

                 $result = $connection->query($sql);

                 
                 if($result->num_rows > 0){

                    echo "<table style='width:100%; border:2px solid black; border-collapse:collapse; margin-top: 40px;'>";

                    echo "<tr>
                          
                           <th style='padding: 20px; border-right: 2px solid black;'>id</th>
                           <th style='padding: 20px; border-right: 2px solid black;'>Firstname</th>
                           <th style='padding: 20px; border-right: 2px solid black;'>Lastname</th>
                           <th style='padding: 20px; border-right: 2px solid black;'>Phonenumber</th>
                    
                      </tr>";

                    while ($row = $result->fetch_assoc()){


                       echo "<tr style='text-align: center; padding: 20px; border: 2px solid black; '>". "<td style='padding: 10px; border-right: 1px solid black;'>".$row['id']."</td>" . "<td style='padding: 10px; border-right: 1px solid black;'>".$row['firstname']."</td>" . "<td style='padding: 10px; border-right: 1px solid black;'>".$row['lastname']."</td>" . "<td style='padding: 10px; border-right: 1px solid black;'>" . $row['phonenumber'] . "</td>". "</tr>";
                    }
                    echo "</table>";
                 } else {


                  echo "<p>". "0 results" . "</p>";
                 }

                  
             }

          }

          

          
       
       
       ?>



        


    </div>

</body>
</html>