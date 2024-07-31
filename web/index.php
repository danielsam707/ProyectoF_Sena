<?php
include_once "../lib/helpers.php";
include_once "../view/partials/header.php";

echo "<body>";
// echo "<div class='container'>";
include_once "../view/partials/navbar.php";
if (isset($_GET["modulo"])) {
    resolve();
}
if (!isset($_SESSION['auth'])) {
    redirect("login.php");
} else {

    // header('Location: ../web/loginE-commerce.php');
    // exit;
}
// echo "</div>";
include_once "../view/Home/Home.php";
include_once "../view/partials/footer.php";

//include_once "../web/e-commerce/loginE-commerce.php";
echo "</body>";
echo "</html>";
