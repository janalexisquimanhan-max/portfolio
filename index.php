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
                    ? get_template_directory_uri() . '/images/' . $m_data['image']
                    : ($m_data['placeholder'] ?? 'https://placehold.co/400x450/6842a6/ffffff?text=' . urlencode($m_data['name']));
                $profile_url = function_exists('team_portfolio_get_member_url')
                    ? team_portfolio_get_member_url($m_id)
                    : add_query_arg(array('view' => 'member', 'member' => $m_id), home_url('/'));
            ?>
                <div class="member-card">
                    <div class="member-photo-wrap">
                        <img src="<?php echo esc_url($img_url); ?>"
                             alt="<?php echo esc_attr($m_data['name']); ?>">
                        <span class="member-card-badge"><?php echo esc_html($m_data['role']); ?></span>
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

        <div class="project-grid">

            <div class="project-card">
                <div class="project-card-header">
                    <span class="project-tag">Web Application</span>
                    <h3>Team Portfolio Hub</h3>
                </div>
                <p>
                    A full-featured team portfolio web portal featuring dynamic routing, individual member showcases,
                    interactive 3D landing experiences, and responsive multi-device design.
                </p>
                <div class="project-tech">
                    <span>WordPress</span>
                    <span>PHP</span>
                    <span>CSS3</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-header">
                    <span class="project-tag">Database System</span>
                    <h3>Management & Analytics System</h3>
                </div>
                <p>
                    A comprehensive system developed to solve real-world organizational tracking, database optimization,
                    and operational reporting with role-based access.
                </p>
                <div class="project-tech">
                    <span>MySQL</span>
                    <span>PHP</span>
                    <span>System Analysis</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-card-header">
                    <span class="project-tag">Collaborative Platform</span>
                    <h3>Interactive Digital Solution</h3>
                </div>
                <p>
                    A creative multi-user project demonstrating collaborative frontend design, agile project management,
                    and clean technical documentation.
                </p>
                <div class="project-tech">
                    <span>JavaScript</span>
                    <span>UI/UX</span>
                    <span>Agile</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="section-contact" id="contact">
    <div class="container">

        <div class="section-title">
            <span class="section-tag">✦ LET'S CONNECT ✦</span>
            <h2>Contact Us</h2>
            <p>Have a question or want to collaborate with Team UNCHAKA?</p>
        </div>

        <div class="contact-box">
            <div class="contact-icon-large">✉️</div>
            <h3>We Would Love to Hear From You</h3>
            <p class="contact-intro">
                Whether you have an inquiry, feedback, or a collaborative project opportunity,
                our team is ready to connect.
            </p>

            <a href="mailto:janalexisquimanhan@gmail.com" class="btn contact-btn">
                Send an Email →
            </a>

            <div class="contact-quick-links">
                <a href="#members" class="contact-link">Explore Members</a>
                <span class="dot">•</span>
                <a href="#projects" class="contact-link">View Projects</a>
                <span class="dot">•</span>
                <a href="<?php echo esc_url(function_exists('team_portfolio_get_welcome_url') ? team_portfolio_get_welcome_url() : home_url('/')); ?>" class="contact-link">3D Welcome</a>
            </div>

            <p class="contact-thanks">Thank you for visiting Team UNCHAKA's Portfolio!</p>
        </div>

    </div>
</section>

<?php get_footer(); ?>
