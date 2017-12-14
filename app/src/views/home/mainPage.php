<style>
    body {
        background: linear-gradient(130deg,rgb(83, 131, 219), rgb(215, 226, 247));
        background-repeat: no-repeat;
        background-attachment: fixed;
    }


    #Apartment{

    }

    .up{
        display:flex;
        justify-content: space-around;
    }

    .order{
        margin-left:10% ;
        margin-right: 0% ;
        padding : 5%;
        border : 1px solid black;
    }
    ul{
        list-style-type: none;
    }
    .actuatorbox{
        display:flex;
        justify-content: space-around;
    }
    .actuatorbox div{
        border:1px solid black;
        padding : 3%;
    }
    .neworder input[type="submit"]{
        margin-top:100%;
        margin-left:0%;


    }
    input[type="submit"]{
        border-radius:10px;
        border: 1px solid black;
    }

    .inputop{
        margin-bottom:10%;
        margin-top:30%;
    }
    /* Style the tab */
    .tab {
        overflow: hidden;
        background-color: rgba(255, 255, 255, 0.568);



    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        color: rgb(25,128,194)
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: rgb(213, 231, 236);
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: rgb(190, 213, 233);
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: rgb(33, 107, 243);
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    /* Style the search box inside the navigation bar */
    .search{

        padding: 6px;
        border: none;
        margin-top: 8px;
        margin-right: 16px;
        font-size: 17px;
        border: 1px solid grey;
    }

    .tab .searchbar button {
        float:right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;

        font-size: 17px;
        border: none;
        cursor: pointer;
    }
    .tab .searchbar{
        float: right;
    }
    .tab .searchbar #search{
        display: flex;
    }

    .tab .searchbar img{
        width:20px;
    }



    /* SENSORS */


    table{
        border: 1px solid rgb(12, 83, 165);
        height: 100px;
        width: 300px;

    }

    .tableSensor{
        WIDTH: 300px;
    }




    .sensors{
        display: flex;
        justify-content: space-around;
    }

    .sensorName{

        border-bottom: 1px solid #000000;
        font-size: 150%;
        color : rgb(204, 219, 231);
        background-color: rgb(12, 83, 165);
    }


    .dataSensor{
        font-size: 40px;
        padding-top : 2%;
    }


    /* Actuator */

    .actuatorName{

        border-bottom: 1px solid black;
        font-size: 150%;
        color : rgb(204, 219, 231);
        background-color: rgb(12, 83, 165);
    }

    .tableActuator{
        WIDTH: 300px;
    }

    .actuatorState{
        padding-top : 2%;
    }
</style>




<!DOCTYPE html>
<html>
    <div id="background" item-height="800", item-width="100%">
  <head>
    <meta charset="utf-8">
    <title>My home</title>
    <link rel="stylesheet" href="css/mainPage.css">

  </head>
  <body>

        <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Apartment')">Apartment name</button>
                <button class="tablinks" onclick="openCity(event, 'room1')">room 1</button>
                <div class="searchbar">
                    <form id="search">
                        <div><input class="search" type="text" placeholder="Search.."></div>
                        <div><button type="submit" href="#"><img src="img/test.png"></button></div>
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
                                    <img src = "img/image_luminosite3.png" alt ="img_luminosite" />
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
                                <td colspan="2">&nbsp; ActuatorName &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <img src="img/edit_pencil.png" width="20" height="20" /></td>
                            </tr>
                            <tr class="content">
                                <td class = "imageActuator">
                                    <img src = "img/image_luminosite3.png" alt="img_light" />
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
                                    <img src = "img/goutte_deau2.png" alt = "humidite" />
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
