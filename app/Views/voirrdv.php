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
                    echo '<tr><th style="text-align: center; vertical-align:middle;">'.($heureCalendrier).'h</th>';
                    
                    for($j=1;$j<=7;$j++){

                            $textForCell = "";
                            foreach($liste_rdv as $row){
                                if($row['date_rdv'] == date('Y-m-d', strtotime('+'.($j-$jour).' days')) && $row['heure_rdv'] == $heureCalendrier){
                                        $textForCell .= "<div class='cellFormCalendar'>
                                        Praticien:  ".$row['nomPraticien']." ".$row['prenomPraticien']."<br/>Téléphone: ".$row['numero']."<br/>Adresse: ".$row['adresse'].", ".$row['codePostal'].
                                        "<button style='float:right; margin-top:-7%;' id='".$row['id']."'date_rdv = '".$row['date_rdv']."'heure_rdv='".$row['heure_rdv']."' onclick = 'edit(this)' data-toggle = 'modal' data-target = '#edit-rdv' class = 'btn btn-sm btn-primary'><b><i class = 'fas fa-bars'></i></b></button><br/>
                                        </div>";
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
    <form method = "post" action = "/Voirrdv/Update"> 
        <input type = "hidden" name = "id" id = "edit-id">
        <div class="modal" tabindex="-1" role="dialog" id = "edit-rdv">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title light-dark" id = "text-edit-rdv"><b>Modifier rendez-vous</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class = "form-group">
                            <label class = "light-dark">Date rdv</label>
                            <input class = "form-control" name = "date_rdv"  type = "date" id = "edit-dateRdv" required>
                        </div>
                        <div class = "form-group">
                            <label class = "light-dark">Heure rdv</label>
                            <input class = "form-control" name = "heure_rdv"  type = "number" id = "edit-heureRdv" min="8" max="18" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancel  <i class="fas fa-window-close"></i></b></button>
                        <a id = "btn-delete"><button type = "button" class="btn btn-danger"><b>Delete  <i class="fas fa-trash-alt"></i></b></button></a>
                        <button id="btn-update" type="submit" class="btn btn-success"><b>Update  <i class = "fas fa-check-double icon"></i></b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php   
    ?>   
    <br>
    <div style="text-align: center;">
      <a style="padding-right: 20px;" href="Voirrdv?semaine=1&jour=<?php echo $jour ?>">Semaine précédente</a>
      <a style="padding-right: 20px;" href="Voirrdv?semaine=0">Semaine en cours</a>
      <a style="padding-right: 20px;" href="Voirrdv?semaine=2&jour=<?php echo $jour ?>">Semaine suivante</a>
    </div>
    <br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
    $(document).ready(() => {

        /* config fields to update/delete a rdv */
        edit = (rdv) => {

            $("#edit-id").val(($(rdv).attr("id")));
            $("#edit-id").prop("disabled",false);

            $("#edit-dateRdv").val(($(rdv).attr("date_rdv")));
            $("#edit-dateRdv").prop("disabled",false);

            $("#edit-heureRdv").val(($(rdv).attr("heure_rdv")));
            $("#edit-heureRdv").prop("disabled",false);

            $("#btn-update").show();
            $("#btn-delete").attr("href", "/Voirrdv/Delete/" + $(rdv).attr("id"));

        }
        view = (rdv) => {
            edit(rdv);

            $("#edit-id").prop("disabled",true); 
            $("#edit-dateRdv").prop("disabled",true);
            $("#edit-heureRdv").prop("disabled",true);
           

            $("#btn-update").hide();
            $("#btn-delete").attr("href", "/Voirrdv/Delete/" + $(rdv).attr("id"));

        }

    })
</script>
</section>

