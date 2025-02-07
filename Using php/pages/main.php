<section class="hero fade-in">
    <div class="hero-content">
        <h1>Discover Your Dream Career</h1>
        <p>Connect with top employers and find the perfect job opportunity</p>
        <form class="search-form">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Job title, keywords, or company" required>
            </div>
            <div class="search-input-group">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" placeholder="City, state, or zip code" required>
            </div>
            <button type="submit" class="btn btn-primary">Find Jobs</button>
        </form>
    </div>
</section>

<section class="featured-jobs fade-in">
    <div class="container">
        <h2>Featured Job Opportunities</h2>
        <div id="featured-jobs" class="job-grid"></div>
    </div>
</section>

<section class="job-categories fade-in">
    <div class="container">
        <h2>Explore Job Categories</h2>
        <div class="category-grid">
            <a href="#" class="category-card">
                <i class="fas fa-laptop-code"></i>
                <h3>Technology</h3>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-chart-line"></i>
                <h3>Finance</h3>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-hospital-user"></i>
                <h3>Healthcare</h3>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-graduation-cap"></i>
                <h3>Education</h3>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-shopping-cart"></i>
                <h3>Retail</h3>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-hard-hat"></i>
                <h3>Construction</h3>
            </a>
        </div>
    </div>
</section>

<section class="top-companies fade-in">
    <div class="container">
        <h2>Top Companies Hiring</h2>
        <div id="top-companies" class="company-grid"></div>
    </div>
</section>

<section class="job-seeker-tools fade-in">
    <div class="container">
        <h2>Job Seeker Tools</h2>
        <div class="tools-grid">
            <div class="tool-card">
                <i class="fas fa-file-alt"></i>
                <h3>Resume Builder</h3>
                <p>Create a professional resume in minutes</p>
                <a href="#" class="btn btn-secondary">Get Started</a>
            </div>
            <div class="tool-card">
                <i class="fas fa-briefcase"></i>
                <h3>Career Assessment</h3>
                <p>Discover your ideal career path</p>
                <a href="#" class="btn btn-secondary">Take the Test</a>
            </div>
            <div class="tool-card">
                <i class="fas fa-comments"></i>
                <h3>Interview Prep</h3>
                <p>Practice common interview questions</p>
                <a href="#" class="btn btn-secondary">Start Practicing</a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const featuredJobs = document.getElementById('featured-jobs');
    const topCompanies = document.getElementById('top-companies');
    
    // Fetch featured jobs
    const fetchFeaturedJobs = async () => {
        try {
            const response = await fetch('api/featured-jobs.php');
            const data = await response.json();
            
            data.forEach(job => {
                const jobElement = document.createElement('div');
                jobElement.classList.add('job-card', 'slide-in');
                jobElement.innerHTML = `
                    <h3>${job.title}</h3>
                    <p class="company-name"><i class="fas fa-building"></i> ${job.company}</p>
                    <p class="job-location"><i class="fas fa-map-marker-alt"></i> ${job.location}</p>
                    <p class="job-salary"><i class="fas fa-money-bill-wave"></i> ${job.salary}</p>
                    <a href="job-details.php?id=${job.id}" class="btn btn-outline">View Details</a>
                `;
                featuredJobs.appendChild(jobElement);
            });
        } catch (error) {
            console.error('Error fetching featured jobs:', error);
            featuredJobs.innerHTML = '<p class="error-message">Failed to load featured jobs. Please try again later.</p>';
        }
    };

    // Fetch top companies
    const fetchTopCompanies = async () => {
        try {
            const response = await fetch('api/top-companies.php');
            const data = await response.json();
            
            data.forEach(company => {
                const companyElement = document.createElement('div');
                companyElement.classList.add('company-card', 'slide-in');
                companyElement.innerHTML = `
                    <img src="${company.logo}" alt="${company.name} logo" class="company-logo">
                    <h3>${company.name}</h3>
                    <p class="company-industry">${company.industry}</p>
                    <a href="company-jobs.php?id=${company.id}" class="btn btn-outline">View Jobs</a>
                `;
                topCompanies.appendChild(companyElement);
            });
        } catch (error) {
            console.error('Error fetching top companies:', error);
            topCompanies.innerHTML = '<p class="error-message">Failed to load top companies. Please try again later.</p>';
        }
    };

    fetchFeaturedJobs();
    fetchTopCompanies();
});
</script>

<style>
.hero {
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    padding: 6rem 0;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
}

.search-form {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}

.search-input-group {
    position: relative;
    flex: 1;
}

.search-input-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
}

.search-input-group input {
    width: 100%;
    padding: 1rem 1rem 1rem 2.5rem;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
}

.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
    cursor: pointer;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: var(--primary-color-dark);
}

.btn-secondary {
    background-color: var(--secondary-color);
    color: white;
    border: none;
}

.btn-secondary:hover {
    background-color: var(--secondary-color-dark);
}

.btn-outline {
    background-color: transparent;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.btn-outline:hover {
    background-color: var(--primary-color);
    color: white;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

section {
    padding: 4rem 0;
}

section h2 {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2.5rem;
    color: var(--primary-color);
}

.job-grid, .company-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.job-card, .company-card {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.job-card:hover, .company-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.company-logo {
    max-width: 100px;
    margin-bottom: 1rem;
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.category-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 2rem;
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    text-decoration: none;
    color: var(--text-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.category-card i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.tool-card {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.tool-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.tool-card i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.error-message {
    color: #dc3545;
    text-align: center;
    font-weight: bold;
}

@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .search-form {
        flex-direction: column;
    }

    .search-input-group {
        width: 100%;
    }

    .btn-primary {
        width: 100%;
    }
}
</style>

