<?php get_header(); ?>

<!-- HOME -->
<section class="hero" id="home">
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>

    <div class="container hero-container">
        <div class="hero-badge">✦ INNOVATION • CREATIVITY • CODE ✦</div>

        <h1>We Are <span>UNCHAKA</span></h1>

        <p class="hero-subtitle">
            Welcome to our team portfolio! We are a dynamic four-member team
            showcasing our development skills, technical creativity, and real-world projects.
        </p>

        <div class="hero-actions">
            <a href="#members" class="btn btn-primary">Meet Our Team ↓</a>
            <a href="<?php echo esc_url(function_exists('team_portfolio_get_welcome_url') ? team_portfolio_get_welcome_url() : home_url('/')); ?>" class="btn btn-outline">✦ 3D Welcome</a>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section-about" id="about">
    <div class="container">

        <div class="section-title">
            <span class="section-tag">✦ WHO WE ARE ✦</span>
            <h2>About Our Team</h2>
            <p>Passionate creators building the future together</p>
        </div>

        <div class="about-card">
            <p class="about-lead">
                We are <strong>Team UNCHAKA</strong>, a focused group of four aspiring technology professionals
                dedicated to solving real-world problems through innovative software, accessible user interfaces,
                and solid system architecture.
            </p>
            <p>
                Our mission is to combine leadership, thorough technical analysis, intuitive design, and robust programming
                into projects that make an impact. Through close collaboration and continuous learning, we turn ideas into reality.
            </p>

            <div class="about-highlights-grid">
                <div class="highlight-item">
                    <span class="highlight-num">04</span>
                    <span class="highlight-label">Dedicated Specialists</span>
                </div>
                <div class="highlight-item">
                    <span class="highlight-num">100%</span>
                    <span class="highlight-label">Collaborative Synergy</span>
                </div>
                <div class="highlight-item">
                    <span class="highlight-num">Full-Stack</span>
                    <span class="highlight-label">Design & Dev Skills</span>
                </div>
                <div class="highlight-item">
                    <span class="highlight-num">Agile</span>
                    <span class="highlight-label">Problem Solving</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- MEMBERS -->
<section class="members" id="members">
    <div class="container">

        <div class="section-title">
            <span class="section-tag">✦ THE MINDS BEHIND UNCHAKA ✦</span>
            <h2>Meet Our Members</h2>
            <p>Get to know the four individuals driving our projects</p>
        </div>

        <div class="member-grid">

            <?php
            $members = function_exists('team_portfolio_get_members') ? team_portfolio_get_members() : array();
            foreach ($members as $m_id => $m_data) :
                $img_file = get_template_directory() . '/images/' . $m_data['image'];
                $img_url  = file_exists($img_file)
                    ? get_template_directory_uri() . '/images/' . rawurlencode($m_data['image']) . '?v=2'
                    : ($m_data['placeholder'] ?? 'https://placehold.co/400x450/6842a6/ffffff?text=' . urlencode($m_data['name']));
                $profile_url = function_exists('team_portfolio_get_member_url')
                    ? team_portfolio_get_member_url($m_id)
                    : add_query_arg(array('view' => 'member', 'member' => $m_id), home_url('/'));
            ?>
                <div class="member-card member-card--<?php echo esc_attr($m_data['theme'] ?? 'default'); ?>">
                    <div class="member-photo-wrap member-photo-wrap--<?php echo esc_attr($m_data['theme'] ?? 'default'); ?>">
                        <img src="<?php echo esc_url($img_url); ?>"
                             alt="<?php echo esc_attr($m_data['name']); ?>">
                        <span class="member-card-badge"><?php echo esc_html($m_data['role']); ?></span>
                        <span class="member-interest"><?php echo esc_html($m_data['interest'] ?? ''); ?></span>
                    </div>

                    <div class="member-info">
                        <h3><?php echo esc_html($m_data['name']); ?></h3>
                        <p class="role"><?php echo esc_html($m_data['role']); ?></p>
                        <p class="desc"><?php echo esc_html($m_data['description']); ?></p>
                        <a href="<?php echo esc_url($profile_url); ?>" class="btn member-btn">
                            View Profile →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- SKILLS -->
