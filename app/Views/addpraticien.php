<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {

            $("#text-edit-user").text("Modifier le praticien : " + ($(user).attr("usernom")));

            $("#edit-nom").val(($(user).attr("usernom")));
            $("#edit-nom").prop("disabled",false);


            $("#edit-prenom").val(($(user).attr("userprenom")));
            $("#edit-prenom").prop("disabled",false);


            $("#edit-adresse").val(($(user).attr("useradresse")));
            $("#edit-adresse").prop("disabled",false);


            $("#edit-codePostal").val(($(user).attr("usercodePostal")));
            $("#edit-codePostal").prop("disabled",false);


            $("#edit-numero").val(($(user).attr("usernumero")));
            $("#edit-numero").prop("disabled",false);


            $("#edit-email").val(($(user).attr("useremail")));
            $("#edit-email").prop("disabled",false);


            $("#edit-id").val(($(user).attr("userid")));
            $("#edit-id").prop("disabled",false);

            $("#btn-update").show();
            $("#btn-delete").attr("href", "/Addpraticien/Delete/" + $(user).attr("userid"));

        }
        view = (user) => {
            edit(user);
            $("#text-edit-user").text("Voir la fiche du praticien : " + ($(user).attr("usernom")));
            $("#edit-nom").prop("disabled",true);
            $("#edit-prenom").prop("disabled",true);
            $("#edit-adresse").prop("disabled",true);
            $("#edit-codePostal").prop("disabled",true);
            $("#edit-numero").prop("disabled",true);
            $("#edit-email").prop("disabled",true);
            $("#edit-id").prop("disabled",true);

            $("#btn-update").hide();
            $("#btn-delete").attr("href", "/Addpraticien/Delete/" + $(user).attr("userid"));

        }

    })
</script>
<section>

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Gestion des praticiens</h6>
    </div>




    <?= $session->getFlashdata("message") ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div class="card shadow mb-4">


            <div class = "margin-top row pb-3 pt-2 pl-100">

                <div class = "col-md-3 center">
                    <button class = "btn btn-info" data-toggle = "modal" data-target = "#add-user"><b>Ajouter un nouveau praticien<i class = "fas fa-plus icon"></i></b></button>
                </div>
            </div>




            <form method = "post" action = "/Addpraticien/Create">
                <div class="modal" tabindex="-1" role="dialog" id = "add-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title light-dark">
                                    <b>Ajouter un nouveau praticien</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class = "form-group">
                                    <label class = "light-dark">Nom</label>
                                    <input class = "form-control" name = "nom" required placeholder = "Ex: John Wick">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Prénom</label>
                                    <input class = "form-control" name = "prenom" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Adresse</label>
                                    <input class = "form-control" name = "adresse" required >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Code postal</label>
                                    <input class = "form-control" name = "codePostal" required type = "number" >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Numéro</label>
                                    <input class = "form-control" name = "numero" required type = "number">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">E-mail</label>
                                    <input class = "form-control" name = "email" required type = "email" placeholder = "Example: john@wick.com">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Annuler  <i class="fas fa-window-close"></i></b></button>
                                <button type="submit" class="btn btn-success"><b>Insérer <i class = "fas fa-check-double icon"></i></b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <form method = "post" action = "/Addpraticien/Update">
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
                                    <label class = "light-dark">Name</label>
                                    <input class = "form-control" name = "nom" required placeholder = "Ex: John Wick" id = "edit-nom">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Prénom</label>
                                    <input class = "form-control" name = "prenom" required id = "edit-prenom">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Adresse</label>
                                    <input class = "form-control" name = "adresse" required id = "edit-adresse">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Code postal</label>
                                    <input class = "form-control" name = "codePostal" required type = "number" id = "edit-codePostal">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Numéro</label>
                                    <input class = "form-control" name = "numero" required type = "number" id = "edit-numero">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">E-mail</label>
                                    <input class = "form-control" name = "email"  type = "email" placeholder = "Example: john@wick.com" id = "edit-email" required>
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
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>codePostal</th>
                        <th>Numéro</th>
                        <th>Email</th>
                        <th>Modifier</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($listePraticien as $user) : ?>
                        <tr>
                            <td><?= $user->nom?></td>
                            <td><?= $user->prenom?></td>
                            <td><?= $user->adresse?></td>
                            <td><?= $user->codePostal?></td>
                            <td><?= $user->numero?></td>
                            <td><?= $user->email?></td>
                            <td>
                                <button usernom = "<?= $user->nom ?>" userprenom = "<?= $user->prenom ?>" useradresse = "<?= $user->adresse ?>" usercodePostal = "<?= $user->codePostal ?>" usernumero = "<?= $user->numero ?>" useremail = "<?= $user->email ?>" userid = "<?= $user->id ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>