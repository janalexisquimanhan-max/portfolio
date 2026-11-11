<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>?v=<?php echo time(); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$welcome_url   = function_exists('team_portfolio_get_welcome_url') ? team_portfolio_get_welcome_url() : home_url('/');
$portfolio_url = function_exists('team_portfolio_get_portfolio_url') ? team_portfolio_get_portfolio_url() : home_url('/?view=portfolio');
?>

<header>
    <div class="container header-content">

        <a href="<?php echo esc_url($portfolio_url); ?>" class="logo">
            TEAM<span>UNCHAKA</span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
            ☰
        </button>

        <nav id="navigation">
            <ul>
                <li><a href="<?php echo esc_url($welcome_url); ?>" class="nav-welcome-link">✦ Welcome</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#home'); ?>">Home</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#about'); ?>">About</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#members'); ?>">Members</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#skills'); ?>">Skills</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#projects'); ?>">Projects</a></li>
                <li><a href="<?php echo esc_url($portfolio_url . '#contact'); ?>">Contact</a></li>
            </ul>
        </nav>

    </div>
</header>
