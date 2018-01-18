
<div class="block">

    <div class="icone"> <!image du capteur>

        <img src='' alt='image du capteur'>

    </div>



    <div class="text"><!description du capteur ?>

        description du capteur = type + pièce

    </div>



    <div class="historic"><!historique des valeurs du capteur ?>

        <sectionTitle>Historique</sectionTitle>

    </div>



    <div class="datas"><!graphique des valeurs du capteur ?>

        <sectionTitle>Statistiques</sectionTitle>

        <div class="diagram">

            <div class='icone'>

                <img src='' alt='diagramme 1'>

            </div>

            <div class='icone'>

                <img src='' alt='diagramme 2'>

            </div>

        </div>

    </div>

    <a href="panneSimulation(<?php echo $value['id']?>)">Simuler une panne</a>

</div>



</body>

<style>
    .block{
        display: flex;
        border: 2px black solid;
        width : 60%;
        margin : auto;
        padding : 1%;
    }

    .text{
        display: flex;
        width: 50%;
        font-size: 95%;
        border: 2px black solid;
        padding: 1%;
        margin : 1%;
    }

    .historic{
        margin : 1%;
    }

    .datas{
        width : auto;
        margin : 1%;
    }

    .diagram{
        display: flex;
        justify-content: space-around;
        border: 2px black solid;
    }

    sectionTitle{
        text-decoration:  underline;
    }

    .icone{
        margin: 5px;
        border:2px red solid;;
    }
</style>



