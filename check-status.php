<!DOCTYPE html>
<?php
    // echo "Hello";
    $source = $_GET['source'];
    $destination = $_GET['destination'];
    $bname = $_GET['bname'];

?>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS_file/check-status.css">
    <title>Bus Adda / Check Status</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php

    require 'db.php';
    echo '
    <div class="top-header"><h1>Hi</h1></div>
    <img src="layered-peaks-haikei (4).svg" class="picture">
    <div class="outer-layer">';
     echo '<div class="base-div">
        <div style="font-size: 150%;
                font-weight: 500;
                display: flex;
                align-items: center;
                margin-bottom: 5px;">
                <img src="jpg_files/bus-input.jpg" class="logo-bus">
                '.ucfirst($bname).'</div>
        <div style="font-size: 125%;
                font-weight: 300;
                font-style: italic;
                margin-left: 1.5%;">'.ucfirst($source). '&ensp; &#8594; &ensp; '.ucfirst($destination).'</div>
    </div>'; 
    echo '
    <div class="stopage-element">
        <div class="architect">
            <div class="minar-first">.</div>
            <div class="circle">.</div>
            <div class="minar">.</div>
        </div>
        <div class="stopage-info">
            <img src="jpg_files/bus-stop.jpg" class="logo-stop">
            <div class="stopage-name">
                '.ucfirst($source).'
            </div>
        </div>
    </div>';

    
$query = "SELECT * FROM `bus` WHERE bname = '$bname'";
$result = mysqli_query($conn,$query);
$fsource = false;

if($result)
{
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result))
         {
            // $bname = $row['bname'];
            $bstopage = $row['bstoppage'];
            // $bfrquency = $row['bfrequency'];
             $stoppage=explode(" ",$bstopage);
             foreach ($stoppage as $sto) {
                
                if ($destination == $sto) {
                    $fsource = false;
                }
             

             if($fsource == true){

                             echo '
                              <div class="stopage-element">
                                  <div class="architect">
                                      <div class="minar">.</div>
                                      <div class="circle">.</div>
                                      <div class="minar">.</div>
                                  </div>
                                  <div class="stopage-info">
                                      <img src="jpg_files/bus-stop.jpg" class="logo-stop">
                                      <div class="stopage-name">
                                          '.$sto.' 1
                                         <div class="stopage-no">Stopage No. 1</div>
                                      </div>
                                 </div>
                             </div>
                                  ';}

                    if ($source == $sto) {
                        $fsource = true;
                    }
             }
                }
            }
        }
        echo '<div class="stopage-element" style="padding-bottom : 20px";>
                <div class="architect">
                <div class="minar">.</div>
                <div class="circle">.</div>
                 <div class="minar">.</div>
             </div>
            <div class="stopage-info">
                <img src="jpg_files/bus-stop.jpg" class="logo-stop">
                <div class="stopage-name">
                '.ucfirst($destination).'
                </div>
            </div>
    </div>
    </div> </div>';?>
</body>
</html>