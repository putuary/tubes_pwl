<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

    <title>Hello Futsal</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container h-100">
        <div class="row align-items-center h-100 align-middle">
            <div class="col-6 mx-auto">
                <div class="class">
                    <center>
                        <h3>LOGIN</h3>
                    </center><br />
                    <?php if (session()->has('error')) : ?>
                        <p class="text-danger text-center"><?= session()->getFlashdata('error') ?></p>
                    <?php endif; ?>

                    <?php $validation = session()->getFlashdata('validation'); ?>

                    <form action="<?= current_url() ?>" method="POST">
                        <div class="form-group">

                            <label for="" class="form-label">User</label>
                            <input value="<?= old('username') ?>" autocomplete="off" autofocus="on" type="text" name="username" id="username" class="form-control <?= $validation && $validation->hasError('username') ? 'is-invalid' : '' ?>">
                            <?php if ($validation && $validation->hasError('username')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input value="<?= old('password') ?>" type="password" name="password" id="password" class="form-control <?= $validation && $validation->hasError('password') ? 'is-invalid' : '' ?>">
                            <?php if ($validation && $validation->hasError('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="btn btn-success btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>