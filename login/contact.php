<?php

// Stel de welkomsttekst in voor het dashboard (standaard leeg)
$dashboardWelcomeMessage = '';

// Stel de standaardwaarde in voor 'page' als deze nog niet is ingesteld
if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'dashboard';
}
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Contact Pagina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://use.fontawesome.com/releases/v5.0.8/js/all.js'></script>
    


<script>
        $(document).ready(() => {
            // Functie om de paginatitel en welkomsttekst bij te werken
            function updatePageContent(pageTitle, welcomeMessage) {
                $(".page-title").text(pageTitle);
                $("#welcomeMessage").html(welcomeMessage);
            }

            // Event handler voor menu-items
            $(".js-menu li").on("click", function () {
                let pageUrl = $(this).data('url');

                if (pageUrl) {
                    window.location.href = pageUrl;
                } else {
                    $(".js-menu li").removeClass("is-active");
                    $(this).addClass("is-active");

                    let pageTitle = $(this).data('page');
                    let welcomeMessage = (pageTitle === 'dashboard') ? "<?php echo $dashboardWelcomeMessage; ?>" : $(this).data('welcome-message');

                    $(".submenu-content").hide();
                    $(".submenu-content[data-page='" + pageTitle + "']").show();

                    updatePageContent(pageTitle, welcomeMessage);
                }
            });

            // Event handler voor het hamburger-icoon
            $(".js-hamburger").on("click", function () {
                $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
                $(".hamburger-toggle").toggleClass("is-opened");
            });

            // Initialiseer de paginatitel en welkomsttekst bij het laden van de pagina
            let initialPageTitle = $(".js-menu li.is-active").data('page');
            let initialWelcomeMessage = (initialPageTitle === 'dashboard') ? "<?php echo $dashboardWelcomeMessage; ?>" : $(".js-menu li.is-active").data('welcome-message');
            updatePageContent(initialPageTitle, initialWelcomeMessage);
        });
    </script>
</head>

<body class="sidebar-is-reduced">
    <!-- Header sectie -->
    <header class="l-header">
        <div class="l-header__inner clearfix">
            <!-- Hamburger icoon -->
            <div class="c-header-icon js-hamburger">
                <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
            </div>

            <!-- Zoekbalk -->
            <div class="c-search">
                <input class="c-search__input u-input" placeholder="Search..." type="text"/>
            </div>

            <!-- Uitlog icoon -->
            <div class="header-icons-group">
                <div class="c-header-icon logout"><a href="logout.php"><i class="fa fa-power-off"></i></a></div>
            </div>
        </div>
    </header>

    <!-- Zijbalk sectie -->
    <div class="l-sidebar">
        <!-- Logo -->
        <div class="logo">
            <div class="logo__txt">Cloud Agent</div>
        </div>

        <!-- Zijbalk inhoud -->
        <div class="l-sidebar__content">
            <nav class="c-menu js-menu">
                <ul class="u-list">

                    <!-- Dashboard menu-item -->
<li class="c-menu__item is-active" data-toggle="tooltip" title="Dashboard" data-page="Dashboard" data-url="dashboard_content.php">
    <div class="c-menu__item__inner"><i class="fa fa-server"></i>
        <div class="c-menu-item__title"><span>Dashboard</span></div>
    </div>
</li>

<!-- Mijn Profiel menu-item -->
<li class="c-menu__item has-submenu" data-toggle="tooltip" title="Mijn Profiel" data-page="Mijn Profiel" data-welcome-message="Welkom op de pagina Mijn Profiel. Hier kan je je persoonlijke gegevens bekijken en bewerken." data-url="profiel_content.php">
    <div class="c-menu__item__inner"><i class="fa fa-address-card"></i>
        <div class="c-menu-item__title"><span>Mijn Profiel</span></div>
    </div>
</li>

<!-- Documenten menu-item -->
<li class="c-menu__item has-submenu" data-toggle="tooltip" title="Documenten" data-page="Documenten" data-url="document.php">
    <div class="c-menu__item__inner"><i class="fa fa-folder"></i>
        <div class="c-menu-item__title"><span>Documenten</span></div>
    </div>
</li>

<!-- Uren Registratie menu-item -->
<li class="c-menu__item has-submenu" data-toggle="tooltip" title="Uren Registratie" data-page="Uren Registratie" data-url="urenregistratie_content.php">
    <div class="c-menu__item__inner"><i class="fa fa-clock"></i>
        <div class="c-menu-item__title"><span>Uren Registratie</span></div>
    </div>
</li>

<!-- Contact menu-item -->
<li class="c-menu__item has-submenu" data-toggle="tooltip" title="Contact" data-page="Contact" data-url="contact.php">
    <div class="c-menu__item__inner"><i class="fa fa-phone"></i>
        <div class="c-menu-item__title"><span>Contact</span></div>
    </div>
</li>

<!-- Rapportage menu-item -->
<li class="c-menu__item has-submenu" data-toggle="tooltip" title="Rapportage" data-page="Rapportage" data-url="rapportage_content.php">
    <div class="c-menu__item__inner"><i class="fa fa-download"></i>
        <div class="c-menu-item__title"><span>Rapportage</span></div>
    </div>
</li>

                </ul>
            </nav>
        </div>
    </div>




<div class="form">
  <h2>Contact Support</h2>

  <!-- Voeg hier je inputvelden, knoppen en andere elementen toe -->
  <div class="box">
        <div class="box-form">
            <div class="box-login-tab"></div>
            <div class="box-login-title">
                <div class="i i-login"></div>
            </div>
            <div class="box-login">
                <div class="fieldset-body">
                    <p>Neem contact op met onze ondersteuning voor hulp:</p>
                    <ul>
                    <li>Email: <a href="mailto:hello@cloudagent.nl">hello@cloudagent.nl</a></li>
                        <li>Telefoon: +31 20 809 3867</li>
                    </ul>
                </div>
            </div>
        </div>


  </form>

</div>

</body>
</html>



