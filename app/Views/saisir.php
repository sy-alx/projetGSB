<section>
    <form method="post" action="/SaisirController/store" id="form_contact">
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">


                              <div class="form-group">
                                  <label for="start">Date de visite:</label>
                                  <input type="date" id="DateVisite" name="Datevisite" value="2022-07-22" min="2018-01-01" max="2018-12-31">
                              </div>
                              <div class="form-group">
                                  <label for="start">Date de compte rendu:</label>
                                  <input type="date" id="DateCR" name="DateCR" value="<php echo date(); ?>" min="2018-01-01" max="2018-12-31" disabled>
                              </div>

                             <!--    <fieldset class="form-group">
                                      <div class="row">
                                          <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                          <div class="col-sm-10">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
                                                  <label class="form-check-label" for="gridRadios1">
                                                      First radio
                                                  </label>
                                              </div>
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                                                  <label class="form-check-label" for="gridRadios2">
                                                      Second radio
                                                  </label>
                                              </div>
                                              <div class="form-check disabled">
                                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3" disabled>
                                                  <label class="form-check-label" for="gridRadios3">
                                                      Third disabled radio
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </fieldset> -->

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Praticien</label>
                                <select class="form-control" id="Praticien" name="Praticien">
                                    <option value="a">1</option>
                                    <option value="b">2</option>
                                    <option value="c">3</option>
                                    <option value="d">4</option>
                                    <option value="e">5</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Remplacant</label>
                                <select class="form-control" id="Remplacant" name="Remplacant">
                                    <option value="a">1</option>
                                    <option value="B">2</option>
                                    <option value="c">3</option>
                                    <option value="D">4</option>
                                    <option value="e">5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start">Impacte de la visite :</label> <br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ImpacteVisite" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">1 <i class="fas fa-frown"></i></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ImpacteVisite" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">2 <i class="fas fa-meh"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ImpacteVisite" id="inlineRadio2" value="3">
                                    <label class="form-check-label" for="inlineRadio2">3<i class="fas fa-smile"></i></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start">Coefficient de confiance :</label> <br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="CoefConf" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">1 <i class="fas fa-frown"></i></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="CoefConf" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">2 <i class="fas fa-meh"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="CoefConf" id="inlineRadio2" value="3">
                                    <label class="form-check-label" for="inlineRadio2">3<i class="fas fa-smile"></i></label>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Motif de la visite (deroulant)</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="MotifVisite">
                                    <option value="a">Périodicité</option>
                                    <option value="b">Nouveautés / Actualisation</option>
                                    <option value="c">Demande venant du médecin</option>
                                    <option value="d">Autres</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Compte rendu de la visite :</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texte"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                 <span class="text">Split Button Success</span>

                            </span>
                            </button>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>


