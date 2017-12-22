<!-- <!DOCTYPE html> -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Home'ISEP</title>
        <link rel="stylesheet" type="text/css" href="pagehome.css">
        
    </head>
    <body>
         <style>
             body{
    background: linear-gradient(130deg,rgb(83, 131, 219), rgb(215, 226, 247));
    background-repeat: no-repeat;
    background-attachment: fixed;
}
.row{
    display : flex;
    justify-content: space-around;
    
}

.column1{
    height:600px;
    overflow:auto;
    width:30%;
    border: 1px solid black;
    border-radius:2%;
    background-color: rgba(243, 183, 183, 0.671);
    
}
.column2{
    width:30%;
    overflow: auto;
    border: 1px solid black;
    border-radius:2%;
    background-color: rgba(144, 238, 144, 0.486);
   
}
.ajout{
    height:7%;
    width:7%;
    float:right;
    margin-right:2%;
}
.column3{
    width:30%;
    display: flex;
    flex-direction: column;
}
.haut{
    border: 1px solid black;
    height:50%;
    background-color: rgba(224, 255, 255, 0.534);
    border-radius:2%;
    overflow: auto;
}
.bas{
    border: 1px solid black;
    height:50%;
    margin-top:2%;
    background-color: rgba(224, 255, 255, 0.534);
    border-radius:2%;
    overflow: auto;
}
.titre{
    text-align: center;
    border-bottom: 1px solid grey;
}
button{
   
    border-radius:3px;
    border:1px solid black;
    margin-left:2%;
   
}
.ecriture{
    font-size: 1.3em;
}

.petit{
    margin:1%;
    
}
.capteur_pression{
    margin-top:2%;
    margin-left: 1%;
}
.capteur_temperature{
    margin-left:1%;
}
a{
    text-decoration: none;
    color: black;
}
        </style>
           
            
            <div class="row">
              <div class="column1">
                <h1 class="titre" style="color:rgb(255, 95, 95)"> Mes Capteurs</h1>
                <div class="capteur_temperature ecriture">
                   
                   <div class="repere1">La température est de 56 °C<button id="ouv_temperature" onclick="opencity('#ouv_temperature','#temperature')"   >afficher plus </button></div>
                   <div id="temperature" class="temperatures" style="display:none" >
                     <div class="petit"  > La température de la pièce 1 est 55°C <button ><a href='#'>détails</a></button></div>
                     <div class="petit"> La température de la pièce 2 est 50°C <button  ><a href='#'>détails</a></button></div>
                     <div class="petit"> La température de la pièce 3 est 60°C <button  ><a href='#'>détails</a></button></div>
                     <button id="ferm_temperature" onclick="closecity('#temperature','#ouv_temperature')"> afficher moins</button>
                   </div>
                </div>
                <div class="capteur_pression ecriture">
                  <div>La pression est de 1 Pa <button id="ouv_pression" onclick="opencity('#ouv_pression','#pression')">afficher plus</button></div>
                  <div id='pression' style="display:none">
                    <div class="petit"> La pression de la pièce 1 est 2 Pa<button ><a href='#'>détails</a></button></div>
                    <div class="petit"> La pression de la pièce 2 est 0 Pa<button  ><a href='#'>détails</a></button></div>
                    <button id="ferm_pression" onclick="closecity('#pression','#ouv_pression')">afficher moins</button>
                  </div>
              </div>
              </div>
              
              
              <div class="column2">
                <h1 class="titre" style="color:rgb(46, 182, 46)"> Mes Pièces <a href='#' ><img class="ajout" src="img/ajout.png"></a></h1>                
                <div class="ecriture">
                  <div class="petit" ><a  href='#'>pièce 1</a></div>
                  <div class="petit"><a href='#'>pièce 2</a></div>
              </div>
              </div>
              <div class="column3" >
                <div class="haut">
                  <h1 class="titre" style="color:rgb(78, 196, 196)"> Mes Notifications</h1>
                  <div class="ecriture">
                    <div class="petit"> votre capteur marche mal mm/hh/jj/mm</div>
                    <div class="petit"> votre capteur a cessé de fonctionner</div>
                  </div>
                </div> 
                <div class="bas">
                  <h1 class="titre "  style="color:rgb(78, 196, 196)" >Mes Ordres <button><a href="#"> Ajouter un ordre</a> </button></h1>
                  <div class="ecriture">
                     <div> je t'ordronne d'allumer une lampe<button id="ouv_ordre" onclick="opencity('#ouv_ordre','#ordre')">Afficher plus</button></div>
                     <div id="ordre" style="display:none">
                       <div class="petit"> info sur le temps</div>
                       <div class="petit"> info sur les capteurs</div>
                       <div class="petit">info sur les pièces</div>
                       <button id="ferm_ordre" onclick="closecity('#ordre','#ouv_ordre')">Afficher moins</button>
                     </div> 
                  </div>  
                </div> 
              </div>
            </div>
            <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous">
            </script>
      <script>

function opencity(a,b){
    
  
    $(a).hide(1000);
    $(b).show('slow');
}
function closecity(a,b){
  $(a).hide(1000);
  $(b).show('slow');
}



      </script>      
    </body>
            
            
</html>
