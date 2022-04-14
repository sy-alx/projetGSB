<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(() => {
        /* config fields to update/delete a user */
        edit = (row) => {
            $("#text-edit-user").text("Consultation " + ($(row).attr("PraticienId")));

            $("#edit-nom").val(($(row).attr("PraticienId")));
            $("#edit-nom").prop("disabled",false);

            $("#edit-prenom").val(($(row).attr("prenom")));
            $("#edit-prenom").prop("disabled",false);

            $("#edit-DateCR").val(($(row).attr("DateCR")));
            $("#edit-DateCR").prop("disabled",false);

            $("#edit-Datevisite").val(($(row).attr("Datevisite")));
            $("#edit-Datevisite").prop("disabled",false);

            $("#edit-nomRemplacant").val(($(row).attr("nomRemplacantId")));
            $("#edit-nomRemplacant").prop("disabled",false);

            $("#edit-MotifVisite").val(($(row).attr("Motif")));
            $("#edit-MotifVisite").prop("disabled",false);

            $("#edit-Texte").val(($(row).attr("Texte")));
            $("#edit-Texte").prop("disabled",false);

            $("#edit-ImpacteVisite").val(($(row).attr("ImpacteVisite")));
            $("#edit-ImpacteVisite").prop("disabled",false);

            $("#edit-CoefConf").val(($(row).attr("CoefConf")));
            $("#edit-CoefConf").prop("disabled",false);

            $("#edit-id").val(($(row).attr("id")));
            $("#edit-id").prop("disabled",false);


            $("#btn-update").show();
            $("#btn-delete").attr("href", "/CompteRendu/delete/" + $(row).attr("id"));
        }
        view = (row) => {
            edit(row);
            $("#text-edit-user").text("Consultation " + ($(row).attr("PraticienId")));
            $("#edit-nom").prop("disabled",true);

            $("#edit-prenom").prop("disabled",true);
            $("#edit-DateCR").prop("disabled",true);

            $("#edit-Datevisite").prop("disabled",true);
            $("#edit-nomRemplacant").prop("disabled",true);
            $("#edit-MotifVisite").prop("disabled",true);
            $("#edit-Texte").prop("disabled",true);
            $("#edit-ImpacteVisite").prop("disabled",true);
            $("#edit-CoefConf").prop("disabled",true);
            $("#edit-id").prop("disabled",true);


            $("#btn-update").hide();

            $("#btn-delete").attr("href", "/CompteRendu/delete/" + $(row).attr("id"));
        }
    })
</script>

