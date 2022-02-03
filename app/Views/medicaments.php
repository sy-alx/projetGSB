<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {

            $("#text-edit-user").text("Modifier le médicament : " + ($(user).attr("usernom")));

            $("#edit-nom").val(($(user).attr("usernom")));
            $("#edit-nom").prop("disabled",false);


            $("#edit-prenom").val(($(user).attr("usertype")));
            $("#edit-prenom").prop("disabled",false);


            $("#edit-adresse").val(($(user).attr("userlorem")));
            $("#edit-adresse").prop("disabled",false);


            $("#edit-codePostal").val(($(user).attr("usernote")));
            $("#edit-codePostal").prop("disabled",false);



            $("#edit-id").val(($(user).attr("userid")));
            $("#edit-id").prop("disabled",false);

            $("#btn-update").show();
            $("#btn-delete").attr("href", "/Medicament/Delete/" + $(user).attr("userid"));

        }
        view = (user) => {
            edit(user);
            $("#text-edit-user").text("Voir la fiche du médicament : " + ($(user).attr("usernom")));
            $("#edit-nom").prop("disabled",true);
            $("#edit-prenom").prop("disabled",true);
            $("#edit-adresse").prop("disabled",true);
            $("#edit-codePostal").prop("disabled",true);

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


            <div class = "margin-top row pb-3 pt-2">

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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class = "form-group">
                                    <label class = "light-dark">Nom</label>
                                    <input class = "form-control" name = "nom" required>
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Type</label>
                                    <input class = "form-control" name = "type" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Lorem</label>
                                    <input class = "form-control" name = "lorem" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Note</label>
                                    <input class = "form-control" name = "note" required >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancel</b></button>
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
                                    <label class = "light-dark">Nom</label>
                                    <input class = "form-control" name = "nom" required placeholder = "Ex: John Wick" id = "edit-nom">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Type</label>
                                    <input class = "form-control" name = "type" required id = "edit-prenom">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Lorem</label>
                                    <input class = "form-control" name = "lorem" required id = "edit-adresse">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Note</label>
                                    <input class = "form-control" name = "note" required type = "number" id = "edit-codePostal">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancel</b></button>
                                <a id = "btn-delete"><button type = "button" class="btn btn-danger"><b>Delete <i class = "fas fa-info icon"></i></b></button></a>
                                <button id="btn-update" type="submit" class="btn btn-success"><b>Update <i class = "fas fa-check-double icon"></i></b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class = "margin-top">
                <table class = "table table-hover">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>type</th>
                        <th>lorem</th>
                        <th>note</th>
                        <th>Modifier</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($listeMedicament as $user) : ?>
                        <tr>
                            <td><?= $user->nom?></td>
                            <td><?= $user->type?></td>
                            <td><?= $user->lorem?></td>
                            <td><?= $user->note?></td>
                            <td>
                                <button usernom = "<?= $user->nom ?>" usertype = "<?= $user->type ?>" userlorem = "<?= $user->lorem ?>" usernote = "<?= $user->note ?>" userid = "<?= $user->id ?>"onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                                <button usernom = "<?= $user->nom ?>" usertype = "<?= $user->type ?>" userlorem = "<?= $user->lorem ?>" usernote = "<?= $user->note ?>" userid = "<?= $user->id ?>"onclick = "view(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-eye"></i></b></button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>