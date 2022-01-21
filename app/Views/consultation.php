
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
                                    <!-- <a href="<?= base_url('/EditController'.$row['id']) ?>" class="fas fa-user-edit"></a> -->
                                    <button><i class="fas fa-user-edit"></i></button></td>
                            </tr>
                        <?php } ?>



                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>