<section>


    <div id="content-wrapper" class="d-flex flex-column">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Consultation des comptes rendus</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered"  placeholder="salut" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <?php if(session()->get('role') == 3){?>
                            <th>Visiteur</th>
                            <?php } ?>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Date du compte-rendu</th>
                            <th>Date de visite</th>
                            <th>Remplacant</th>
                            <th>Motif</th>
                            <th>coefconf</th>
                            <th>ImpacteVisite</th>
                            <th>Modifier</th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php 
                        foreach ($compteRendu as $row) { ?>
                            <tr>
                                <?php if(session()->get('role') == 3){
                                echo '<td>'.$row['visNom'].' '.$row['visPrenom'].'</td>';
                                 } ?>
                                <td><?= $row['nom'] ?></td>
                                <td><?= $row['prenom'] ?></td>
                                <td><?= $row['DateCR'] ?></td>
                                <td><?= $row['Datevisite'] ?></td>
                                <td><?= $row['RemplacantNom'] ?></td>
                                <td><?= $row['Motif'] ?></td>
                                <td><?= $row['CoefConf'] ?></td>
                                <td><?= $row['ImpacteVisite'] ?></td>

                                <td>
                                    <button id= "<?= $row['id'] ?>" PraticienId = "<?= $row['PraticienId'] ?>" Datevisite = "<?= $row['Datevisite'] ?>" DateCR = "<?= $row['DateCR'] ?>" nomRemplacantId = "<?= $row['RemplacantId'] ?>" motif = "<?= $row['MotifId'] ?>" motif = "<?= $row['MotifId'] ?>" Texte = "<?= $row['Texte'] ?>" ImpacteVisite = "<?= $row['ImpacteVisite'] ?>" CoefConf = "<?= $row['CoefConf'] ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>

                            </tr>
                        <?php } ?>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--FORMULAIRE DE LA PREMIERE MODALE POUR MODIFIER L'UTILISATEUR-->
    <form method = "post" action = "/CompteRendu/update">
        <input type = "hidden" name = "id" id = "edit-id">
        <div class="modal" tabindex="-1" role="dialog" id = "edit-user">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title light-dark" id = "text-edit-user"><b></b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control" id="edit-nom" name="Praticien">

                            <option value="">-- Sélection --</option>
                            <?php foreach ($listePraticien as $row) { ?>

                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['nom']." ".$row['prenom']; ?></option>

                            <?php } ?>
                        </select>

                        <div class = "form-group">
                            <label class = "light-dark">Date de compte-rendu</label>
                            <input class = "form-control" name = "DateCR" required type = "date" id = "edit-DateCR">
                        </div>
                        <div class = "form-group">
                            <label class = "light-dark">Date de visite</label>
                            <input class = "form-control" name = "Datevisite" required type = "date" id = "edit-Datevisite">
                        </div>

                        <label class = "light-dark">Remplacent</label>

                        <select class="form-control" id="edit-nomRemplacant" name="Remplacant">
                            <option value="">-- Sélection --</option>
                            <?php foreach ($listeRemplacant as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['nomRemplacant']. " ".$row['prenomRemplacant'] ; ?></option>
                            <?php } ?>
                        </select>


                        <label class = "light-dark">Motif</label>
                        <select class="form-control" id="edit-MotifVisite" name="MotifVisite">

                            <option value="">-- Sélection --</option>
                            <?php foreach ($listeMotifVisite as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['motif']; ?></option>
                            <?php } ?>
                        </select>


                        <div class = "form-group">
                            <label for="exampleFormControlSelect1">Compte rendu de la visite :</label>
                            <textarea class="form-control"  rows="3" name="texte" id="edit-Texte">

                                    </textarea>
                        </div>


                        <div class="form-group">
                            <label for="start">Impacte de la visite :</label> <br>

                            <div class="form-check form-check-inline">

                                <input type="number" id="edit-ImpacteVisite" name="ImpacteVisite" min="1" max="10" value="">

                            </div>


                        </div>

                        <div class="form-group">
                            <label for="start">Coefficient de confiance :</label> <br>

                            <div class="form-check form-check-inline">

                                <input type="number" id="edit-CoefConf" name="CoefConf" min="1" max="10" value="">

                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Annuler</b></button>
                        <a id = "btn-delete"><button type = "button" class="btn btn-danger"><b>Suprimer <i class = "fas fa-info icon"></i></b></button></a>
                        <button id="btn-update" type="submit" class="btn btn-success"><b>Mettre à jour <i class = "fas fa-check-double icon"></i></b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>




</section>



<!--<script>
    $(document).ready(() => {
        /* config fields to update/delete a user */
        edit = (user) => {
            $("#text-edit-user").text("Edit " + ($(user).attr("nom")));
            $("#edit-nom").val(($(user).attr("PraticienId")));
            $("#edit-prenom").val(($(user).attr("prenom")));
            $("#edit-DateCR").val(($(user).attr("DateCR")));
            $("#edit-Datevisite").val(($(user).attr("Datevisite")));
            $("#edit-nomRemplacant").val(($(user).attr("nomRemplacantId")));
            $("#edit-MotifVisite").val(($(user).attr("Motif")));
            $("#edit-Texte").val(($(user).attr("Texte")));
            $("#edit-ImpacteVisite").val(($(user).attr("ImpacteVisite")));
            $("#edit-CoefConf").val(($(user).attr("CoefConf")));
            $("#edit-id2").val(($(user).attr("id")));
            $("#btn-delete").attr("href", "/CompteRendu/delete" + $(user).attr("userid"));
        }
    })
</script>-->