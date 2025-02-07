<section class="blog fade-in">
    <h2>Career Tips & Insights</h2>
    <div class="blog-container">
        <div class="blog-posts">
            <?php
            // In a real application, you would fetch blog posts from a database
            $blogPosts = [
                [
                    'title' => '10 Tips for a Successful Job Interview',
                    'excerpt' => 'Prepare for your next job interview with these essential tips that will help you stand out from the crowd.',
                    'author' => 'Jane Smith',
                    'date' => '2023-05-15',
                    'image' => 'interview-tips.jpg'
                ],
                [
                    'title' => 'The Future of Remote Work',
                    'excerpt' => 'Explore the trends shaping the future of remote work and how you can prepare for this evolving landscape.',
                    'author' => 'John Doe',
                    'date' => '2023-05-10',
                    'image' => 'remote-work.jpg'
                ],
                [
                    'title' => 'Building a Strong Professional Network',
                    'excerpt' => 'Learn how to create and maintain a powerful professional network that can boost your career opportunities.',
                    'author' => 'Emily Johnson',
                    'date' => '2023-05-05',
                    'image' => 'networking.jpg'
                ]
            ];

            foreach ($blogPosts as $post):
            ?>
                <article class="blog-post">
                    <img src="images/blog/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="blog-image">
                    <div class="blog-content">
                        <h3><?php echo $post['title']; ?></h3>
                        <p class="blog-meta">By <?php echo $post['author']; ?> on <?php echo $post['date']; ?></p>
                        <p><?php echo $post['excerpt']; ?></p>
                        <a href="#" class="btn">Read More</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <aside class="blog-sidebar">
            <div class="sidebar-section">
                <h3>Categories</h3>
                <ul>
                    <li><a href="#">Career Advice</a></li>
                    <li><a href="#">Job Search Tips</a></li>
                    <li><a href="#">Industry Trends</a></li>
                    <li><a href="#">Resume Writing</a></li>
                    <li><a href="#">Workplace Culture</a></li>
                </ul>
            </div>
            <div class="sidebar-section">
                <h3>Popular Posts</h3>
                <ul>
                    <li><a href="#">5 Skills Every Job Seeker Needs in 2023</a></li>
                    <li><a href="#">How to Negotiate Your Salary Like a Pro</a></li>
                    <li><a href="#">The Do's and Don'ts of Cover Letters</a></li>
                </ul>
            </div>
            <div class="sidebar-section">
                <h3>Subscribe to Our Newsletter</h3>
                <form id="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit" class="btn">Subscribe</button>
                </form>
            </div>
        </aside>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const newsletterForm = document.getElementById('newsletter-form');
    
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = newsletterForm.querySelector('input[type="email"]').value;
        // In a real application, you would send this email to your server
        console.log('Subscribed email:', email);
        alert('Thank you for subscribing to our newsletter!');
        newsletterForm.reset();
    });
});
</script>

<style>
.blog-container {
    display: flex;
    gap: 2rem;
}

.blog-posts {
    flex: 2;
}

.blog-sidebar {
    flex: 1;
}

.blog-post {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.blog-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.blog-content {
    padding: 1.5rem;
}

.blog-meta {
    font-size: 0.9rem;
    color: var(--text-muted);
    margin-bottom: 1rem;
}

.sidebar-section {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.sidebar-section h3 {
    margin-bottom: 1rem;
}

.sidebar-section ul {
    list-style-type: none;
    padding: 0;
}

.sidebar-section li {
    margin-bottom: 0.5rem;
}

#newsletter-form input {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
}

@media (max-width: 768px) {
    .blog-container {
        flex-direction: column;
    }
}
</style>

