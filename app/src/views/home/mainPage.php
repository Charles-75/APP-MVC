<!DOCTYPE html>
<html>
    <div id="background" item-height="800", item-width="100%">
  <head>
    <meta charset="utf-8">
    <title>My home</title>
    <link rel="stylesheet" href="ressource/css/mainPage.css">

  </head>
  <body>

        <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Apartment')">Apartment name</button>
                <button class="tablinks" onclick="openCity(event, 'room1')">room 1</button>
                <div class="searchbar">
                    <form>
                        <input class="search" type="text" placeholder="Search..">
                        <button type="submit" href="#"><img src="test.png"></button>
                    </form>
                </div>

        </div>
        <div id="Apartment" class="tabcontent">
                <div class="up">
                    <div class="type">
                        <table class="table">
                            <tr>
                                <td>temparature : 21 °C </td>
                                <td><form><input  type="submit" value="details" href="#"></form></td>
                            </tr>
                            <tr>
                                <td>temparature : 21 °C </td>
                                <td><form><input  type="submit" value="details" href="#"></form></td>
                            </tr>
                        </table>
                    </div>

                    <div class="order">
allumer ta lampe
</div>
                    <div class="neworder">
                        <form>
                            <input   type="submit" value="Add a new order">
                        </form>
                    </div>

                </div>
                <div class="down">
                     <div clas="title">
    capteurs
                     </div>
                     <div class="actuatorbox">
                         <div >
actuator1
                         </div>
                         <div >
actuator2
                         </div>
                         <div >
actuator3
                         </div>
                         <div >
actuator4
                         </div>
                     </div>
                </div>
        </div>
        <div id="room1" class="tabcontent">
                <h3>Room 1</h3>
            <p>Room 1 of your apartment.</p>


            <div class="allSensors">
                <div class = "sensors">
                    <div class="aSensor" id = "sensor 1">
                        <table class = "tableSensor">
                            <tr class = "sensorName">
                                <td colspan="2">&nbsp; Brightness</td>
                            </tr>
                            <tr class = "content">
                                <td class = "imageSensor">
                                    <img src = "image_luminosite3.png" alt ="img_luminosite" />
                                </td>
                                <td class = "dataSensor">
70%
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="anActuator" id = "actuator1">
                        <table class="tableActuator">
                            <tr class="actuatorName">
                                <td colspan="2">&nbsp; ActuatorName &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <img src="edit_pencil.png" width="20" height="20" /></td>
                            </tr>
                            <tr class="content">
                                <td class = "imageActuator">
                                    <img src = "image_luminosite3.png" alt="img_light" />
                                </td>
                                <td class "actuatorState">
                                    <p>
                                        <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                        </label>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class = "aSensor" id = "sensor2">
                        <table class="tableSensor">
                            <tr class = "sensorName">
                                <td colspan="2">&nbsp; Humidity</td>
                            </tr>

                            <tr class = "content">
                                <td class = "imageSensor">
                                    <img src = "goutte_deau2.png" alt = "humidite" />
                                </td>
                                <td class = "dataSensor">
60%
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>





                <p>List of sensors below.</p>
                <div id="sensor1">
    This is data from sensor1.
                <div>

              <h4>Actuators</h4>
                <p>List of actuators below.</p>

              </div>

              <div id="room2" class="tabcontent">
                <h3>room2</h3>
                <p>Tokyo is the capital of Japan.</p>
              </div>
            </div>
  <script>
      function openCity(evt, cityName) {
          // Declare all variables
          var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

  </script>
  </body>
</div>
</html>
