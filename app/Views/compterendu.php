<section>
    <form method="post" action="/CompteRendu/formulairecontact" id="form_contact">
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

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
                                <label for="start">Date de visite:</label>
                                <input type="date" id="DateVisite" name="Datevisite" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('-1 year')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="start">Date de compte rendu:</label>
                                <input type="date" id="DateCR" name="DateCR" value="<?php echo date('Y-m-d'); ?>">
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Praticien</label>

                                <select class="form-control" id="Praticien" name="Praticien">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listePraticien as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nom']." ".$row['prenom']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Remplacant</label>

                                <select class="form-control" id="Remplacant" name="Remplacant">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeRemplacant as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nomRemplacant']. " ".$row['prenomRemplacant'] ; ?></option>
                                    <?php } ?>
                                </select>
                            </div>





                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Impacte visite: </label>

                                <select class="form-control" id="ImpacteVisite" name="ImpacteVisite">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeImpacteVisite as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['motif'];?></option>

                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Coefficient de confiance : </label>

                                <select class="form-control" id="CoefConf" name="CoefConf">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeCoefConf as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['motif'];?></option>

                                    <?php } ?>
                                </select>
                            </div>






                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Motif de la visite (deroulant)</label>

                                <select class="form-control" id="MotifVisite" name="MotifVisite">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeMotifVisite as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['motif']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group">
                                    <label for="exampleFormControlSelect1">Compte rendu de la visite :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texte"></textarea>
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


</section>


