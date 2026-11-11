<?php
/*
Template Name: Individual Member Portfolio
*/

get_header();

$members = function_exists('team_portfolio_get_members') ? team_portfolio_get_members() : array(
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

// Determine which member to display
$slug = '';
if (!empty($_GET['member'])) {
    $slug = sanitize_key($_GET['member']);
} elseif (!empty(get_query_var('member'))) {
    $slug = sanitize_key(get_query_var('member'));
} else {
    $post_slug = get_post_field('post_name', get_queried_object_id());
    if (!empty($post_slug)) {
        $slug = $post_slug;
    }
}

// Map shorthand aliases
$slug_map = array(
    '1' => 'member-1',
    '2' => 'member-2',
    '3' => 'member-3',
    '4' => 'member-4',
    'pabolario' => 'member-1',
    'dayanan' => 'member-2',
    'fernandez' => 'member-3',
    'quimanhan' => 'member-4',
    'Pabolario' => 'member-1',
    'Dayanan' => 'member-2',
    'Fernandez' => 'member-3',
    'Quimanhan' => 'member-4',
);
if (isset($slug_map[$slug])) {
    $slug = $slug_map[$slug];
}

// Default to member-1 if empty, 'member', or invalid
if (!isset($members[$slug])) {
    $slug = 'member-1';
}

$member = $members[$slug];

// Image fallback
$img_file = get_template_directory() . '/images/' . $member['image'];
$img_url  = file_exists($img_file)
    ? get_template_directory_uri() . '/images/' . $member['image']
    : ($member['placeholder'] ?? 'https://placehold.co/400x450/6842a6/ffffff?text=' . urlencode($member['name']));
?>

<section class="individual-hero">

    <div class="container individual-grid">

        <div class="individual-text">

            <p class="member-label">MEET OUR TEAM MEMBER</p>

            <!-- Member Switcher Tabs -->
            <div class="member-nav-tabs">
                <?php foreach ($members as $m_id => $m_data) :
                    $tab_url = function_exists('team_portfolio_get_member_url')
                        ? team_portfolio_get_member_url($m_id)
                        : add_query_arg('member', $m_id, home_url('/?view=member'));
                    $is_active = ($m_id === $slug) ? 'active' : '';
                ?>
                    <a href="<?php echo esc_url($tab_url); ?>" class="<?php echo esc_attr($is_active); ?>">
                        <?php echo esc_html($m_data['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <h1>
                Hi, I'm <span><?php echo esc_html($member['name']); ?></span>
            </h1>

            <h3><?php echo esc_html($member['role']); ?></h3>

            <p><?php echo esc_html($member['description']); ?></p>

            <a href="<?php echo esc_url('mailto:' . $member['email']); ?>"
               class="btn">
                Contact Me →
            </a>

        </div>

        <div class="individual-photo">

            <img
                src="<?php echo esc_url($img_url); ?>"
                alt="<?php echo esc_attr($member['name']); ?>"
            >

        </div>

    </div>

</section>

<section class="individual-skills">

    <div class="container">

        <div class="section-title">
            <h2>My <span>Skills</span></h2>
            <p>Technologies and tools I work with</p>
        </div>

        <div class="skills-grid">

            <?php foreach ($member['skills'] as $skill) : ?>

                <div class="skill-card">
                    <h3><?php echo esc_html($skill); ?></h3>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<section class="individual-projects">

    <div class="container">

        <div class="section-title">
            <h2>My <span>Projects</span></h2>
            <p>Some of my contributions and achievements</p>
        </div>

        <div class="project-grid">

            <div class="project-card">
                <div class="project-info">
                    <h3>Portfolio Project</h3>
                    <p>A project showcasing my development and design skills.</p>
                </div>
            </div>

            <div class="project-card">
                <div class="project-info">
                    <h3>Team Project</h3>
                    <p>A collaborative project created with our team.</p>
                </div>
            </div>

        </div>

    </div>

</section>

<div class="container" style="text-align:center; padding:40px 0;">
    <a href="<?php echo esc_url(home_url('/#members')); ?>" class="btn">
        ← Back to Our Team
    </a>
</div>

<?php get_footer(); ?>
