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
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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

    <div class="dashboard-welcome relative">
    <div class="absolute top-[80px] left-[120px] text-[30px]">
    <h2>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?>!</h2>
    <p>Here's a quick overview of your timesheets and other information:</p>
</div>

<div class="dashboard-widgets relative">
    <!-- Widget 1: Total Hours Worked -->
    <div class="dashboard-widget absolute top-[310px] left-[120px]">
        <h3>Total Hours Worked</h3>
        <p>Today: 4 hours</p>
        <p>This Week: 20 hours</p>
    </div>

    <!-- Widget 2: Latest Timesheet Entry -->
    <div class="dashboard-widget absolute top-[400px] left-[120px]">
        <h3>Latest Timesheet Entry</h3>
        <p>Date: January 27, 2024</p>
        <p>Hours: 8</p>
        <p>Project: Project X</p>
    </div>
</div>

<div class="timesheet-overview absolute top-[200px] left-[120px] ">
    <h2>Your Timesheet Overview</h2>

    <!-- Display a table with timesheet entries -->
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Hours</th>
            <th>Project</th>
        </tr>
        <tr>
            <td>2024-01-27</td>
            <td>8</td>
            <td>Project X</td>
        </tr>
        <tr>
            <td>2024-01-26</td>
            <td>6</td>
            <td>Project Y</td>
        </tr>
        <!-- Add more rows as needed -->
    </table>
</div>

<!-- JavaScript sectie -->
<script>
$(document).ready(() => {
    // Functie om de paginatitel en welkomsttekst bij te werken
    function updatePageContent(pageTitle, welcomeMessage) {
        $(".page-title").text(pageTitle);
        $("#welcomeMessage").html(welcomeMessage);
    }

    // Event handler voor menu-items
    $(".js-menu li").on("click", function () {
        $(".js-menu li").removeClass("is-active");
        $(this).addClass("is-active");

        let pageTitle = $(this).data('page');
        let welcomeMessage = (pageTitle === 'dashboard') ? "<?php echo $dashboardWelcomeMessage; ?>" : $(this).data('welcome-message');

        $(".submenu-content").hide();
        $(".submenu-content[data-page='" + pageTitle + "']").show();

        updatePageContent(pageTitle, welcomeMessage);
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

        }
    });

</script>

</body>

</html>


