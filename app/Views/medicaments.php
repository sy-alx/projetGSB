<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {

            $("#text-edit-user").text("Modifier le médicament : " + ($(user).attr("DEPOTLEGAL")));

            $("#edit-MED_DEPOTLEGAL").val(($(user).attr("DEPOTLEGAL")));
            $("#edit-MED_DEPOTLEGAL").prop("disabled",false);


            $("#edit-MED_NOMCOMMERCIAL").val(($(user).attr("MED_NOMCOMMERCIAL")));
            $("#edit-MED_NOMCOMMERCIAL").prop("disabled",false);


            $("#edit-FAM_CODE").val(($(user).attr("FAM_CODE")));
            $("#edit-FAM_CODE").prop("disabled",false);


            $("#edit-MED_COMPOSITION").val(($(user).attr("MED_COMPOSITION")));
            $("#edit-MED_COMPOSITION").prop("disabled",false);

            $("#edit-MED_EFFETS").val(($(user).attr("MED_EFFETS")));
            $("#edit-MED_EFFETS").prop("disabled",false);

            $("#edit-MED_CONTREINDIC").val(($(user).attr("MED_CONTREINDIC")));
            $("#edit-MED_CONTREINDIC").prop("disabled",false);

            $("#edit-MED_PRIXECHANTILLON").val(($(user).attr("MED_PRIXECHANTILLON")));
            $("#edit-MED_PRIXECHANTILLON").prop("disabled",false);

            $("#edit-MED_NOMBRECHANTILLON").val(($(user).attr("MED_NOMBRECHANTILLON")));
            $("#edit-MED_NOMBRECHANTILLON").prop("disabled",false);



            $("#edit-id").val(($(user).attr("userid")));
            $("#edit-id").prop("disabled",false);

            $("#btn-update").show();
            $("#btn-delete").attr("href", "/Medicament/Delete/" + $(user).attr("userid"));

        }
        view = (user) => {
            edit(user);
            $("#text-edit-user").text("Voir la fiche du médicament : " + ($(user).attr("DEPOTLEGAL")));
            $("#edit-MED_DEPOTLEGAL").prop("disabled",true);
            $("#edit-MED_NOMCOMMERCIAL").prop("disabled",true);
            $("#edit-FAM_CODE").prop("disabled",true);
            $("#edit-MED_COMPOSITION").prop("disabled",true);
            $("#edit-MED_EFFETS").prop("disabled",true);
            $("#edit-MED_CONTREINDIC").prop("disabled",true);
            $("#edit-MED_PRIXECHANTILLON").prop("disabled",true);
            $("#edit-MED_NOMBRECHANTILLON").prop("disabled",true);

            $("#edit-id").prop("disabled",true);

            $("#btn-update").hide();
            $("#btn-delete").attr("href", "/Medicament/Delete/" + $(user).attr("userid"));

        }

    })
