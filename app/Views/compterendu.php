<section>
    <form method="post" action="/CompteRendu/formulairecontact" id="form_contact">
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Compte rendu</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <?php if (isset($_GET['is_valid']) and $_GET['is_valid'] == 0) { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                            <div class="alert alert-danger" role="alert">
                                                Vous n'avez pas rempli tout les champs, pensez à vérifier avant d'envoyer.
                                            </div>
                                        </div><!-- /.col-lg-8 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            <?php } else if (isset($_GET['is_valid']) and $_GET['is_valid'] == 1) { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                            <div class="alert alert-success" role="alert">
                                                Le compte rendu a bien été enregistré, retrouvez-le dans l'onglet consultation
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
                                <label for="exampleFormControlSelect1">Remplaçant</label>

                                <select class="form-control" id="Remplacant" name="Remplacant">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeRemplacant as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nomRemplacant']. " ".$row['prenomRemplacant'] ; ?></option>
                                    <?php } ?>
                                </select>
                            </div>




                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Impact visite sur 10</label> </br>

                                <input type="number" id="ImpacteVisite" name="ImpacteVisite" min="1" max="10">

                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Coefficient de confiance sur 10</label> </br>

                                <input type="number" id="CoefConf" name="CoefConf" min="1" max="10">

                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Echantillons médicament </label>

                                <select class="form-control" id="idEchantillon" name="idEchantillon">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeMedicament as $row) { ?>

                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['MED_NOMCOMMERCIAL'];?></option>

                                    <?php } ?>
                                </select>
                                <label for="exampleFormControlSelect1">Nombre donné </label>
                                <input type="number" id="MED_NOMBRECHANTILLON" name="MED_NOMBRECHANTILLON">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Motif de la visite</label>

                                <select class="form-control" id="MotifVisite" name="MotifVisite">

                                    <option value="">-- Sélection --</option>
                                    <?php foreach ($listeMotifVisite as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['motif']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date prochaine visite :</label>
                                <input type="date" id="dateRdv" name="dateRdv">
                                <input type="number" id="heureRdv" name="heureRdv" min="8" max="18" style="display: none;">
                                <p id="heureRdvText" style="display: none;">h</p>
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
                                    </div>
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
    </form>


</section>

<script>
    heureRdv = document.querySelector('#heureRdv');
    heureRdvText = document.querySelector('#heureRdvText');
    isHourRequired = document.querySelector('#dateRdv');

    //Empêcher d'insérer des données extérieur à 8-18
    heureRdv.addEventListener('change', function(){
        if(heureRdv.value<8){
            heureRdv.value = 8;
        }else if(heureRdv.value>18){
            heureRdv.value = 18;
        }
    })

    //Pour afficher ou cacher le champ "heure" si une date pour prochain rdv est sélectionné
    isHourRequired.addEventListener('change',function(){
        if(isHourRequired.value == ""){
            heureRdv.style.display="none";
            heureRdvText.style.display="none";
        }else{
            heureRdv.style.display="inline";
            heureRdvText.style.display="inline";
        }
    })
</script>
