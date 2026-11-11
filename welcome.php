<?php
/*
Template Name: 3D Welcome Page
*/

$theme_uri = function_exists('get_template_directory_uri') ? get_template_directory_uri() : '.';
$theme_dir = function_exists('get_template_directory') ? get_template_directory() : __DIR__;

// Search for the poster image in the theme's images folder
$poster_candidates = array(
    'unchaka_team_poster.png',
    'unchaka_team_poster_background_added.png',
    'Neon Purple Unchaka Team Poster.png'
);

$team_img_url = '';
foreach ($poster_candidates as $file_name) {
    if (file_exists($theme_dir . '/images/' . $file_name)) {
        $team_img_url = $theme_uri . '/images/' . rawurlencode($file_name);
        break;
    }
}

if (empty($team_img_url)) {
    $team_img_url = $theme_uri . '/images/unchaka_team_poster.png';
}

$portfolio_url = function_exists('team_portfolio_get_portfolio_url')
    ? team_portfolio_get_portfolio_url()
    : home_url('/?view=portfolio');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - Welcome</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>?v=<?php echo time(); ?>">

    <style>
        /* CRITICAL RESET */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #0c0418;
            font-family: 'Poppins', Arial, sans-serif;
            color: #ffffff;
        }

        .welcome-screen {
            position: relative;
            width: 100vw;
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0c0418;
        }

        /* BACKGROUND CONTAINER */
        .welcome-bg-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        /* Ambient blurred background fills edge-to-edge with colors */
        .welcome-bg-ambient {
            position: absolute;
            top: -20px;
            left: -20px;
            width: calc(100% + 40px);
            height: calc(100% + 40px);
            object-fit: cover;
            object-position: center;
            filter: blur(40px) brightness(0.35) saturate(1.5);
            z-index: 1;
            display: block;
            transform: scale(1.1);
        }

        /* WIDE & MOVING POSTER BACKGROUND */
        .welcome-bg-main {
            position: absolute;
            top: -6%;
            left: -6%;
            width: 112%;
            height: 112%;
            object-fit: cover;
            object-position: center 25%;
            filter: brightness(0.8) contrast(1.12) saturate(1.2);
            z-index: 2;
            display: block;
            animation: bgCinematicMotion 22s ease-in-out infinite alternate;
            will-change: transform;
        }

        /* Smooth, slow, living cinematic zoom & drift */
        @keyframes bgCinematicMotion {
            0% {
                transform: scale(1) translate(0, 0);
            }
            50% {
                transform: scale(1.07) translate(-1.5%, -1%);
            }
            100% {
                transform: scale(1.03) translate(1.5%, 0.8%);
            }
        }

        /* Ambient glowing light pulses */
        .neon-light-beam {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.32;
            pointer-events: none;
            z-index: 3;
            animation: floatGlow 14s ease-in-out infinite alternate;
        }

        .neon-beam-1 {
            width: 480px;
            height: 480px;
            background: #9b38ff;
            top: 15%;
            left: 20%;
        }

        .neon-beam-2 {
            width: 520px;
            height: 520px;
            background: #6818e8;
            bottom: 10%;
            right: 15%;
            animation-duration: 18s;
            animation-direction: alternate-reverse;
        }

        @keyframes floatGlow {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 0.25;
            }
            50% {
                transform: translate(35px, -25px) scale(1.2);
                opacity: 0.45;
            }
            100% {
                transform: translate(-30px, 20px) scale(0.95);
                opacity: 0.3;
            }
        }

        /* Overlay with clear center so the 4 members shine through */
        .welcome-bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(
                ellipse at 50% 45%,
                rgba(12, 4, 24, 0.15) 0%,
                rgba(12, 4, 24, 0.55) 55%,
                rgba(12, 4, 24, 0.88) 100%
            );
            pointer-events: none;
            z-index: 4;
        }

        /* THE WORDS INSIDE THE BACKGROUND */
        .welcome-content {
            position: relative;
            z-index: 10;
            width: 90%;
            max-width: 950px;
            height: 90vh;
            height: 90dvh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            padding: 25px 15px;
            box-sizing: border-box;
            pointer-events: auto;
        }

        .welcome-header-group {
            width: 100%;
        }

        .welcome-badge {
            display: inline-block;
            background: rgba(185, 154, 255, 0.18);
            border: 1px solid rgba(185, 154, 255, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 8px 22px;
            border-radius: 30px;
            color: #e2caff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 4px;
            margin-bottom: 12px;
            text-shadow: 0 0 15px rgba(185, 154, 255, 0.6);
            animation: badgeFloat 4s ease-in-out infinite alternate;
        }

        @keyframes badgeFloat {
            0% { transform: translateY(0); }
            100% { transform: translateY(-4px); }
        }

        .welcome-title {
            font-size: clamp(38px, 6.5vw, 75px);
            line-height: 1.1;
            margin: 10px 0 15px 0;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 0 4px 30px rgba(0, 0, 0, 0.95), 0 0 35px rgba(155, 56, 255, 0.4);
        }

        .welcome-title span {
            background: linear-gradient(90deg, #ffffff, #d8b4ff, #a454ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: none;
        }

        .welcome-desc {
            color: #eee1ff;
            font-size: clamp(14px, 2vw, 17px);
            max-width: 600px;
            margin: auto;
            line-height: 1.6;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.95);
        }

        .welcome-spacer {
            flex: 1;
            min-height: 60px;
            width: 100%;
            pointer-events: none;
        }

        .welcome-action-group {
            width: 100%;
        }

        .enter-button {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            padding: 18px 48px;
            border-radius: 50px;
            background: linear-gradient(120deg, #a43cff, #6818e8);
            color: #ffffff !important;
            text-decoration: none !important;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 1.5px;
            box-shadow: 0 0 35px rgba(164, 60, 255, 0.6), 0 10px 25px rgba(0, 0, 0, 0.5);
            transition: all 0.35s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: buttonPulse 3s ease-in-out infinite alternate;
        }

        @keyframes buttonPulse {
            0% {
                box-shadow: 0 0 30px rgba(164, 60, 255, 0.5), 0 8px 20px rgba(0, 0, 0, 0.4);
            }
            100% {
                box-shadow: 0 0 55px rgba(164, 60, 255, 0.9), 0 12px 30px rgba(104, 24, 232, 0.5);
            }
        }

        .enter-button:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 0 60px rgba(164, 60, 255, 0.95), 0 15px 30px rgba(0, 0, 0, 0.6);
            color: #ffffff !important;
        }

        .enter-button .arrow {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .enter-button:hover .arrow {
            transform: translateX(6px);
        }

        .welcome-footer {
            margin-top: 18px;
            font-size: 11px;
            letter-spacing: 3px;
            color: #caaee8;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.85);
        }

        @media (max-width: 600px) {
            .welcome-title {
                font-size: 34px;
            }
            .welcome-badge {
                font-size: 10px;
                letter-spacing: 2px;
                padding: 6px 16px;
            }
            .enter-button {
                padding: 14px 32px;
                font-size: 13px;
            }
            .welcome-bg-main {
                object-position: center 20%;
            }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class('welcome-page'); ?>>
<?php wp_body_open(); ?>

<main class="welcome-screen">

    <!-- WIDE & LIVING MOVING BACKGROUND -->
    <div class="welcome-bg-container">
        <img src="<?php echo esc_url($team_img_url); ?>" alt="" class="welcome-bg-ambient" aria-hidden="true">
        <img src="<?php echo esc_url($team_img_url); ?>" alt="Unchaka Team Poster" class="welcome-bg-main">
        <div class="neon-light-beam neon-beam-1"></div>
        <div class="neon-light-beam neon-beam-2"></div>
        <div class="welcome-bg-overlay"></div>
    </div>

    <!-- THE WORDS INSIDE THE BACKGROUND -->
    <div class="welcome-content">

        <div class="welcome-header-group">
            <div class="welcome-badge">
                ✦ WELCOME TO OUR WORLD ✦
            </div>

            <h1 class="welcome-title">
                Meet Our<br>
                <span>Creative Team</span>
            </h1>

            <p class="welcome-desc">
                Four minds. One vision. Endless possibilities.<br>
                Discover our creativity, skills, and projects.
            </p>
        </div>

        <!-- Open center space so the 4 of you in the background are fully highlighted -->
        <div class="welcome-spacer"></div>

        <div class="welcome-action-group">
            <a href="<?php echo esc_url($portfolio_url); ?>" class="enter-button">
                <span>ENTER PORTFOLIO</span>
                <span class="arrow">→</span>
            </a>

            <div class="welcome-footer">
                DESIGNED WITH CREATIVITY & PASSION
            </div>
        </div>

    </div>

</main>

<?php wp_footer(); ?>
</body>
</html>
