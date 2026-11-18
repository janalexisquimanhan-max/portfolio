<?php
/*
Template Name: Individual Member Portfolio
*/

get_header();

$members = array(
    'member-1' => array(
        'id'          => 'member-1',
        'name'        => 'Pabulario Sandrick Jan',
        'role'        => 'PM/Project manager',
        'location'    => '',
        'age'         => '21',
        'gender'      => '',
        'image'       => 'pabulario.png',
        'theme'       => 'army',
        'interest'    => 'Army inspired',
        'placeholder' => 'https://placehold.co/400x450/6842a6/ffffff?text=Pabulario+Sandrick+Jan',
        'description' => 'I lead our team and develop innovative web and mobile applications.',
        'skills'      => array('HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'),
        'email'       => 'Sandrickjanpabulario@gmail.com'
    ),
    'member-2' => array(
        'id'          => 'member-2',
        'name'        => 'Dayanan Archie',
        'role'        => 'Technical Writer',
        'location'    => '',
        'age'         => '',
        'gender'      => '',
        'image'       => 'dayanan.png',
        'theme'       => 'volleyball',
        'interest'    => 'Volleyball',
        'placeholder' => 'https://placehold.co/400x450/21133f/ffffff?text=Dayanan+Archie',
        'description' => 'I create and work on our technical papers.',
        'skills'      => 'good at writing in papers',
        'email'       => 'occ.daynan.archie@gmail.com'
    ),
    'member-3' => array(
        'id'          => 'member-3',
        'name'        => 'Fernandez Nathaniel',
        'role'        => 'System Analyst',
        'location'    => '',
        'age'         => '',
        'gender'      => '',
        'image'       => 'fernandez.png',
        'theme'       => 'gaming',
        'interest'    => 'Online gaming',
        'placeholder' => 'https://placehold.co/400x450/9470d3/ffffff?text=Fernandez+Nathaniel',
        'description' => 'I make the blueprint of our project and also i work for the backend.',
        'skills'      => array('HTML', 'CSS', 'JavaScript', 'React'),
        'email'       => 'occ.fernandez.nathaniel@example.com'
    ),
    'member-4' => array(
        'id'          => 'member-4',
        'name'        => 'Quimanhan Jan Alexis',
        'role'        => 'Programmer',
        'location'    => '',
        'age'         => '',
        'gender'      => '',
        'image'       => 'quimanhan.png',
        'theme'       => 'gaming-volleyball',
        'interest'    => 'Gaming + volleyball',
        'placeholder' => 'https://placehold.co/400x450/49306e/ffffff?text=Quimanhan+Jan+Alexis',
        'description' => 'I develop the application and the backend of our project and also the database.',
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
    'pabulario' => 'member-1',
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
    ? get_template_directory_uri() . '/images/' . rawurlencode($member['image']) . '?v=2'
    : ($member['placeholder'] ?? 'https://placehold.co/400x450/6842a6/ffffff?text=' . urlencode($member['name']));
?>

<section class="individual-hero individual-hero--<?php echo esc_attr($member['theme'] ?? 'default'); ?>">

    <div class="container individual-grid">

        <div class="individual-text">

            <p class="member-label"><span></span> MEET THE TEAM</p>

            <div class="member-nav-tabs" role="navigation" aria-label="Choose a team member">
                <?php foreach ($members as $m_id => $m_data) :
                    $tab_url = function_exists('team_portfolio_get_member_url')
                        ? team_portfolio_get_member_url($m_id)
                        : add_query_arg('member', $m_id, home_url('/?view=member'));
                    $is_active = ($m_id === $slug) ? 'active' : '';
                ?>
                    <a href="<?php echo esc_url($tab_url); ?>"
                       class="<?php echo esc_attr($is_active); ?>"
                       <?php echo $m_id === $slug ? 'aria-current="page"' : ''; ?>>
                        <?php echo esc_html($m_data['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <h1>
                Hi, I’m<br>
                <span><?php echo esc_html($member['name']); ?></span>
            </h1>

            <h3 class="individual-role"><?php echo esc_html($member['role']); ?></h3>

            <div class="individual-about">
                <h2>About Me</h2>
                <p class="individual-description"><?php echo esc_html($member['description']); ?></p>
            </div>

            <?php
            $member_details = array(
                'Location' => isset($member['location']) ? trim((string) $member['location']) : '',
                'Age'      => isset($member['age']) ? trim((string) $member['age']) : '',
                'Gender'   => isset($member['gender']) ? trim((string) $member['gender']) : ''
            );
            $member_details = array_filter($member_details, function ($value) {
                return $value !== '';
            });
            ?>
            <?php if (!empty($member_details)) : ?>
                <dl class="member-details">
                    <?php foreach ($member_details as $label => $value) : ?>
                        <div>
                            <dt><?php echo esc_html($label); ?></dt>
                            <dd><?php echo esc_html($value); ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            <?php endif; ?>

            <div class="individual-actions">
                <a href="<?php echo esc_url('mailto:' . $member['email']); ?>"
                   class="btn">
                    Contact Me <span aria-hidden="true">→</span>
                </a>
                <span class="individual-email"><?php echo esc_html($member['email']); ?></span>
            </div>

        </div>

        <div class="individual-photo">

            <div class="individual-photo-frame">
                <img
                    src="<?php echo esc_url($img_url); ?>"
                    alt="<?php echo esc_attr($member['name']); ?>"
                >
                <div class="photo-caption">
                    <span class="photo-caption-dot"></span>
                    <span><?php echo esc_html($member['interest'] ?? 'TEAM UNCHAKA'); ?></span>
                </div>
            </div>

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

            <?php foreach ($member['skills'] as $index => $skill) : ?>

                <div class="skill-card">
                    <span class="skill-number">
                        <?php echo esc_html(str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)); ?>
                    </span>
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

            <article class="project-card">
                <div class="project-info">
                    <span class="project-number">01 / FEATURED</span>
                    <h3>Portfolio Project</h3>
                    <p>A project showcasing my development and design skills.</p>
                </div>
                <span class="project-arrow" aria-hidden="true">↗</span>
            </article>

            <article class="project-card">
                <div class="project-info">
                    <span class="project-number">02 / COLLABORATION</span>
                    <h3>Team Project</h3>
                    <p>A collaborative project created with our team.</p>
                </div>
                <span class="project-arrow" aria-hidden="true">↗</span>
            </article>

        </div>

    </div>

</section>

<div class="individual-back container">
    <a href="<?php echo esc_url(home_url('/#members')); ?>" class="btn btn-outline">
        ← Back to Our Team
    </a>
</div>

<?php get_footer(); ?>
