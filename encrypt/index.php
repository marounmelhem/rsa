<?php
/**
 * Encrypt
 *
 * @package  RSA Demo
 * @developer  Maroun Melhem <http://maroun.me>
 *
 */
include('../includes/templates/header.php');
include('../includes/functions/helpers.php');
?>
<div class="inner_container encrypt">
    <form method="post" action="render.php" style="width:100%;max-width: 400px;margin:50px auto;">
        <h2>RSA Encrypter <a href="/rsa-project" class="btn btn-info">Back</a></h2>
        <div class="form-group">
            <label>1st Prime Number</label>
            <input name="prime_1" type="number" class="form-control" placeholder="Enter any number"/>
        </div>
        <div class="form-group">
            <label>2nd Prime Number</label>
            <input name="prime_2" type="number" class="form-control" placeholder="Enter any number"/>
        </div>
        <div class="form-group">
            <label>Message</label>
            <input name="message" type="text" class="form-control" placeholder="Text you want to encrypt"/>
        </div>
        <div class="form-group">
            <input name="submit" type="submit" value="Submit" class="btn btn-primary"/>
        </div>
    </form>
</div>
<?php
include('../includes/templates/footer.php');
?>