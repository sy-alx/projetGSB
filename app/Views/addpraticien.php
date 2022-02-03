<?= $session->getFlashdata("message") ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(() => {

        /* config fields to update/delete a user */
        edit = (user) => {

            $("#text-edit-user").text("Edit " + ($(user).attr("username")));
            $("#edit-name").val(($(user).attr("username")));
            $("#edit-age").val(($(user).attr("userage")));
            $("#edit-email").val(($(user).attr("useremail")));
            $("#edit-id").val(($(user).attr("userid")));
            $("#btn-delete").attr("href", "/Addpraticien/Delete/" + $(user).attr("userid"));

        }

    })
</script>
<section>
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="card shadow mb-4">


            <div class = "margin-top row pb-3 pt-2">
                <div class = "col-md-3 center">
                    <h3 class = "light-dark">Ajouter des praticiens</h3>
                </div>
                <div class = "col-md-3 center">
                    <button class = "btn btn-info" data-toggle = "modal" data-target = "#add-user"><b>Add user <i class = "fas fa-plus icon"></i></b></button>
                </div>
            </div>


            <form method = "post" action = "/Addpraticien/Create">
                <div class="modal" tabindex="-1" role="dialog" id = "add-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title light-dark">
                                    <b>Add new User</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class = "form-group">
                                    <label class = "light-dark">Name</label>
                                    <input class = "form-control" name = "name" required placeholder = "Ex: John Wick">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">Age</label>
                                    <input class = "form-control" name = "age" required type = "number">
                                </div>
                                <div class = "form-group">
                                    <label class = "light-dark">E-mail</label>
                                    <input class = "form-control" name = "email" required type = "email" placeholder = "Example: john@wick.com">
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
                                    <input class = "form-control" name = "name" required placeholder = "Ex: John Wick" id = "edit-name">
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

            <div class = "margin-top">
                <table class = "table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>E-mail</th>
                        <th>Edit</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($users2 as $user) : ?>
                        <tr>
                            <td><?= $user->name?></td>
                            <td><?= $user->age?></td>
                            <td><?= $user->age?></td>
                            <td><?= $user->email?></td>
                            <td>
                                <button userage = "<?= $user->age ?>" useremail = "<?= $user->email ?>" username = "<?= $user->name ?>" userid = "<?= $user->id ?>" onclick = "edit(this)" data-toggle = "modal" data-target = "#edit-user" class = "btn btn-sm btn-primary"><b><i class = "fas fa-bars"></i></b></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>