<section>

    <h1>Voir mes rendez-vous</h1>
    
<?php
    // if (isset($_GET['semaine'])){
    //     $etat = $_GET['semaine'];
    // }

    // if (isset($_GET['jour'])){
    //     $jour = $_GET['jour'];    
    // }else{
    //     $jour = date('w');
    // }

    // if (!isset($etat)){
    //     $etat = 0;
    // }

    // if ($etat == 1){
    //     $jour = $jour + 7;

    // }elseif ($etat == 2){
    //     $jour = $jour - 7;

    // }elseif ($etat == 0){
    //     $jour = date('w');
    // }
        var_dump($jour);

  //  if(isset($etat)):
?>
        <table style="width: 100%;" border="1">
        <thead>
        <tr>
        <th><?php          
            // $sub = '';
            // for($i=1;$i<=7;$i++){
            //     $temp = date('d-m-Y', strtotime('+'.($i-$jour).' days'));
            //     $sub .= $temp."</th><th>"; 
            // }
            // echo (substr($sub,0,-4));
            foreach($createSemaine as $row){
                echo $row."</th><th>";
            }
        ?>
        </th>
        </thead>
        <tbody>
        <?php 
            // $weekStart =  date('Y-m-d', strtotime('+'.(1-$jour).' days')); refaire weekstart et weekend pour la requête SQL
            // $weekEnd = date('Y-m-d', strtotime('+'.(7-$jour).' days'));
            $heureCalendrier = 8;

            for ($i=1; $i<=10;$i++){
                echo '<tr>';
                
                for($j=1;$j<=7;$j++){

                       $textForCell = "";
                        foreach($liste_rdv as $row){
                            if($row['date_rdv'] == date('Y-m-d', strtotime('+'.($j-$jour).' days')) && $row['heure_rdv'] == $heureCalendrier){
                                $textForCell .= "Le".$row['date_rdv']." à ".$row['heure_rdv']."h";
                            }
                        }
                        if(empty($textForCell)) {
                            $textForCell = "&nbsp";
                        }
                        echo '<td> ' . $textForCell . '</td>';
                }
                echo '</tr>';
                $heureCalendrier++;
            }
        ?>
        </tbody>
        </table>
    <?php   
    //endif
    ?>   
    <br>
    <a href="Voirrdv?semaine=1&jour=<?php echo $jour ?>">Semaine précédente</a>
    <a href="Voirrdv?semaine=0">Semaine en cours</a>
    <a href="Voirrdv?semaine=2&jour=<?php echo $jour ?>">Semaine suivante</a>
    <br>
</section>