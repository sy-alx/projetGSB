
<section>
    <h1>Consultation</h1>

    <div id="content-wrapper" class="d-flex flex-column">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de visite</th>
                            <th>Date du compte-rendu</th>
                            <th>Remplacant</th>
                            <th>Motif</th>
                            <th>Modifier</th>
                          

                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($compteRendu as $row) { ?>
                            <tr>
                                <td><?= $row['nom'] ?></td>
                                <td><?= $row['prenom'] ?></td>
                                <td><?= $row['DateCR'] ?></td>
                                <td><?= $row['Datevisite'] ?></td>
                                <td><?= $row['nomRemplacant'] ?></td>
                                <td><?= $row['motif'] ?></td>

                                <td>
                                    <button nom = "<?= $row['nom'] ?>" useremail = "<?= $row['prenom'] ?>" username = "<?= $row['DateCR'] ?>" userid = "<?= $user->id ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                            </tr>
                        <?php } ?>



                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form method = "post" action = "/users/update">
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
                            <label class = "light-dark">Age</label>
                            <input class = "form-control" name = "age" required type = "number" id = "edit-age">
                        </div>
                        <div class = "form-group">
                            <label class = "light-dark">E-mail</label>
                            <input class = "form-control" name = "email" required type = "email" placeholder = "Example: john@wick.com" id = "edit-email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancel</b></button>
                        <a id = "btn-delete"><button type = "button" class="btn btn-danger"><b>Delete <i class = "fas fa-info icon"></i></b></button></a>
                        <button type="submit" class="btn btn-success"><b>Update <i class = "fas fa-check-double icon"></i></b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {
            $("#text-edit-user").text("Edit " + ($(user).attr("nom")));
            $("#edit-nom").val(($(user).attr("nom")));
            $("#edit-age").val(($(user).attr("userage")));
            $("#edit-email").val(($(user).attr("useremail")));
            $("#edit-id").val(($(user).attr("userid")));
            $("#btn-delete").attr("href", "/users/delete/" + $(user).attr("userid"));

        }

    })
</script>