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
    <title>Profiel Pagina</title>
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

    <?php

// Includeer de gemeenschappelijke header en navigatie
include('common_header.php');
?>

<!-- Inhoud van profiel_content.php -->
<div id="profiel-container ">
    <h2>Profiel</h2>

    <!-- Formulier voor het invoeren van profielinformatie -->
    <form method="post" action="">
        <label for="name">Naam:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">E-mailadres:</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">Telefoonnummer:</label>
        <input type="text" name="phone" id="phone">

        <label for="address">Adres:</label>
        <input type="text" name="address" id="address">

        <label for="birthdate">Geboortedatum:</label>
        <input type="date" name="birthdate" id="birthdate">

        <label for="gender">Geslacht:</label>
        <select name="gender" id="gender">
            <option value="male">Man</option>
            <option value="female">Vrouw</option>
            
        </select>

        <button type="submit">Opslaan</button>
    </form>

    <?php
    // Verwerk het formulier
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

        // Toon de ingevoerde informatie
        echo '<div id="profile-info">';
        echo "<h3>Ingevoerde profielinformatie:</h3>";
        echo "<p>Naam: $name</p>";
        echo "<p>E-mailadres: $email</p>";
        echo "<p>Telefoonnummer: $phone</p>";
        echo "<p>Adres: $address</p>";
        echo "<p>Geboortedatum: $birthdate</p>";
        echo "<p>Geslacht: $gender</p>";
        echo '</div>';
    }
    ?>
</div>

<?php
// Includeer de gemeenschappelijke footer
include('common_footer.php');
?>



</div>


</body>

</html>

