
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


                        <?php foreach ($compteRendu as $row) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['Praticien'] ?></td>
                                <td><?= $row['Datevisite'] ?></td>
                                <td><?= $row['texte'] ?></td>
                                <td><?= $row['Datevisite'] ?></td>
                                <td><?= $row['DateCR'] ?></td>
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
    </div>
</section>