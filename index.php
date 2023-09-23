<?php
  if($_SERVER['REQUEST_METHOD']=="GET")
  {
    if(isset($_GET['check-input']))
    {
      if (isset($_GET['check-input'])) {
        $source = $_GET['source'];
        $destination = $_GET['destination'];

        // Encode the source and destination parameters
        $encodedSource = urlencode($source);
        $encodedDestination = urlencode($destination);

        // Construct the URL with encoded parameters
        $redirectUrl = "/Transport-Hack/check-Bus.php?source={$encodedSource}&destination={$encodedDestination}";

        // Perform the redirection
        header("Location: " . $redirectUrl);
        exit; // Make sure to exit after redirection
    }
  }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="CSS_file/index.css">
    <title>Bus Adda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@400;700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body
    style="background-color: rgb(256, 256, 256); font-family: roboto, calibri"
  >
    <img class="bg-image" src="layered-waves-haikei (2).svg" />
    <div class="whole-body">
      <div
        style="
          display: flex;
          flex-direction: row;
          justify-content: baseline;
          align-items: center;
        "
      >
        <div
          style="color: white; opacity: 0.8; margin-left: 0.5%; font-size: 80%"
        >
          Home
        </div>
        <div style="color: white; margin-left: 0.5%">/</div>
        <div
          style="font-size: 100%; color: white; opacity: 0.9; margin-left: 0.5%"
        >
          Bus Information
        </div>
      </div>
      <div
        style="
          display: flex;
          flex-direction: row;
          justify-content: center;
          margin-left: 43%;
          margin-top: 1%;
        "
      >
        <p
          style="
            color: rgba(0, 0, 0, 0.708);
            font-family: Roboto, times new roman;
            font-size: 140%;
            font-weight: 700;
            text-shadow: 1px 1px rgba(0, 0, 0, 0.251);
          "
        >
          Check Bus Information
        </p>
      </div>
      <div
        style="
          display: flex;
          flex-direction: column;
          background-color: rgb(233, 233, 233);
          justify-content: baseline;
          align-items: center;
          width: 42%;
          border-radius: 8px;
          border-width: 0px;
          margin-left: 51%;
          margin-top: 0%;
        "
      >
        <div style="display: flex; flex-direction: row; width: 87%">
          <div
            style="
              font-family: roboto, calibri;
              color: black;
              font-weight: 700;
              margin-top: 4%;
            "
          >
            Search by Buses
          </div>
        </div>
        <div style="width: 88%">
          <form action="index.php" method="POST">
            <div>
              <img
                src="jpg_files/bus-png-icon-17.jpg"
                style="
                  width: 2%;
                  background-color: white;
                  position: absolute;
                  margin-left: 0.5%;
                  margin-top: 2%;
                "
              />
              <input
                type="text"
                class="form__input"
                required
                placeholder="Enter Bus No."
              />
            </div>
            <div>
              <a href="check-status.html"
                ><input type="submit" class="check-input" value="Check Status"
              /></a>
            </div>
          </form>
        </div>
      </div>
      <span class="with-line"> or </span>
      <div
        style="
          display: flex;
          flex-direction: column;
          background-color: rgb(238, 238, 238);
          justify-content: baseline;
          align-items: center;
          width: 42%;
          border-radius: 8px;
          border-width: 0px;
          margin-left: 51%;
        "
      >
        <div style="display: flex; flex-direction: row; width: 87%">
          <div
            style="
              font-family: roboto, calibri;
              color: black;
              font-weight: 700;
              margin-top: 4%;
            "
          >
            Search by Buses
          </div>
        </div>
        <div style="width: 88%">
          <form action="index.php" method="GET">
            <div>
              <img
                src="png_files/source.png"
                style="
                  width: 2%;
                  background-color: white;
                  position: absolute;
                  margin-left: 0.5%;
                  margin-top: 2%;
                "
              />
              <input
                type="text"
                class="form__input"
                id="source"
                name="source"
                required
                placeholder="Enter Source"
              />
            </div>
            <div>
              <button
                style="
                  position: absolute;
                  margin-left: 33%;
                  margin-top: -0.4%;
                  border: none;
                  background-color: transparent;
                " id="swapButton" type="button"
              >
                <img class="exchange" src="png_files/exchange train.png" />
              </button>
              <img
                src="png_files/destination.png"
                style="
                  width: 2%;
                  background-color: white;
                  position: absolute;
                  margin-left: 0.5%;
                  margin-top: 2%;
                "
              />
              <input
                type="text"
                class="form__input"
                id="destination"
                name="destination"
                placeholder="Enter destination"
                required
              />
            </div>
            <div>
              <button class="check-input" name="check-input">Check Buses</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      function swapSourceAndDestination() {
        var sourceInput = document.getElementById("source");
        var destinationInput = document.getElementById("destination");
        var temp = sourceInput.value;
        sourceInput.value = destinationInput.value;
        destinationInput.value = temp;
      }
      var swapButton = document.getElementById("swapButton");
      swapButton.addEventListener("click", swapSourceAndDestination);
    </script>
    
  </body>
</html>