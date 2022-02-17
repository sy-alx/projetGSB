<section>

    <h1>Voir mes rendez-vous</h1>

    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th></th>
                <th>
                    <?php        
                        foreach($createSemaine as $row){
                            echo $row."</th><th>";
                        }
                    ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $heureCalendrier = 8;

                for ($i=1; $i<=10;$i++){
                    echo '<tr><th>'.($heureCalendrier).'h</th>';
                    
                    for($j=1;$j<=7;$j++){

                            $textForCell = "";
                            foreach($liste_rdv as $row){
                                if($row['date_rdv'] == date('Y-m-d', strtotime('+'.($j-$jour).' days')) && $row['heure_rdv'] == $heureCalendrier){
                                    if(isset($row['nomRemplacant'])){
                                        $textForCell .= $row['nomRemplacant']." remplaçant de ".$row['nomPraticien'];
                                    }else{
                                        $textForCell .= $row['nomPraticien'];
                                    }
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
    ?>   
    <br>
    <a href="Voirrdv?semaine=1&jour=<?php echo $jour ?>">Semaine précédente</a>
    <a href="Voirrdv?semaine=0">Semaine en cours</a>
    <a href="Voirrdv?semaine=2&jour=<?php echo $jour ?>">Semaine suivante</a>
    <br>
</section>