</script>
<section>
    <?= $session->getFlashdata("message") ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div class="card shadow mb-4">


            <div class = "margin-top row pb-3 pt-2 pl-100">

                <div class = "col-md-3 center">
                    <button class = "btn btn-info" data-toggle = "modal" data-target = "#add-user"><b>Ajouter un nouveau médicament <i class = "fas fa-plus icon"></i></b></button>
                </div>
            </div>


            <form method = "post" action = "/Medicament/Create">
                <div class="modal" tabindex="-1" role="dialog" id = "add-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title light-dark">
                                    <b>Nouveau médicament</b>
                                </h5>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class = "form-group">
                                    <label class = "light-dark">MED_DEPOTLEGAL</label>
                                    <input class = "form-control" name = "MED_DEPOTLEGAL" required>
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_NOMCOMMERCIAL</label>
                                    <input class = "form-control" name = "MED_NOMCOMMERCIAL" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">FAM_CODE</label>
                                    <input class = "form-control" name = "FAM_CODE" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_COMPOSITION</label>
                                    <input class = "form-control" name = "MED_COMPOSITION" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_EFFETS</label>
                                    <input class = "form-control" name = "MED_EFFETS" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_CONTREINDIC</label>
                                    <input class = "form-control" name = "MED_CONTREINDIC" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_PRIXECHANTILLON</label>
                                    <input class = "form-control" name = "MED_PRIXECHANTILLON" type="number" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_NOMBRECHANTILLON</label>
                                    <input class = "form-control" name = "MED_NOMBRECHANTILLON" type="number" required >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancel  <i class="fas fa-window-close"></i></b></button>
                                <button type="submit" class="btn btn-success"><b>Insert <i class = "fas fa-check-double icon"></i></b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <form method = "post" action = "/Medicament/Update">
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
                                <div class = "form-group">
                                    <label class = "light-dark">MED_DEPOTLEGAL</label>
                                    <input class = "form-control" name = "MED_DEPOTLEGAL" required  id = "edit-MED_DEPOTLEGAL">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_NOMCOMMERCIAL</label>
                                    <input class = "form-control" name = "MED_NOMCOMMERCIAL" required id = "edit-MED_NOMCOMMERCIAL">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">FAM_CODE</label>
                                    <input class = "form-control" name = "FAM_CODE" required id = "edit-FAM_CODE">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_COMPOSITION</label>
                                    <input class = "form-control" name = "MED_COMPOSITION" required  id = "edit-MED_COMPOSITION">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_EFFETS</label>
                                    <input class = "form-control" name = "MED_EFFETS" required id = "edit-MED_EFFETS">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_CONTREINDIC</label>
                                    <input class = "form-control" name = "MED_CONTREINDIC" required id = "edit-MED_CONTREINDIC">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_PRIXECHANTILLON</label>
                                    <input class = "form-control" name = "MED_PRIXECHANTILLON" type="number" required id = "edit-MED_PRIXECHANTILLON">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">MED_NOMBRECHANTILLON</label>
                                    <input class = "form-control" name = "MED_NOMBRECHANTILLON" type="number" required id = "edit-MED_NOMBRECHANTILLON">
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

            <div class = "margin-top">
                <table class = "table table-hover">
                    <thead>
                    <tr>
                        <th>DEPOTLEGAL</th>
                        <th>NOMCOMMERCIAL</th>
                        <th>CODE</th>
                        <th>COMPOSITION</th>
                        <th>EFFETS</th>
                        <th>CONTREINDIC</th>
                        <th>PRIXECHANTILLON</th>
                        <th>nmbCHANTILLON</th>
                        <th>Modifier</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($listeMedicament as $user) : ?>
                        <tr>
                            <td><?= $user->MED_DEPOTLEGAL?></td>
                            <td><?= $user->MED_NOMCOMMERCIAL?></td>
                            <td><?= $user->FAM_CODE?></td>
                            <td><?= $user->MED_COMPOSITION?></td>
                            <td><?= $user->MED_EFFETS?></td>
                            <td><?= $user->MED_CONTREINDIC?></td>
                            <td><?= $user->MED_PRIXECHANTILLON?> €</td>
                            <td><?= $user->MED_NOMBRECHANTILLON?></td>
                            <td>
                                <button DEPOTLEGAL = "<?= $user->MED_DEPOTLEGAL ?>" MED_NOMCOMMERCIAL = "<?= $user->MED_NOMCOMMERCIAL ?>" FAM_CODE = "<?= $user->FAM_CODE ?>" MED_COMPOSITION = "<?= $user->MED_COMPOSITION ?>" MED_EFFETS = "<?= $user->MED_EFFETS ?>"  MED_CONTREINDIC = "<?= $user->MED_CONTREINDIC ?>" MED_PRIXECHANTILLON = "<?= $user->MED_PRIXECHANTILLON ?>"   MED_NOMBRECHANTILLON = "<?= $user->MED_NOMBRECHANTILLON ?>" userid = "<?= $user->id ?>"onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                                <button DEPOTLEGAL = "<?= $user->MED_DEPOTLEGAL ?>" MED_NOMCOMMERCIAL = "<?= $user->MED_NOMCOMMERCIAL ?>" FAM_CODE = "<?= $user->FAM_CODE ?>" MED_COMPOSITION = "<?= $user->MED_COMPOSITION ?>" MED_EFFETS = "<?= $user->MED_EFFETS ?>"  MED_CONTREINDIC = "<?= $user->MED_CONTREINDIC ?>" MED_PRIXECHANTILLON = "<?= $user->MED_PRIXECHANTILLON ?>"  MED_NOMBRECHANTILLON = "<?= $user->MED_NOMBRECHANTILLON ?>" userid = "<?= $user->id ?>"onclick = "view(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-eye"></i></b></button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>