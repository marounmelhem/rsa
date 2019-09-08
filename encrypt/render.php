<?php
/**
 * Encrypt Render
 *
 * @package  RSA Demo
 * @developer  Maroun Melhem <http://maroun.me>
 *
 */
include('../includes/functions/helpers.php');
/*Get vals*/
$prime_1 = strip_tags($_POST['prime_1']);
$prime_2 = strip_tags($_POST['prime_2']);
$message = strip_tags($_POST['message']);

/*Error flag*/
$error = 0;
$error_type = "";


/*Prime 1 checker*/
if ($prime_1) {
    if (!is_prime($prime_1)) {
        $error = 1;
        $error_type = "prime_1_not_prime";
    }
} else {
    $error = 1;
    $error_type = "prime_1_empty";
}


/*Prime 2 checker*/
if ($prime_2) {
    if (!is_prime($prime_2)) {
        $error = 1;
        $error_type = "prime_2_not_prime";
    }
} else {
    $error = 1;
    $error_type = "prime_2_empty";
}

/*Message checker*/
if (!$message) {
    $error = 1;
    $error_type = "message_empty";
}
?>
<?php
include('../includes/templates/header.php');
?>
<div class="inner_container encrypt render">
    <h2><a href="/encrypt" class="btn btn-info">Back</a></h2>
    <?php
    if (!$error) {
        ?>
        <div class="alert alert-success">
            <?php
            echo "Encrypting message";
            //            echo encrypt_rsa("maroun", "123123");
            ?>
        </div>
        <?php
    } else {
        switch ($error_type):
            case "prime_1_not_prime":
                ?>
                <div class="alert alert-danger">
                    1st number is not a prime number
                </div>
                <?php
                break;

            case "prime_2_not_prime":
                ?>
                <div class="alert alert-danger">
                    2nd number is not a prime number
                </div>
                <?php
                break;

            case "prime_1_empty":
                ?>
                <div class="alert alert-danger">
                    1st number is empty
                </div>
                <?php
                break;
            case "prime_2_empty":
                ?>
                <div class="alert alert-danger">
                    2nd number is empty
                </div>
                <?php
                break;

            case "message_empty":
                ?>
                <div class="alert alert-danger">
                    Message is empty
                </div>
                <?php
                break;

            default:
                ?>
                <div class="alert alert-danger">
                    Unknown Error
                </div>
            <?php

        endswitch;
    }
    ?>
</div>
<?php
include('../includes/templates/footer.php');
?>
