<?php

function team_portfolio_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'team_portfolio_setup');

function team_portfolio_styles() {
    wp_enqueue_style(
        'team-portfolio-style',
        get_stylesheet_uri(),
        array(),
        '1.1'
    );
}
add_action('wp_enqueue_scripts', 'team_portfolio_styles');

/**
 * Team Members Data
 */
function team_portfolio_get_members() {
    return array(
        'member-1' => array(
            'id'          => 'member-1',
            'name'        => 'Pabolario Sandrick Jan',
            'role'        => 'PM/Project manager',
            'image'       => 'pabolario.jpg',
            'placeholder' => 'https://placehold.co/400x450/6842a6/ffffff?text=Pabolario+Sandrick+Jan',
            'description' => 'I lead our team and develop innovative web and mobile applications.',
            'skills'      => array('HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'),
            'email'       => 'Sandrickjanpabulario@gmail.com'
        ),
        'member-2' => array(
            'id'          => 'member-2',
            'name'        => 'Dayanan Archie',
            'role'        => 'Technical Writer',
            'image'       => 'dayanan.jpg',
            'placeholder' => 'https://placehold.co/400x450/21133f/ffffff?text=Dayanan+Archie',
            'description' => 'I create beautiful, accessible, and user-friendly website designs.',
            'skills'      => array('Figma', 'UI Design', 'UX Research', 'CSS'),
            'email'       => 'occ.daynan.archie@gmail.com'
        ),
        'member-3' => array(
            'id'          => 'member-3',
            'name'        => 'Fernandez Nathaniel',
            'role'        => 'System Analyst',
            'image'       => 'fernandez.jpg',
            'placeholder' => 'https://placehold.co/400x450/9470d3/ffffff?text=Fernandez+Nathaniel',
            'description' => 'I build responsive websites and interactive user experiences.',
            'skills'      => array('HTML', 'CSS', 'JavaScript', 'React'),
            'email'       => 'occ.fernandez.nathaniel@example.com'
        ),
        'member-4' => array(
            'id'          => 'member-4',
            'name'        => 'Quimanhan Jan Alexis',
            'role'        => 'Programmer',
            'image'       => 'quimanhan.jpg',
            'placeholder' => 'https://placehold.co/400x450/49306e/ffffff?text=Quimanhan+Jan+Alexis',
            'description' => 'I develop backend systems, APIs, and database solutions.',
            'skills'      => array('PHP', 'Laravel', 'MySQL', 'Database Design'),
            'email'       => 'janalexisquimanhan@gmail.com'
        )
    );
}

/**
 * URL Helpers for Welcome, Portfolio, and Members
 */
function team_portfolio_get_welcome_url() {
    $page = get_page_by_path('welcome');
    if ($page) {
        return get_permalink($page->ID);
    }
    return home_url('/');
}

function team_portfolio_get_portfolio_url() {
    $page = get_page_by_path('portfolio');
    if ($page) {
        return get_permalink($page->ID);
    }
    return add_query_arg('view', 'portfolio', home_url('/'));
}

function team_portfolio_get_member_url($slug = 'member-1') {
    $page = get_page_by_path('member');
    if ($page) {
        return add_query_arg('member', $slug, get_permalink($page->ID));
    }
    return add_query_arg(array('view' => 'member', 'member' => $slug), home_url('/'));
}

/**
 * Register Custom Query Vars
 */
function team_portfolio_query_vars($vars) {
    $vars[] = 'view';
    $vars[] = 'member';
    return $vars;
}
add_filter('query_vars', 'team_portfolio_query_vars');

/**
 * Custom Rewrite Rules
 */
function team_portfolio_rewrite_rules() {
    add_rewrite_rule('^welcome/?$', 'index.php?view=welcome', 'top');
    add_rewrite_rule('^portfolio/?$', 'index.php?view=portfolio', 'top');
    add_rewrite_rule('^member/([^/]+)/?$', 'index.php?view=member&member=$matches[1]', 'top');
    add_rewrite_rule('^member/?$', 'index.php?view=member', 'top');
}
add_action('init', 'team_portfolio_rewrite_rules');

/**
 * Template Router
 * Ensures welcome.php and member.php render regardless of permalink structure or WP page setup
 */
function team_portfolio_template_routing($template) {
    $view = get_query_var('view');
    $member = get_query_var('member');

    if (empty($view) && !empty($_GET['view'])) {
        $view = sanitize_key($_GET['view']);
    }
    if (empty($member) && !empty($_GET['member'])) {
        $member = sanitize_key($_GET['member']);
    }

    $request_uri = '';
    if (!empty($_SERVER['REQUEST_URI'])) {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_uri = trim((string)$path, '/');
    }

    // 1. Member routing
    if (!empty($member) || $view === 'member' || preg_match('/(^|\/)member(-[1-4])?$/i', $request_uri)) {
        $member_tpl = locate_template('member.php');
        if ($member_tpl) {
            return $member_tpl;
        }
    }

    // 2. Welcome routing
    if ($view === 'welcome' || preg_match('/(^|\/)welcome$/i', $request_uri)) {
        $welcome_tpl = locate_template('welcome.php');
        if ($welcome_tpl) {
            return $welcome_tpl;
        }
    }

    // 3. Portfolio routing
    if ($view === 'portfolio' || preg_match('/(^|\/)portfolio$/i', $request_uri)) {
        $index_tpl = locate_template('index.php');
        if ($index_tpl) {
            return $index_tpl;
        }
    }

    return $template;
}
add_filter('template_include', 'team_portfolio_template_routing', 99);
