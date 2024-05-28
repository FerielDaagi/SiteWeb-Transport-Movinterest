<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integration";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $mdp = $_POST['mdp'];

  // Use prepared statement to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM user WHERE email_user=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  if ($row) {
    // Compare plain text passwords
    if ($mdp === $row['mdp_user']) {
      $_SESSION['email'] = $row['email_user'];
      $_SESSION['role'] = $row['role_user'];

      $role = $row['role_user'];
      if ($role === 'A') {
        header('Location: ../listeuser.php');
        exit();
      }
      if ($role === 'B') {
        header('Location: http://localhost/test/pmv/view/Front_office/acceuilB.php');
        exit();
      }
      if ($role === 'T') {
        header('Location: http://localhost/test/taxifi/Dashboard/View/material-dashboard-master/pages/AjouterTaxi.php');
        exit();
      }

    } else {
      echo "<script>  window.alert('Veuillez vérifier vos données') </script>";
    }
  } else {
    echo "<script>  window.alert('Veuillez vérifier vos données') </script>";
  }

  $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Se connecter">
  <meta name="description" content="">
  <title>Contact</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Contact.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.20.7, nicepage.com">
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">



  <script type="application/ld+json">{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": ""
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Contact">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">
  <header class="u-clearfix u-header u-hidden-md u-header" id="sec-29c2">
    <div class="u-clearfix u-sheet u-sheet-1">
      <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
        <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
            href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px"
              xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="Contact.php" style="padding: 18px 70px;">Se connecter</a>
            </li>
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="acceuil.html" style="padding: 18px 70px;">Accueil</a>
            </li>
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="Sinscrire.php" style="padding: 18px 70px;">s'inscrire</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Se connecter</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="acceuil.html">Accueil</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Sinscrire.php">s'inscrire</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
      <img class="u-expanded-height u-image u-image-contain u-image-default u-image-1"
        src="images/22463878_1144-Converti.png" alt="" data-image-width="344" data-image-height="316">
    </div>
  </header>
  <section class="u-clearfix u-section-1" id="carousel_adab">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="data-layout-selected u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h2 class="u-align-left u-custom-font u-font-montserrat u-text u-text-1">Se connecter</h2>
                <div class="custom-expanded u-align-left u-form u-form-1">
                  <form method="post" style="padding: 0px;" source="email" name="form">
                    <div class="u-form-group u-form-name u-label-top">
                      <label for="email" class="u-label" wfd-invisible="true">Email *</label>
                      <input type="email" placeholder="votre adresse e-mail" id="email" name="email"
                        class="u-border-none u-grey-5 u-input u-input-rectangle u-radius-7 u-input-1" required="">
                    </div>
                    <div class="u-form-email u-form-group u-label-top">
                      <label for="mdp" class="u-label" wfd-invisible="true">Mot de passe *</label>
                      <input type="text" placeholder="Votre Mot de passe" id="mdp" name="mdp"
                        class="u-border-none u-grey-5 u-input u-input-rectangle u-radius-7 u-input-2" required="">
                    </div>
                    <ul></ul>
                    <div class="u-align-right u-form-group u-form-submit u-label-top">
                      <button
                        class="u-active-black u-border-none u-btn u-btn-round u-btn-submit u-button-style u-hover-black u-palette-3-base u-radius-7 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1"
                        type="button" onclick="checkCredentials()">Se connecter</button>
                      <input type="submit" value="submit" name="submit" class="u-form-control-hidden"
                        wfd-invisible="true">
                    </div>
                    <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message
                      has been sent. </div>
                    <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your
                      message. Please fix errors then try again. </div>

                  </form>
                </div>
                <ul></ul>
                <ul></ul>
                <div class="u-align-left u-social-icons u-spacing-25 u-social-icons-1">
                  <a class="u-social-url" target="_blank" href=""><span
                      class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link"
                        preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1a31"></use>
                      </svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-1a31" class="u-svg-content">
                        <circle fill="#3B5998" cx="56.1" cy="56.1" r="55"></circle>
                        <path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path>
                      </svg></span>
                  </a>
                  <a class="u-social-url" target="_blank" href=""><span
                      class="u-icon u-icon-circle u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link"
                        preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5f00"></use>
                      </svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-5f00" class="u-svg-content">
                        <circle fill="#55ACEE" class="st0" cx="56.1" cy="56.1" r="55"></circle>
                        <path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path>
                      </svg></span>
                  </a>
                  <a class="u-social-url" target="_blank" href=""><span
                      class="u-icon u-icon-circle u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link"
                        preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-da20"></use>
                      </svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-da20" class="u-svg-content">
                        <circle fill="#C536A4" cx="56.1" cy="56.1" r="55"></circle>
                        <path fill="#FFFFFF"
                          d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z">
                        </path>
                        <path fill="#FFFFFF"
                          d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z">
                        </path>
                        <path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path>
                      </svg></span>
                  </a>
                  <a class="u-social-url" target="_blank" href=""><span
                      class="u-icon u-icon-circle u-social-icon u-social-linkedin u-icon-4"><svg class="u-svg-link"
                        preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3d57"></use>
                      </svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-3d57" class="u-svg-content">
                        <circle fill="#007AB9" cx="56.1" cy="56.1" r="55"></circle>
                        <path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path>
                      </svg></span>
                  </a>
                  <a class="u-social-url" target="_blank" href=""><span
                      class="u-icon u-icon-circle u-social-google u-social-icon u-icon-5"><svg class="u-svg-link"
                        preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4444"></use>
                      </svg><svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-4444" class="u-svg-content">
                        <circle fill="#DC4E41" cx="56.1" cy="56.1" r="55"></circle>
                        <path fill="#FFFFFF" d="M60.8,76.3c-6.6,8.6-19,11.1-29,7.7c-10.6-3.5-18.4-14.2-18.2-25.5C13,44.6,25.3,31.8,39.1,31.6
            c7.1-0.6,14,2.1,19.3,6.6c-2.2,2.4-4.4,4.8-6.9,7.1c-4.8-2.9-10.4-5-15.9-3.1c-8.8,2.6-14.3,13-10.9,21.8
            c2.7,9.1,13.7,14.1,22.5,10.2c4.5-1.6,7.5-5.7,8.7-10.2c-5.1-0.1-10.2,0-15.5-0.2c0-3,0-6.1,0-9.2c8.6,0,17.1,0,25.7,0
            C66.7,62.3,65.5,70.4,60.8,76.3z M98.3,62.5c-2.6,0-5.1,0-7.7,0c0,2.6,0,5.1,0,7.7c-2.6,0-5.1,0-7.7,0c0-2.6,0-5.1,0-7.7
            c-2.6,0-5.1,0-7.7,0c0-2.6,0-5.1,0-7.7c2.6,0,5.1,0,7.7,0c0-2.6,0-5.1,0.1-7.7c2.6,0,5.1,0,7.7,0c0,2.6,0,5.1,0,7.7
            c2.6,0,5.1,0,7.7,0C98.3,57.3,98.3,59.9,98.3,62.5z"></path>
                      </svg></span>
                  </a>
                </div>
                <p class="u-align-center u-text u-text-2">
                  <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-palette-3-dark-2 u-text-palette-3-base u-btn-3"
                    data-href="forgetmdp.php" target="_blank">mot de passe oublié ?</a>
                </p>
                <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-palette-3-dark-2 u-text-palette-3-base u-btn-3"
                  data-href="Sinscrire.php" target="_blank">Créer un nouveau compte</a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2" data-animation-name=""
              data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
              <div class="u-container-layout u-container-layout-2">
                <img class="custom-expanded u-image u-image-1" src="images/ccer.jpg" data-image-width="800"
                  data-image-height="824">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-deb9">
    <div class="u-clearfix u-sheet u-sheet-1"></div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span>
    </a>.
  </section>

</body>

</html>

<?php

if (isset($_POST['email'], $_POST['mdp'])) {
  $stmt = $pdo->prepare('SELECT mdp_user FROM user WHERE email_user = ?');
  $stmt->execute([$_POST['email']]);
  $hashedPassword = $stmt->fetchColumn();

  if ($_POST['mdp'] === $hashedPassword) {
    echo "Connexion réussite";
  } else {
    echo "Mot de passe incorrect";
  }
}
?>