<section class="section-skills" id="skills">
    <div class="container">

        <div class="section-title">
            <span class="section-tag">✦ OUR TECH ARSENAL ✦</span>
            <h2>Skills & Expertise</h2>
            <p>Technologies, methodologies, and tools we work with</p>
        </div>

        <div class="skills-grid">

            <div class="skill-card">
                <div class="skill-icon">⚡</div>
                <h3>Frontend Engineering</h3>
                <p>Creating responsive, modern, and interactive interfaces with HTML5, CSS3, modern JavaScript, and UI libraries.</p>
                <div class="skill-tags">
                    <span>HTML5</span>
                    <span>CSS3</span>
                    <span>JavaScript</span>
                    <span>Responsive UI</span>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">🛠️</div>
                <h3>Backend & Database</h3>
                <p>Architecting backend APIs, server logic, database design, and structured storage using PHP, Laravel, and MySQL.</p>
                <div class="skill-tags">
                    <span>PHP</span>
                    <span>Laravel</span>
                    <span>MySQL</span>
                    <span>API Design</span>
                </div>
            </div>

            <div class="skill-card">
                
                <div class="skill-icon">🚀</div>
                <h3>WordPress & CMS</h3>
                <p>Crafting custom themes, page templates, routing, responsive layouts, and content management workflows.</p>
                <div class="skill-tags">
                    <span>WordPress</span>
                    <span>Custom Themes</span>
                    <span>PHP Routing</span>
                    <span>SEO Best Practices</span>
                </div>
            </div>

            <div class="skill-card">
                <div class="skill-icon">📊</div>
                <h3>System Analysis & Docs</h3>
                <p>Requirements gathering, data modeling, architecture diagrams, user stories, and comprehensive technical documentation.</p>
                <div class="skill-tags">
                    <span>System Analysis</span>
                    <span>Tech Writing</span>
                    <span>ERD / Flowcharts</span>
                    <span>Project Planning</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PROJECTS -->
<section class="projects" id="projects">
    <div class="container">

        <div class="section-title">
            <span class="section-tag">✦ FEATURED WORK ✦</span>
            <h2>Our Projects</h2>
            <p>Explore some of the recent systems and applications we have engineered</p>
        </div>

        <?php
        $projects = array(
            array(
                'id' => 'team-portfolio-hub',
                'category' => 'Web Application',
                'title' => 'Team Portfolio Hub',
                'description' => 'A full-featured team portfolio web portal featuring dynamic routing, individual member showcases, interactive 3D landing experiences, and responsive multi-device design.',
                'image' => 'project-portfolio-preview.svg',
                'gallery' => array(
                    array('image' => 'project-portfolio-preview.svg', 'caption' => 'Portfolio dashboard example'),
                    array('image' => 'project-portfolio-members.svg', 'caption' => 'Team members page example'),
                    array('image' => 'project-portfolio-profile.svg', 'caption' => 'Individual portfolio page example')
                ),
                'technologies' => array('WordPress', 'PHP', 'CSS3')
            ),
            array(
                'id' => 'management-analytics',
                'category' => 'Database System',
                'title' => 'Management & Analytics System',
                'description' => 'A comprehensive system developed to solve real-world organizational tracking, database optimization, and operational reporting with role-based access.',
                'image' => 'project-analytics-preview.svg',
                'gallery' => array(
                    array('image' => 'project-analytics-preview.svg', 'caption' => 'Analytics dashboard example'),
                    array('image' => 'project-analytics-records.svg', 'caption' => 'Records management page example'),
                    array('image' => 'project-analytics-report.svg', 'caption' => 'Performance report example')
                ),
                'technologies' => array('MySQL', 'PHP', 'System Analysis')
            ),
            array(
                'id' => 'interactive-digital-solution',
                'category' => 'Collaborative Platform',
                'title' => 'Interactive Digital Solution',
                'description' => 'A creative multi-user project demonstrating collaborative frontend design, agile project management, and clean technical documentation.',
                'image' => 'project-platform-preview.svg',
                'gallery' => array(
                    array('image' => 'project-platform-preview.svg', 'caption' => 'Collaborative workspace example'),
                    array('image' => 'project-platform-board.svg', 'caption' => 'Team task board example'),
                    array('image' => 'project-platform-chat.svg', 'caption' => 'Team messaging page example')
                ),
                'technologies' => array('JavaScript', 'UI/UX', 'Agile')
            )
        );
        ?>

        <div class="project-grid">
            <?php foreach ($projects as $project) : ?>
                <article class="project-card">
                    <button class="project-image-button" type="button"
                            data-open-project-gallery="<?php echo esc_attr($project['id']); ?>"
                            aria-label="<?php echo esc_attr('View examples for ' . $project['title']); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/' . $project['image']); ?>"
                             alt="">
                        <span>Sample preview · View project examples <span aria-hidden="true">→</span></span>
                    </button>
                    <div class="project-card-content">
                        <div class="project-card-header">
                            <span class="project-tag"><?php echo esc_html($project['category']); ?></span>
                            <h3><?php echo esc_html($project['title']); ?></h3>
                        </div>
                        <p><?php echo esc_html($project['description']); ?></p>
                        <div class="project-tech">
                            <?php foreach ($project['technologies'] as $technology) : ?>
                                <span><?php echo esc_html($technology); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php foreach ($projects as $project) : ?>
            <?php $gallery_title_id = 'project-gallery-title-' . $project['id']; ?>
            <dialog class="project-gallery-dialog" id="project-gallery-<?php echo esc_attr($project['id']); ?>"
                    data-project-gallery aria-labelledby="<?php echo esc_attr($gallery_title_id); ?>">
                <div class="project-gallery-header">
                    <div>
                        <span class="project-tag"><?php echo esc_html($project['category']); ?> · SAMPLE GALLERY</span>
                        <h2 id="<?php echo esc_attr($gallery_title_id); ?>"><?php echo esc_html($project['title']); ?></h2>
                        <p class="project-gallery-description"><?php echo esc_html($project['description']); ?></p>
                    </div>
                    <button class="project-gallery-close" type="button" data-close-project-gallery
                            aria-label="Close project gallery">×</button>
                </div>
                <div class="project-gallery-grid">
                    <?php foreach ($project['gallery'] as $gallery_image) : ?>
                        <figure class="project-gallery-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/' . $gallery_image['image']); ?>"
                                 alt="<?php echo esc_attr($gallery_image['caption']); ?>">
                            <figcaption><?php echo esc_html($gallery_image['caption']); ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
                <div class="project-tech project-gallery-tech">
                    <?php foreach ($project['technologies'] as $technology) : ?>
                        <span><?php echo esc_html($technology); ?></span>
                    <?php endforeach; ?>
                </div>
            </dialog>
        <?php endforeach; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-open-project-gallery]').forEach(function (button) {
        button.addEventListener('click', function () {
            var projectId = button.getAttribute('data-open-project-gallery');
            var gallery = document.getElementById('project-gallery-' + projectId);
            if (gallery && typeof gallery.showModal === 'function') {
                gallery.showModal();
            }
        });
    });

    document.querySelectorAll('dialog[data-project-gallery]').forEach(function (gallery) {
        var closeButton = gallery.querySelector('[data-close-project-gallery]');
        closeButton.addEventListener('click', function () {
            gallery.close();
        });

        gallery.addEventListener('click', function (event) {
            if (event.target === gallery) {
                gallery.close();
            }
        });
    });
});
</script>

