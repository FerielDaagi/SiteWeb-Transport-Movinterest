<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
  exit();
}

?>

<!DOCTYPE html>
<html style="font-size: 16px" lang="fr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta name="keywords" content="____________________, ​Location de trottinettes électriques" />
  <meta name="description" content="" />
  <title>Page 1</title>
  <link rel="stylesheet" href="nicepage.css" media="screen" />
  <link rel="stylesheet" href="Page-1.css" media="screen" />
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 6.0.3, nicepage.com" />
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" />

  <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "",
        "logo": "images/logo.group.png",
        "sameAs": [
          "https://facebook.com/name",
          "https://twitter.com/name",
          "https://instagram.com/name"
        ]
      }
    </script>
  <meta name="theme-color" content="#478ac9" />
  <meta name="twitter:site" content="@" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Page 1" />
  <meta name="twitter:description" content="" />
  <meta property="og:title" content="Page 1" />
  <meta property="og:type" content="website" />
  <meta data-intl-tel-input-cdn-path="intlTelInput/" />
</head>

<body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="fr">
  <header class="u-clearfix u-header u-header" id="sec-53bd">
    <div class="u-clearfix u-sheet u-sheet-1">
      <a href="http://localhost/test/pmv/view/Front_office/acceuil.html" class="u-image u-logo u-image-1"
        data-image-width="300" data-image-height="245">
        <img src="images/logo.group.png" class="u-logo-image u-logo-image-1" />
      </a>
      <nav class="u-menu u-menu-hamburger u-offcanvas u-menu-1" data-responsive-from="XL">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
            href="#" style="padding: 17px 12px; font-size: calc(1em + 34px)">
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
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="http://localhost/test/pmv/view/Front_office/acceuil.html"
                style="padding: 10px 15px 10px 20px">Accueil</a>
              <div class="u-nav-popup">
                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white"
                      href="http://localhost/test/pmv/view/Front_office/acceuil.html">À propos de</a>
                  </li>
                  <li class="u-nav-item">
                    <a class="u-button-style u-nav-link u-white"
                      href="http://localhost/test/pmv/view/Front_office/acceuil.html">Contact</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link"
                    href="http://localhost/test/pmv/view/Front_office/acceuil.html">Accueil</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="À-propos-de.html">À propos de</a>
                      </li>
                      <li class="u-nav-item">
                        <a class="u-button-style u-nav-link" href="tel:50316723">Contact</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
      <img class="u-image u-image-default u-preserve-proportions u-image-2" src="images/trottinette.png" alt=""
        data-image-width="512" data-image-height="512" />
      <h1 class="u-align-center u-text u-text-1">____________________</h1>
      <div class="u-rotation-parent u-rotation-parent-1">
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-3"
          src="images/IMAGE22-removebg-preview.png" alt="" data-image-width="500" data-image-height="500" />
      </div>
      <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-4"
        src="images/88-removebg-preview.png" alt="" data-image-width="360" data-image-height="360" />
    </div>
  </header>
  <section class="u-clearfix u-custom-color-1 u-section-1" id="sec-c51a">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-align-center u-text u-text-1">
        Location de trottinettes électriques en<br />Tunisie
      </h2>
      <h4 class="u-align-left u-text u-text-palette-5-dark-2 u-text-2">
        -​​​Louer pour des heures ou des jours<br />- Réservez votre
        trottinette&nbsp; &nbsp;électrique en ligne<br />- Paiements en ligne
        ou en&nbsp; &nbsp;magasin
      </h4>
      <img class="custom-expanded u-image u-image-contain u-image-default u-image-1" src="images/1.webp" alt=""
        data-image-width="800" data-image-height="600" />
    </div>
  </section>
  <section class="u-clearfix u-section-2" id="sec-e6bb">
    <div class="u-clearfix u-sheet u-sheet-1">
      <img class="u-image u-image-default u-preserve-proportions u-image-1" src="images/trottinette.png" alt=""
        data-image-width="512" data-image-height="512" />
      <img class="u-image u-image-default u-preserve-proportions u-image-2" src="images/trottinette.png" alt=""
        data-image-width="512" data-image-height="512" />
      <img class="u-image u-image-default u-preserve-proportions u-image-3" src="images/trottinette.png" alt=""
        data-image-width="512" data-image-height="512" />
      <div class="custom-expanded data-layout-selected u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div
              class="u-container-style u-custom-color-1 u-layout-cell u-radius u-shape-round u-size-60 u-layout-cell-1">
              <div class="u-container-layout u-valign-top u-container-layout-1">
                <h1 class="u-text u-text-1">PAR HEURES</h1>
                <h3 class="u-align-center u-text u-text-2">
                  1 ​ heure = 15dt<br />2 ​ heures = 20dt<br />3 ​ heure =
                  25dt<br />4 ​ heure = 30dt
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="u-container-style u-custom-color-1 u-group u-radius u-shape-round u-group-1">
        <div class="u-container-layout u-valign-bottom u-container-layout-2">
          <h1 class="u-text u-text-3">DEMI-JOURNÉE</h1>
          <h3 class="u-align-center u-text u-text-4">
            Utilisation illimitée = 35dt Prise en charge à partir de 10h00
            Retour jusqu'à 19h30<span style="font-weight: 700"></span>
            <br />
          </h3>
          <h5 class="u-align-center u-text u-text-5">
            *Vérifiez les heures de fermeture
          </h5>
        </div>
      </div>
      <div class="u-container-style u-custom-color-1 u-group u-radius u-shape-round u-group-2">
        <div class="u-container-layout u-container-layout-3">
          <h1 class="u-text u-text-6">PAR JOURS</h1>
          <h3 class="u-align-center u-text u-text-7">
            24 heures = 45dt<br />&nbsp;48 heures = 75dt<br />&nbsp; 3 jours =
            100dt<br />&nbsp; 4 jours = 120dt<br />
          </h3>
        </div>
      </div>
      <a href="http://localhost/test/reservation_taxi/view/front-office/reservabdo.html"
        class="u-black u-border-1 u-border-custom-color-1 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-radius u-btn-1">
        SELECT A STORE AND BOOK NOW</a>
    </div>
  </section>
  <section class="u-clearfix u-custom-color-1 u-section-3" id="sec-474e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <img class="u-image u-image-contain u-image-default u-image-1" src="images/1.1-removebg-preview.png" alt=""
        data-image-width="484" data-image-height="516" />
      <h4 class="u-text u-text-default u-text-palette-5-dark-2 u-text-1">
        Réservez une ou plusieurs trottinettes
      </h4>
      <h2 class="u-align-center u-text u-text-default u-text-2">
        Par heures ou par jours
      </h2>
      <h3 class="u-align-left u-text u-text-palette-5-dark-3 u-text-3">
        Notre système de réservation flexible vous permet de louer la durée
        que vous souhaitez, de 1 heure à plusieurs jours et même de combiner
        des jours et des heures pour profiter au maximum de votre déplacement
        en ville.
      </h3>
    </div>
  </section>
  <section class="u-clearfix u-section-4" id="sec-6aff">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-align-center u-text u-text-1">
        <span style="text-decoration: underline !important"> Mo</span>
        <span style="text-decoration: underline !important">vinterest<span
            style="text-decoration: underline !important"></span> </span>&nbsp;, la marque qui offre le
        <span style="text-decoration: underline !important">meilleur</span>
        <span style="text-decoration: underline !important">coût</span> de
        location&nbsp; de trottinette en tunisie
      </h2>
      <div class="u-palette-3-base u-shape u-shape-rectangle u-shape-1"></div>
      <img class="u-image u-image-contain u-image-default u-image-1" src="images/image_3333-removebg-preview.png" alt=""
        data-image-width="443" data-image-height="564" />
      <img class="u-image u-image-default u-image-2" src="images/dinar-tunisien-1.jpg" alt="" data-image-width="1243"
        data-image-height="632" />
      <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-3" src="images/trottinette.png"
        alt="" data-image-width="512" data-image-height="512" />
      <h4 class="u-text u-text-2">
        Movinterest se positionne ainsi comme le choix idéal pour ceux qui
        recherchent une solution de déplacement écologique, pratique et
        abordable en Tunisie. Grâce à son approche axée sur la satisfaction
        client et à sa tarification avantageuse, Movinterest s'impose comme la
        marque de référence pour une expérience de location de trottinettes
        optimale dans le pays
      </h4>
    </div>
  </section>
  <section class="u-clearfix u-custom-color-1 u-section-5" id="sec-7e6e">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-text u-text-default u-text-palette-5-dark-2 u-text-1">
        Nous sommes là pour réaliser votre voyage
      </h3>
      <img class="u-image u-image-default u-image-1" src="images/trotinette4.jpg" alt="" data-image-width="768"
        data-image-height="432" />
      <h2 class="u-text u-text-default u-text-2">
        Une expérience inoubliable
      </h2>
      <img class="u-image u-image-default u-image-2" src="images/logo.group.png" alt="" data-image-width="300"
        data-image-height="245" />
      <h3 class="u-align-left u-text u-text-palette-5-dark-3 u-text-3">
        Notre équipe souhaite que votre expérience soit excellente. Soit en
        personne dans l'un de nos points de livraison et de retrait, mais via
        notre chat ou nos réseaux sociaux.
      </h3>
    </div>
  </section>
  <section class="u-clearfix u-section-6" id="sec-3957">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-text u-text-default u-text-1">
        Pourquoi réserver avec nous ?
      </h2>
      <img class="u-image u-image-contain u-image-default u-image-1" src="images/2.2-removebg-preview.png" alt=""
        data-image-width="397" data-image-height="562" />
      <img class="u-image u-image-contain u-image-default u-image-2" src="images/2.4-removebg-preview.png" alt=""
        data-image-width="115" data-image-height="266" />
      <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-3"
        src="images/1-removebg-preview1.png" alt="" data-image-width="105" data-image-height="231" />
      <h3 class="u-text u-text-default u-text-2">
        Trottinettes haut de gamme
      </h3>
      <h3 class="u-text u-text-default u-text-3">
        Jusqu'à 50 km d'autonomie
      </h3>
      <h3 class="u-text u-text-default u-text-4">Attention personnalisée</h3>
      <h3 class="u-text u-text-5">
        Police d'assurance casque, chaîne et responsabilité civile incluse
      </h3>
      <div class="u-border-16 u-border-custom-color-1 u-line u-line-horizontal u-line-1"></div>
    </div>
  </section>

  <footer class="u-align-center u-clearfix u-custom-color-1 u-footer u-footer" id="sec-cb5d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <img class="u-image u-image-round u-radius u-image-1" alt="" data-image-width="300" data-image-height="245"
        src="images/logo.group.png" />
      <p class="u-custom-font u-font-oswald u-text u-text-1">
        Copyright © ovinterest 2023<span style="font-weight: 700"></span>
      </p>
      <div class="u-social-icons u-spacing-10 u-social-icons-1">
        <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span
            class="u-icon u-social-facebook u-social-icon u-text-black u-icon-1"><svg class="u-svg-link"
              preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f1e0"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-f1e0">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path>
            </svg></span>
        </a>
        <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span
            class="u-icon u-social-icon u-social-twitter u-text-black u-icon-2"><svg class="u-svg-link"
              preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f8d8"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-f8d8">
              <circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path>
            </svg></span>
        </a>
        <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span
            class="u-icon u-social-icon u-social-instagram u-text-black u-icon-3"><svg class="u-svg-link"
              preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-facb"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-facb">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF"
                d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path>
              <path fill="#FFFFFF"
                d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path>
              <path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path>
            </svg></span>
        </a>
        <a class="u-social-url" target="_blank" data-type="LinkedIn" title="LinkedIn" href=""><span
            class="u-icon u-social-icon u-social-linkedin u-text-black u-icon-4"><svg class="u-svg-link"
              preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-03ac"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-03ac">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
      C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
      H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path>
            </svg></span>
        </a>
      </div>
      <a href="https://nicepage.com/k/hacker-html-templates"
        class="u-active-none u-btn u-btn-rectangle u-button-style u-hover-none u-none u-btn-1"><span class="u-icon"><svg
            class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em">
            <path
              d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
            </path>
          </svg></span>&nbsp; (+216) 50 316 <span style="font-weight: 700"></span>723
      </a>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span> </a>.
  </section>
</body>

</html>