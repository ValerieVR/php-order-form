<?php // This files is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
    <title>Cupcake Store</title>
</head>
<body>
    <div class="form-box">
    <div class="alert alert-danger" role="alert" <?php echo "style=display:none"; if (isset($_POST["submit"])) {if ($errors > 0) {echo "style=display:block";}}?>>
        <p class="mb-0">Something went wrong! Please check the required fields.</p>
    </div>
        <div class="alert alert-success" role="alert" <?php echo "style=display:none"; if (isset($_POST["submit"])) {if ($errors === 0) {echo "style=display:block";}} ?>>
            <h4 class="mb-2 alert-heading">Order Confirmation</h4>
            <p class="mb-0 font-weight-bold">Cupcakes of choice:</p>
            <?php if (isset($_POST["submit"])) {
                cupcakesOfChoice();
            }?>
            <hr>
            <p class="mb-0 font-weight-bold">Cupcakes will be sent to:</p>
            <?php if (isset($_POST["submit"])) {
                sentCupcakesTo();
            }?>
            <hr>
            <p>You ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</p>
        </div>
        <div class="container">
            <h1>Place your order</h1>
            <?php // Navigation for when you need it ?>
            <?php /*
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="?food=1">Order food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?food=0">Order drinks</a>
                    </li>
                </ul>
            </nav>
            */ ?>
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">E-mail:<strong class="invalid"><?php echo $emailInvalid;?></strong></label>
                        <input type="email" id="email" name="email" value="<?php if (isset($_SESSION["email"]) && $errors > 0) {echo $_SESSION["email"];} ?>" class="form-control"/>
                    </div>
                    <div></div>
                </div>

                <fieldset>
                    <legend>Address</legend>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="street">Street:<strong class="invalid"><?php echo $streetInvalid;?></strong></label>
                            <input type="text" name="street" value="<?php if (isset($_SESSION["street"]) && $errors > 0) {echo $_SESSION["street"];} ?>"  id="street" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="streetnumber">Street number:<strong class="invalid"><?php echo $streetnumberInvalid;?></strong></label>
                            <input type="text" id="streetnumber" name="streetnumber" value="<?php if (isset($_SESSION["streetnumber"]) && $errors > 0) {echo $_SESSION["streetnumber"];} ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City:<strong class="invalid"><?php echo $cityInvalid;?></strong></label>
                            <input type="text" id="city" name="city" value="<?php if (isset($_SESSION["city"]) && $errors > 0) {echo $_SESSION["city"];} ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zipcode">Zipcode:<strong class="invalid"><?php echo $zipcodeInvalid;?></strong></label>
                            <input type="text" id="zipcode" name="zipcode" value="<?php if (isset($_SESSION["zipcode"]) && $errors > 0) {echo $_SESSION["zipcode"];} ?>"  class="form-control">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Products<strong class="invalid"><?php echo $productsInvalid;?></strong></legend>
                    <?php foreach ($products as $i => $product): ?>
                        <label>
                            <?php // <?p= is equal to <?php echo ?>
                            <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                            &euro; <?= number_format($product['price'], 2) ?></label><br />
                    <?php endforeach; ?>
                </fieldset><br>

                <button type="submit" name="submit" class="btn btn-primary">Order!</button>
            </form>
        </div>
    </div>
    <style>
        body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        background-image: url(images/cupcake.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        color: red;
        }

        .form-box {
        width: 600px;
        margin-left: 150px;
        margin-top: 30px;
        color: #ffffff;
        }

        .invalid {
            color: #ff5733;
        }
    </style>
</body>
</html>