<!-- CONTACT -->
<section class="section-contact" id="contact">
    <div class="container">

        <div class="section-title contact-heading">
            <h2>Contact Us</h2>
            <p>Any question or remarks? Just write us a message!</p>
        </div>

        <?php if (isset($_GET['contact']) && is_string($_GET['contact']) && sanitize_key(wp_unslash($_GET['contact'])) === 'sent') : ?>
            <p class="contact-success" role="status">Thanks for reaching out. Your message has been sent.</p>
        <?php endif; ?>

        <div class="contact-panel">
            <aside class="contact-details">
                <h3>Contact Information</h3>
                <p class="contact-details-intro">We'd love to hear from you. Send us a message and we'll get back to you.</p>

                <div class="contact-detail">
                    <span class="contact-detail-icon" aria-hidden="true">✉</span>
                <a href="mailto:TEAMUNCHAKA@gmail.com">TEAMUNCHAKA@gmail.com</a>
                </div>

                <div class="contact-quick-links">
                    <a href="#members">Explore members</a>
                    <a href="#projects">View projects</a>
                </div>
            </aside>

            <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="team_portfolio_contact">
                <?php wp_nonce_field('team_portfolio_contact', 'contact_nonce'); ?>

                <div class="contact-form-grid">
                    <label class="contact-field">
                        <span>First Name</span>
                        <input type="text" name="first_name" autocomplete="given-name" required>
                    </label>
                    <label class="contact-field">
                        <span>Last Name</span>
                        <input type="text" name="last_name" autocomplete="family-name" required>
                    </label>
                    <label class="contact-field">
                        <span>Email</span>
                        <input type="email" name="email" autocomplete="email" required>
                    </label>
                    <label class="contact-field">
                        <span>Phone Number <small>(optional)</small></span>
                        <input type="tel" name="phone" autocomplete="tel">
                    </label>
                </div>

                <fieldset class="contact-subject">
                    <legend>Select Subject</legend>
                    <label><input type="radio" name="subject" value="General inquiry" checked> General inquiry</label>
                    <label><input type="radio" name="subject" value="Project collaboration"> Project collaboration</label>
                    <label><input type="radio" name="subject" value="Portfolio feedback"> Portfolio feedback</label>
                    <label><input type="radio" name="subject" value="Other"> Other</label>
                </fieldset>

                <label class="contact-field contact-message">
                    <span>Message</span>
                    <textarea name="message" rows="3" placeholder="Write your message..." required></textarea>
                </label>

                <button type="submit" class="contact-submit">Send Message</button>
            </form>
        </div>

    </div>
</section>

<?php get_footer(); ?>
