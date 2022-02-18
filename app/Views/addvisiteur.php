<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" integrity="sha512-qzrZqY/kMVCEYeu/gCm8U2800Wz++LTGK4pitW/iswpCbjwxhsmUwleL1YXaHImptCHG0vJwU7Ly7ROw3ZQoww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (uservisiteur) => {

            $("#text-edit-user").text("Modifier le visiteur: " + ($(uservisiteur).attr("uservisiteurnom")));


            $("#edit-nom").val(($(uservisiteur).attr("uservisiteurnom")));
            $("#edit-nom").prop("disabled",false);


            $("#edit-prenom").val(($(uservisiteur).attr("uservisiteurprenom")));
            $("#edit-prenom").prop("disabled",false);

            $("#edit-password").val(($(uservisiteur).attr("uservisiteurpassword")));
            $("#edit-password").prop("disabled",false);

            $("#edit-region").val(($(uservisiteur).attr("uservisiteuridregion")));
            $("#edit-region").prop("disabled",false);


            $("#edit-telephone").val(($(uservisiteur).attr("uservisiteurtelephone")));
            $("#edit-telephone").prop("disabled",false);


            $("#edit-email").val(($(uservisiteur).attr("uservisiteuremail")));
            $("#edit-email").prop("disabled",false);

            $("#edit-adresse").val(($(uservisiteur).attr("uservisiteuradresse")));
            $("#edit-adresse").prop("disabled",false);


            $("#edit-codePostal").val(($(uservisiteur).attr("uservisiteurcodePostal")));
            $("#edit-codePostal").prop("disabled",false);

            $("#edit-idregion").val(($(uservisiteur).attr("uservisiteuridRegion")));
            $("#edit-idregion").prop("disabled",false);


            $("#edit-id").val(($(uservisiteur).attr("uservisiteurid")));
            $("#edit-id").prop("disabled",false);

            $("#btn-update").show();
            $("#btn-delete").attr("href", "/Addvisiteur/Delete/" + $(uservisiteur).attr("uservisiteurid"));

        }
        view = (uservisiteur) => {
            edit(uservisiteur);
            $("#text-edit-user").text("Voir la fiche du praticien : " + ($(uservisiteur).attr("uservisiteurnom")));
            $("#edit-nom").prop("disabled",true);
            $("#edit-prenom").prop("disabled",true);
            $("#edit-password").prop("disabled",true);
            $("#edit-region").prop("disabled",true);
            $("#edit-telephone").prop("disabled",true);
            $("#edit-email").prop("disabled",true);
            $("#edit-adresse").prop("disabled",true);
            $("#edit-codePostal").prop("disabled",true);
            $("#edit-id").prop("disabled",true);
            $("#edit-idregion").prop("disabled",true);

            $("#btn-update").hide();
            $("#btn-delete").attr("href", "/Addvisiteur/Delete/" + $(uservisiteur).attr("uservisiteurid"));

        }


    })

    test = () => {
        console.log("coucou")
        console.log($('#form-create').val())
        $(this).find('#form-create').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                }
            }
        })
    }


