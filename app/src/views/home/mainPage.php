﻿<style>
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
        margin-left:0;


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
        background-color: rgba(255, 255, 255, 0.42);



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
        background-color: rgb(190, 213, 233);
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: rgb(248, 243, 255);
    }

    /* Style the tab content */
    .tabcontent {

        padding: 6px 12px;
        border-top: none;
        color : #ebebeb;
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

    #searchIcon{
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


    .allSensors{
        color : #ffffff;
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




        <?php include(__DIR__."/../templates/main/navbar.php") ?>

        <div class="tab">

                <button class="tablinks active" onclick="openCity(event, 'Apartment')">Nom de l'appartement</button>
                <?php foreach ($data['apartmentData'] as $value): ?>
                <button class="tablinks" onclick="openCity(event, 'room')"><?php echo $value['name']; ?></button>
                <?php endforeach; ?>
                <button><a href="/addroom/<?php echo $data['apartmentId']; ?>">Ajouter une pièce</a></button>
                <div class="searchbar">
                    <form id="search">
                        <div><input class="search" type="text" placeholder="Rechercher.."></div>
                        <div id="searchIcon"><button type="submit" href="#"><img src="/img/search.png"></button></div>
                    </form>
                </div>

        </div>
        <div id="Apartment" class="tabcontent">
                <div class="up">
                    <div class="type">
                        <table class="table">
                            <tr>
                                <td>Température : 21 °C </td>
                                <td><form><input  type="submit" value="details" href="#"></form></td>
                            </tr>
                            <tr>
                                <td>Humidité : 4 %</td>
                                <td><form><input  type="submit" value="details" href="#"></form></td>
                            </tr>
                        </table>
                    </div>

                    <div class="order">
                      <img src="/img/lightoff.png" alt ="img_luminosite" height="100" width="100">
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                        Allumer la lampe
</div>
                    <div class="neworder">
                        <form>
                            <input   type="submit" value="Ajouter un nouvel ordre">
                        </form>
                    </div>

                </div>
                <div class="down">
                     <div class="title">
                        Actionneurs
                     </div>
                     <div class="actuatorbox">
                         <div >
                           <img src="/img/humidity.png" alt="img_humid" height="100" width="100">
                            <label class="switch">
                              <input type="checkbox">
                              <span class="slider round"></span>
                            </label>
                            actionneur 1
                         </div>
                         <div >
                           <img src="/img/humidity.png" alt="img_humid" height="100" width="100">
                           <label class="switch">
                             <input type="checkbox">
                             <span class="slider round"></span>
                           </label>
                            actionneur 2
                         </div>
                         <div >
                           <img src="/img/humidity.png" alt="img_humid" height="100" width="100">
                           <label class="switch">
                             <input type="checkbox">
                             <span class="slider round"></span>
                           </label>
                            actionneur 3
                         </div>
                         <div >
                           <img src="/img/humidity.png" alt="img_humid" height="100" width="100">
                           <label class="switch">
                             <input type="checkbox">
                             <span class="slider round"></span>
                           </label>
                            actionneur 4
                         </div>
                     </div>
                </div>
        </div>
        <div id="room" class="tabcontent" style="display:none">
                <h3>Pièce 1</h3>


            <div class="allSensors">
                <div class = "sensors">
                    <div class="aSensor" id = "sensor 1">
                        <table class = "tableSensor">
                            <tr class = "sensorName">
                                <td colspan="2">Luminosité</td>
                            </tr>
                            <tr class = "content">
                                <td class = "imageSensor">
                                    <img src = "/img/lighton.png" alt ="img_luminosite" width="100" height="100"/>
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
                                <td colspan="2">&nbsp; Activer la lumière &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <img src="/img/edit_pencil.png" width="20" height="20" /></td>
                            </tr>
                            <tr class="content">
                                <td class = "imageActuator">
                                    <img src = "/img/lightoff.png" alt="img_light" width="100" height="100"/>
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
                                <td colspan="2">&nbsp; Humidité</td>
                            </tr>

                            <tr class = "content">
                                <td class = "imageSensor">
                                    <img src = "/img/humidity.png" alt = "humidite" width="100" height="100"/>
                                </td>
                                <td class = "dataSensor">
                                    60%
                                </td>
                            </tr>
                        </table>
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