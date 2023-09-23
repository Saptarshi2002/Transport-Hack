<!DOCTYPE html>

<?php

    require 'db.php';

    $fsource=false;
    $fdestination=false;

    
    //   header('Location: /Transport-Hack/check-Bus.html');

    // $source = $_POST['source'];
    // $destination = $_POST['destination'];
    
    // echo $source;
    
     if (isset($_GET['source']) && isset($_GET['destination'])) {
        $source = $_GET['source'];
        $destination = $_GET['destination'];

        // Now $source and $destination contain the values from the URL parameters
        // echo "Source: " . $source . "<br>";
        // echo "Destination: " . $destination . "<br>";

        // You can use these variables for further processing

        $query = "SELECT * FROM `bus`";
        $result = mysqli_query($conn,$query);
    
        if($result)
        {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result))
                 {
                    $bname = $row['bname'];
                    $bstopage = $row['bstoppage'];
                     $stoppage=explode(" ",$bstopage);
                     foreach ($stoppage as $sto) {
                        if ($source == $sto) {
                            $fsource=true;
                        }
                        if ($destination == $sto) {
                            $fdestination=true;
                        }
                     }
                    
                }
            } 
        }
    }
  

    if($fsource == true && $fdestination == true)
    {
        echo "Bus Found";
    }
    else{
        echo "Bus not found";
    }

?>
<html lang="en">

    <title>Bus Adda / Check Buses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS_file/check-bus.css">
</head>
<body>
    <img class="background-image" src="layered-peaks-haikei (4).svg" alt="Background Image">
    <div class="base">
   <?php
    echo '
    <div class="header-div">
        <p class="source-name">'.ucfirst($source) .'</p>
        <span class="source-name">&LongRightArrow;</span>
        <p class="source-name">' . ucfirst($destination) .' </p>
    </div>';
    ?>
    
    <?php

$query = "SELECT * FROM `bus`";
$result = mysqli_query($conn,$query);

if($result)
{
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result))
         {
            $bname = $row['bname'];
            $bstopage = $row['bstoppage'];
            $bfrquency = $row['bfrequency'];
             $stoppage=explode(" ",$bstopage);
             foreach ($stoppage as $sto) {
                if ($source == $sto) {
                    $fsource=true;
                }
                if ($destination == $sto) {
                    $fdestination=true;
                }
             }
             if($fsource == true && $fdestination == true){
                     echo '
                      <div class="bus-details">
                          <a href="check-status.html?bname='.$bname.'&source='.$source.'&destination='.$destination.'"><button class="button-div">
                              <div>
                                   <div class="name-source">
                                      <span class="bus-name">'. $bname .'</span> 
                                      <span class="frequency">Frequency : '. $bfrquency .'<!--high/            average--></span>
                                    </div>  
                               </div>
                              <div class="source-destination">
                                   '.ucfirst($source) .' &LongRightArrow; '. ucfirst           ($destination) . '
                                   </div>
                           </button></a>
                        </div>';}
                    }
                } 
            }
        
    ?>


    <div style="color: transparent;">.</div>
    </div>
</body>
</html>