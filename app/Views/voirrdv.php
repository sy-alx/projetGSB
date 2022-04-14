<section>
    

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Voir mes rendez-vous</h6>
    </div>
    <br>


    <table style="width: 100%;" border="1" class="table table-hover">
        <thead>
            <tr>
                <th></th>
                    <?php        
                        foreach($createSemaine as $row){
                            echo "<th style='text-align: center;'>".$row."</th>";
                        }
                    ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $heureCalendrier = 8;

                for ($i=1; $i<=10;$i++){
                    echo '<tr><th style="text-align: center;">'.($heureCalendrier).'h</th>';
                    
                    for($j=1;$j<=7;$j++){

                            $textForCell = "";
                            foreach($liste_rdv as $row){
                                if($row['date_rdv'] == date('Y-m-d', strtotime('+'.($j-$jour).' days')) && $row['heure_rdv'] == $heureCalendrier){
                                        $textForCell .= "<div class='cellFormCalendar'>
                                        Praticien:  ".$row['nomPraticien']." ".$row['prenomPraticien']."<br/>Téléphone: ".$row['numero']."<br/>Adresse: ".$row['adresse']
                                        ."</div>";
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
    <div style="text-align: center;">
      <a style="padding-right: 20px;" href="Voirrdv?semaine=1&jour=<?php echo $jour ?>">Semaine précédente</a>
      <a style="padding-right: 20px;" href="Voirrdv?semaine=0">Semaine en cours</a>
      <a style="padding-right: 20px;" href="Voirrdv?semaine=2&jour=<?php echo $jour ?>">Semaine suivante</a>
    </div>
    <br>
</section>

