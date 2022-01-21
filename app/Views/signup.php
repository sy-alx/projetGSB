<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Codeigniter Auth User Registration Example</title>
</head>

 <section class="bg-gradient-primary">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Créer votre compte </h1>
                                        </div>
                                        <?php if(isset($validation)):?>
                                            <div class="alert alert-warning">
                                                <?= $validation->listErrors() ?>
                                            </div>
                                        <?php endif;?>

                                        <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                                            <div class="form-group mb-3">
                                                <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                                            </div>

                                            <div class="form-group mb-3">
                                                <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                                            </div>

                                            <div class="form-group mb-3">
                                                <input type="password" name="password" placeholder="Password" class="form-control" >
                                            </div>

                                            <div class="form-group mb-3">
                                                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Signup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 </section>



