<section>
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="card shadow mb-4">
            <form method="post" action="/Medicament/formulairecontact" id="form_contact">
                <div id="content-wrapper" class="d-flex flex-column">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (isset($_GET['is_valid']) and $_GET['is_valid'] == 0) { ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                                    <div class="alert alert-danger" role="alert">
                                                        Vous n'avez pas rempli tout les champs putain attention  !
                                                    </div>
                                                </div><!-- /.col-lg-8 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.container -->
                                    <?php } else if (isset($_GET['is_valid']) and $_GET['is_valid'] == 1) { ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                                    <div class="alert alert-success" role="alert">
                                                        This is a success alert—check it out!
                                                    </div>
                                                </div><!-- /.col-lg-8 -->
                                            </div><!-- /.row -->
                                        </div><!-- /.container -->
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="start">Nom médicament:</label>
                                        <input type="input" id="DateVisite" name="nom" placeholder="nom medicament">

                                        <label for="start">gramme:</label>
                                        <input type="input" id="DateVisite" name="lorem" placeholder="gramme">
                                    </div>



                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="2222" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        First radio
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="211111">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Second radio
                                                    </label>
                                                </div>
                                                <div class="form-check disabled">
                                                    <input class="form-check-input" type="radio" name="type" id="gridRadios3" value="3"  >
                                                    <label class="form-check-label" for="gridRadios3">
                                                        Third disabled radio
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="col-sm-12 col-md-12 col-lg-6">

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Note :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                        </div>
                                    </div>





                                    <div class="form-check form-check-inline">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                                <button class="btn btn__rounded btn__primary btn__hover3"  type="reset" >Rafraîchir</button>
                                            </div
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-paper-plane"></i>
                                        </span>
                                         <button   class="btn btn__rounded btn__primary btn__hover3" id="buttontest" onclick="$( '#form_contact' ).submit();">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    </form>




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
                        <th>ID</th>
                        <th>Praticien</th>
                        <th>Date de visite</th>
                        <th>Cp</th>
                        <th>Date compte rendu</th>
                        <th>Ouvrir</th>
                        <th>Modifier</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php foreach ($medicamentProduit as $row) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nom'] ?></td>
                            <td><?= $row['type'] ?></td>
                            <td><?= $row['lorem'] ?></td>
                            <td><?= $row['note'] ?></td>
                            <td>
                                <button><i class="fas fa-user-edit"></i></button></td>
                        </tr>
                    <?php } ?>



                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
