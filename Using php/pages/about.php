<section class="about fade-in">
    <h2>About JobRecruit</h2>
    <div class="about-container">
        <div class="mission-vision">
            <div class="mission slide-in">
                <h3>Our Mission</h3>
                <p>To connect talented individuals with their dream jobs and help companies find the perfect candidates
                    to drive their success.</p>
            </div>
            <div class="vision slide-in">
                <h3>Our Vision</h3>
                <p>To be the leading job recruitment platform, fostering career growth and organizational excellence
                    worldwide.</p>
            </div>
        </div>
        <div class="core-values slide-in">
            <h3>Our Core Values</h3>
            <ul>
                <li>Integrity in all our interactions</li>
                <li>Innovation in recruitment solutions</li>
                <li>Empowerment of job seekers and employers</li>
                <li>Excellence in service delivery</li>
            </ul>
        </div>
        <div class="company-story">
            <h3>Our Story</h3>
            <p>JobRecruit was founded in 2010 with a simple goal: to revolutionize the way people find jobs and
                companies hire talent. Over the years, we've grown from a small startup to a global leader in
                recruitment solutions, helping millions of job seekers and thousands of companies achieve their goals.
            </p>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="year">2010</div>
                    <div class="event">JobRecruit founded</div>
                </div>
                <div class="timeline-item">
                    <div class="year">2015</div>
                    <div class="event">Expanded to 10 countries</div>
                </div>
                <div class="timeline-item">
                    <div class="year">2018</div>
                    <div class="event">Launched AI-powered job matching</div>
                </div>
                <div class="timeline-item">
                    <div class="year">2023</div>
                    <div class="event">Reached 1 million successful placements</div>
                </div>
            </div>
        </div>
        <div class="team-section slide-in">
            <h3>Our Team</h3>
            <div class="team-members">
                <div class="team-member">
                    <img src="images/team-member-3.jpg" alt="Preet Dadhaia">
                    <h4>Preet Dadhaia</h4>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <img src="images/team-member-2.jpg" alt="Vatsal">
                    <h4>Vatsal</h4>
                    <p>Head of Recruitment</p>
                </div>
                <div class="team-member">
                    <img src="images/team-member-1.jpg" alt="Harsh Dodiya">
                    <h4>Harsh Dodiya</h4>
                    <p>Tech Lead</p>
                </div>
            </div>
        </div>
        <div class="testimonials">
            <h3>What Our Users Say</h3>
            <div class="testimonial-carousel">
                <div class="testimonial">
                    <p>"JobRecruit helped me find my dream job in just two weeks!"</p>
                    <p class="author">- Sarah K., Software Developer</p>
                </div>
                <div class="testimonial">
                    <p>"As an employer, I've found amazing talent through JobRecruit."</p>
                    <p class="author">- Mark R., HR Manager</p>
                </div>
                <div class="testimonial">
                    <p>"The platform is user-friendly and the support team is fantastic."</p>
                    <p class="author">- Emily T., Recent Graduate</p>
                </div>
            </div>
        </div>
        <div class="partnerships">
            <h3>Our Partners</h3>
            <div class="partner-logos">
                <img src="images/partner-logo-1.png" alt="Partner 1">
                <img src="images/partner-logo-2.png" alt="Partner 2">
                <img src="images/partner-logo-3.png" alt="Partner 3">
                <img src="images/partner-logo-4.png" alt="Partner 4">
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const testimonialCarousel = document.querySelector('.testimonial-carousel');
        let currentTestimonial = 0;

        function showNextTestimonial() {
            const testimonials = testimonialCarousel.querySelectorAll('.testimonial');
            testimonials[currentTestimonial].style.display = 'none';
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            testimonials[currentTestimonial].style.display = 'block';
        }

        setInterval(showNextTestimonial, 5000); // Change testimonial every 5 seconds
    });
</script>

<style>
    .about-container {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .mission-vision {
        display: flex;
        gap: 2rem;
    }

    .mission,
    .vision {
        flex: 1;
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .core-values {
        background-color: var(--primary-color);
        color: white;
        border-radius: 8px;
        padding: 1.5rem;
    }

    .core-values ul {
        list-style-type: none;
        padding-left: 0;
    }

    .core-values li {
        margin-bottom: 0.5rem;
        padding-left: 1.5rem;
        position: relative;
    }

    .core-values li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--accent-color);
    }

    .company-story {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 1.5rem;
    }

    .timeline {
        margin-top: 1rem;
    }

    .timeline-item {
        display: flex;
        margin-bottom: 1rem;
    }

    .year {
        font-weight: bold;
        margin-right: 1rem;
        color: var(--primary-color);
    }

    .team-section {
        text-align: center;
    }

    .team-members {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-top: 1.5rem;
    }

    .team-member {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .team-member:hover {
        transform: translateY(-5px);
    }

    .team-member img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 1rem;
    }

    .testimonials {
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 1.5rem;
    }

    .testimonial-carousel {
        position: relative;
        height: 150px;
        overflow: hidden;
    }

    .testimonial {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        animation: fadeIn 0.5s;
    }

    .testimonial:first-child {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .partnerships {
        text-align: center;
    }

    .partner-logos {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-top: 1rem;
    }

    .partner-logos img {
        max-width: 100px;
        height: auto;
    }

    @media (max-width: 768px) {

        .mission-vision,
        .team-members {
            flex-direction: column;
        }
    }
</style>