</script>
<section>
    <?= $session->getFlashdata("message") ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div class="card shadow mb-4">


            <div class = "margin-top row pb-3 pt-2 pl-100">

                <div class = "col-md-3 center">
                    <button class = "btn btn-info" data-toggle = "modal" data-target = "#add-user" onclick="test()"><b>Ajouter un nouveau visiteur <i class = "fas fa-plus icon"></i></b></button>
                </div>
            </div>

            <form method = "post" action = "/Addvisiteur/Create" id="form-create">
                <div class="modal" tabindex="-1" role="dialog" id = "add-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title light-dark">
                                    <b>Ajouter un nouveau visiteur</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <select class="form-control" id="creat-region" name="idRegion">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeRegion as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nom']; ?></option>

                                    <?php } ?>
                                </select>

                                <div class = "form-group">
                                    <label class = "light-dark">Nom</label>
                                    <input class = "form-control" name = "name" required placeholder = "Ex: John Wick" id="create-name">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Prénom</label>
                                    <input class = "form-control" name = "prenom" required id="create-prenom">
                                </div>


                                <div class = "form-group">
                                    <label class = "light-dark">Password / Confirm Password</label>
                                    <input class = "form-control" type="password" name = "password" placeholder="Password" required id="create-password">
                                </div>
                                <div class="form-group">
                                     <input class = "form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required id="create-confirmpassword"  >
                                </div>


                                <div class = "form-group">
                                    <label class = "light-dark">Téléphone</label>
                                    <input class = "form-control" name = "telephone" required type = "number" id="create-telephone">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">E-mail</label>
                                    <input class = "form-control" name = "email" required type = "email" placeholder = "Example: john@wick.com" id="create-email">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Adresse</label>
                                    <input class = "form-control" name = "adresse" required id="create-adresse" >
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Code postal</label>
                                    <input class = "form-control" name = "cp" required type = "number"  id="create-cp">
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



            <form method = "post" action = "/Addvisiteur/Update">
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
                                <select class="form-control" id="edit-region" name="idRegion">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeRegion as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nom']; ?></option>

                                    <?php } ?>
                                </select>

                                <div class = "form-group">
                                    <label class = "light-dark">Nom</label>
                                    <input class = "form-control" name = "name" required placeholder = "Ex: John Wick" id = "edit-nom">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Prénom</label>
                                    <input class = "form-control" name = "prenom" required id = "edit-prenom">
                                </div>

                                <div class = "form-group">
                                    <label class = "light-dark">Password / Confirm Password</label>
                                    <input class = "form-control" type="password" name = "password" placeholder="Password" required id = "edit-password">
                                </div>
                                <div class="form-group">
                                    <input class = "form-control" type="password" name="confirmpassword" placeholder="Confirm Password" class="form-confirmpass" >
                                </div>



                                <div class = "form-group">
                                    <label class = "light-dark">Téléphone</label>
                                    <input class = "form-control" name = "telephone" required type = "number" id = "edit-telephone">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">E-mail</label>
                                    <input class = "form-control" name = "email"  type = "email" placeholder = "Example: john@wick.com" id = "edit-email" required>
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Adresse</label>
                                    <input class = "form-control" name = "adresse" required id = "edit-adresse">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Code postal</label>
                                    <input class = "form-control" name = "cp" required type = "number" id = "edit-codePostal">
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
                        <th>Mdp</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Region</th>
                        <th>Modifier</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($listeVisiteur as $uservisiteur) : ?>
                        <tr>
                            <td><?= $uservisiteur["name"]?></td>
                            <td><?= $uservisiteur["prenom"]?></td>
                            <td><?= $uservisiteur["password"]?></td>
                            <td><?= $uservisiteur["telephone"]?></td>
                            <td><?= $uservisiteur["email"]?></td>
                            <td><?= $uservisiteur["adresse"]?></td>
                            <td><?= $uservisiteur["cp"]?></td>
                            <td><?= $uservisiteur["idRegion"]?></td>
                            <td>
                                <button  uservisiteurnom = "<?= $uservisiteur["name"] ?>" uservisiteurprenom = "<?= $uservisiteur["prenom"] ?>"  uservisiteurtelephone = "<?= $uservisiteur["telephone"] ?>" uservisiteuremail = "<?= $uservisiteur["email"] ?>" uservisiteuradresse = "<?= $uservisiteur["adresse"] ?>" uservisiteurcodePostal = "<?= $uservisiteur["cp"] ?>"   uservisiteurid = "<?= $uservisiteur["id"] ?>"  uservisiteuridRegion = "<?= $uservisiteur["idRegion"] ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                                <button  uservisiteurnom = "<?= $uservisiteur["name"] ?>" uservisiteurprenom = "<?= $uservisiteur["prenom"] ?>"  uservisiteurtelephone = "<?= $uservisiteur["telephone"] ?>" uservisiteuremail = "<?= $uservisiteur["email"] ?>" uservisiteuradresse = "<?= $uservisiteur["adresse"] ?>" uservisiteurcodePostal = "<?= $uservisiteur["cp"] ?>"   uservisiteurid = "<?= $uservisiteur["id"] ?>"  uservisiteuridRegion = "<?= $uservisiteur["idRegion"] ?>" onclick = "view(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-eye"></i></b></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>