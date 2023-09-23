<?php


    $server="localhost";
    $password="";
    $username="root";
    $database="businfo";

    $conn = mysqli_connect($server, $username, $password, $database);

    if($conn)
    {
        echo "Connection Successful";
    }

//     $query = "SELECT * FROM `bus`";
//     $result = mysqli_query($conn,$query);

//     if($result)
//     {
//         if (mysqli_num_rows($result) > 0) {
//             while ($row = mysqli_fetch_assoc($result))
//              {
//                 var_dump($row);
//                 var_dump($row['bname']);
//                 $bname = $row['bname'];
//                 $bstopage = $row['bstopage'];
//                  echo $bstopage;
//                  $stoppage=explode(" ",$bstopage);
//                  var_dump($stoppage);
//                  echo "<br>";
//                  foreach ($stoppage as $sto) {
//                     echo $sto;
//                     echo "<br>";
                    
//                  }
                
//             }
//         } 
//     }
// echo "I'm connected";

?>