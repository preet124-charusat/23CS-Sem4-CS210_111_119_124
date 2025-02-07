<?php
// Ensure the user is logged in
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: index.php?page=login");
//     exit();
// }

// In a real application, you would fetch this data from a database
$user = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'applied_jobs' => [
        ['title' => 'Senior Developer', 'company' => 'Tech Corp', 'status' => 'In Review'],
        ['title' => 'Full Stack Engineer', 'company' => 'Web Solutions', 'status' => 'Interviewed'],
    ],
    'saved_jobs' => [
        ['title' => 'DevOps Engineer', 'company' => 'Cloud Systems'],
        ['title' => 'AI Researcher', 'company' => 'AI Innovations'],
    ],
    'upcoming_deadlines' => [
        ['title' => 'Submit portfolio', 'date' => '2023-06-15'],
        ['title' => 'Follow-up interview', 'date' => '2023-06-20'],
    ],
];
?>

<section class="dashboard fade-in">
    <h2>Welcome, <?php echo $user['name']; ?>!</h2>
    <div class="dashboard-container">
        <div class="dashboard-section">
            <h3>Application Status</h3>
            <div class="application-status">
                <?php foreach ($user['applied_jobs'] as $job): ?>
                    <div class="status-card">
                        <h4><?php echo $job['title']; ?></h4>
                        <p><?php echo $job['company']; ?></p>
                        <span class="status-badge"><?php echo $job['status']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="dashboard-section">
            <h3>Saved Jobs</h3>
            <div class="saved-jobs">
                <?php foreach ($user['saved_jobs'] as $job): ?>
                    <div class="job-card">
                        <h4><?php echo $job['title']; ?></h4>
                        <p><?php echo $job['company']; ?></p>
                        <button class="btn">Apply Now</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="dashboard-section">
            <h3>Upcoming Deadlines</h3>
            <div class="deadlines">
                <?php foreach ($user['upcoming_deadlines'] as $deadline): ?>
                    <div class="deadline-card">
                        <h4><?php echo $deadline['title']; ?></h4>
                        <p>Due: <?php echo $deadline['date']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="dashboard-section">
            <h3>Job Market Insights</h3>
            <div id="job-market-chart"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Job Market Insights Chart
    const ctx = document.getElementById('job-market-chart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Job Openings',
                data: [65, 59, 80, 81, 56, 55],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<style>
.dashboard-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.dashboard-section {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.application-status, .saved-jobs, .deadlines {
    display: grid;
    gap: 1rem;
}

.status-card, .job-card, .deadline-card {
    background-color: var(--card-bg-color);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    padding: 1rem;
}

.status-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    background-color: var(--accent-color);
    color: white;
    border-radius: 4px;
    font-size: 0.8rem;
}

#job-market-chart {
    height: 300px;
}
</style>

