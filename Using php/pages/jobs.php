<section class="jobs fade-in">
    <h2>Job Opportunities</h2>
    <div class="job-search">
        <input type="text" id="job-search" placeholder="Search for jobs...">
        <select id="job-category">
            <option value="">All Categories</option>
            <option value="tech">Technology</option>
            <option value="finance">Finance</option>
            <option value="healthcare">Healthcare</option>
            <option value="education">Education</option>
        </select>
        <select id="job-location">
            <option value="">All Locations</option>
            <option value="new-york">New York</option>
            <option value="san-francisco">San Francisco</option>
            <option value="london">London</option>
            <option value="remote">Remote</option>
        </select>
        <button id="search-btn" class="btn">Search</button>
    </div>
    <div class="job-categories">
        <div class="category" id="tech">
            <h3>Technology</h3>
            <p>Open positions: <span class="job-count">0</span></p>
        </div>
        <div class="category" id="finance">
            <h3>Finance</h3>
            <p>Open positions: <span class="job-count">0</span></p>
        </div>
        <div class="category" id="healthcare">
            <h3>Healthcare</h3>
            <p>Open positions: <span class="job-count">0</span></p>
        </div>
        <div class="category" id="education">
            <h3>Education</h3>
            <p>Open positions: <span class="job-count">0</span></p>
        </div>
    </div>
    <div id="job-listings"></div>
    <div id="job-insights" class="job-insights">
        <h3>Job Market Insights</h3>
        <div id="job-chart"></div>
    </div>
    <div id="top-recruiters" class="top-recruiters">
        <h3>Top Recruiters</h3>
        <div id="recruiter-list"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const jobListings = document.getElementById('job-listings');
    const jobCounts = document.querySelectorAll('.job-count');
    const searchInput = document.getElementById('job-search');
    const categorySelect = document.getElementById('job-category');
    const locationSelect = document.getElementById('job-location');
    const searchBtn = document.getElementById('search-btn');
    const jobChart = document.getElementById('job-chart');
    const recruiterList = document.getElementById('recruiter-list');
    
    const dummyJobs = [
        { title: 'Frontend Developer', category: 'tech', company: 'TechCorp', location: 'New York', description: 'Develop modern web applications using React and Vue.js.' },
        { title: 'Financial Analyst', category: 'finance', company: 'MoneyBank', location: 'London', description: 'Analyze financial data and prepare reports for management.' },
        { title: 'Registered Nurse', category: 'healthcare', company: 'CityHospital', location: 'Chicago', description: 'Provide patient care in a fast-paced hospital environment.' },
        { title: 'Math Teacher', category: 'education', company: 'LearnWell School', location: 'Los Angeles', description: 'Teach mathematics to high school students and prepare them for college.' },
        { title: 'Backend Developer', category: 'tech', company: 'WebSolutions', location: 'San Francisco', description: 'Build scalable backend systems using Node.js and Python.' },
        { title: 'Data Scientist', category: 'tech', company: 'DataInsights', location: 'Remote', description: 'Apply machine learning algorithms to solve complex business problems.' },
        { title: 'Investment Banker', category: 'finance', company: 'GlobalFinance', location: 'New York', description: 'Assist clients with mergers, acquisitions, and other financial transactions.' },
        { title: 'Pediatrician', category: 'healthcare', company: 'KidsCare Clinic', location: 'Boston', description: 'Provide medical care for infants, children, and adolescents.' },
        { title: 'English Professor', category: 'education', company: 'State University', location: 'Austin', description: 'Teach undergraduate and graduate courses in English literature and composition.' },
        { title: 'UX Designer', category: 'tech', company: 'DesignStudio', location: 'Seattle', description: 'Create intuitive and visually appealing user interfaces for web and mobile applications.' }
    ];

    const renderJobs = (jobs) => {
        jobListings.innerHTML = '';
        const jobCounts = {
            tech: 0,
            finance: 0,
            healthcare: 0,
            education: 0
        };

        jobs.forEach(job => {
            const jobElement = document.createElement('div');
            jobElement.classList.add('job-listing', 'slide-in');
            jobElement.innerHTML = `
                <h3>${job.title}</h3>
                <p><strong>Company:</strong> ${job.company}</p>
                <p><strong>Location:</strong> ${job.location}</p>
                <p>${job.description}</p>
                <button class="btn apply-btn">Apply Now</button>
            `;
            jobListings.appendChild(jobElement);

            jobCounts[job.category]++;
        });

        // Update job counts
        Object.keys(jobCounts).forEach(category => {
            const countElement = document.querySelector(`#${category} .job-count`);
            if (countElement) {
                countElement.textContent = jobCounts[category];
            }
        });
    };

    const filterJobs = (query, category, location) => {
        return dummyJobs.filter(job => 
            (job.title.toLowerCase().includes(query.toLowerCase()) ||
            job.company.toLowerCase().includes(query.toLowerCase()) ||
            job.description.toLowerCase().includes(query.toLowerCase())) &&
            (category === '' || job.category === category) &&
            (location === '' || job.location.toLowerCase().includes(location.toLowerCase()))
        );
    };

    searchBtn.addEventListener('click', () => {
        const query = searchInput.value;
        const category = categorySelect.value;
        const location = locationSelect.value;
        const filteredJobs = filterJobs(query, category, location);
        renderJobs(filteredJobs);
    });

    // Job market insights chart
    const createJobInsightsChart = () => {
        const ctx = jobChart.getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Technology', 'Finance', 'Healthcare', 'Education'],
                datasets: [{
                    label: 'Job Openings',
                    data: [65, 59, 80, 81],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    };

    // Top recruiters
    const renderTopRecruiters = () => {
        const recruiters = [
            { name: 'TechCorp', logo: 'techcorp-logo.png', openings: 15 },
            { name: 'MoneyBank', logo: 'moneybank-logo.png', openings: 10 },
            { name: 'CityHospital', logo: 'cityhospital-logo.png', openings: 20 },
            { name: 'LearnWell School', logo: 'learnwell-logo.png', openings: 8 }
        ];

        recruiters.forEach(recruiter => {
            const recruiterElement = document.createElement('div');
            recruiterElement.classList.add('recruiter-card');
            recruiterElement.innerHTML = `
                <img src="images/${recruiter.logo}" alt="${recruiter.name} logo">
                <h4>${recruiter.name}</h4>
                <p>Open positions: ${recruiter.openings}</p>
                <a href="#" class="btn">View Jobs</a>
            `;
            recruiterList.appendChild(recruiterElement);
        });
    };

    // Initial render
    renderJobs(dummyJobs);
    createJobInsightsChart();
    renderTopRecruiters();
});
</script>

<style>
.job-search {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.job-search input,
.job-search select {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
}

.job-categories {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.category {
    background-color: var(--primary-color);
    color: white;
    padding: 1rem;
    border-radius: 4px;
    transition: transform 0.3s;
}

.category:hover {
    transform: translateY(-5px);
}

.job-listing {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 4px;
    transition: box-shadow 0.3s;
}

.job-listing:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.apply-btn {
    margin-top: 1rem;
}

.job-insights {
    margin-top: 2rem;
}

#job-chart {
    max-width: 600px;
    margin: 0 auto;
}

.top-recruiters {
    margin-top: 2rem;
}

.recruiter-card {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    padding: 1rem;
    margin-bottom: 1rem;
    text-align: center;
}

.recruiter-card img {
    max-width: 100px;
    margin-bottom: 1rem;
}
</style>

