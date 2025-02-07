<?php
// Ensure the user is logged in and has admin privileges
// session_start();
// if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
//     header("Location: index.php");
//     exit();
// }

// In a real application, you would fetch this data from a database
$jobPostings = [
    ['id' => 1, 'title' => 'Senior Developer', 'company' => 'Tech Corp', 'status' => 'Active'],
    ['id' => 2, 'title' => 'Marketing Manager', 'company' => 'Brand Co', 'status' => 'Inactive'],
    ['id' => 3, 'title' => 'Data Analyst', 'company' => 'Data Insights', 'status' => 'Active'],
];

$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Job Seeker'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Employer'],
    ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com', 'role' => 'Admin'],
];
?>

<section class="admin-panel fade-in">
    <h2>Admin Panel</h2>
    <div class="admin-container">
        <div class="admin-section">
            <h3>Manage Job Postings</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jobPostings as $job): ?>
                        <tr>
                            <td><?php echo $job['id']; ?></td>
                            <td><?php echo $job['title']; ?></td>
                            <td><?php echo $job['company']; ?></td>
                            <td><?php echo $job['status']; ?></td>
                            <td>
                                <button class="btn btn-small">Edit</button>
                                <button class="btn btn-small btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn" id="add-job">Add New Job</button>
        </div>
        <div class="admin-section">
            <h3>Manage Users</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td>
                                <button class="btn btn-small">Edit</button>
                                <button class="btn btn-small btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn" id="add-user">Add New User</button>
        </div>
        <div class="admin-section">
            <h3>Site Statistics</h3>
            <div id="site-stats-chart"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Site Statistics Chart
    const ctx = document.getElementById('site-stats-chart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Job Postings', 'Active Users', 'Applications', 'Successful Placements'],
            datasets: [{
                label: 'Site Statistics',
                data: [150, 1000, 500, 75],
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

    // Add event listeners for add buttons
    document.getElementById('add-job').addEventListener('click', () => {
        alert('Add new job functionality to be implemented');
    });

    document.getElementById('add-user').addEventListener('click', () => {
        alert('Add new user functionality to be implemented');
    });
});
</script>

<style>
.admin-container {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}

.admin-section {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1rem;
}

.admin-table th,
.admin-table td {
    padding: 0.5rem;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.admin-table th {
    background-color: var(--primary-color);
    color: white;
}

.btn-small {
    padding: 0.25rem 0.5rem;
    font-size: 0.8rem;
}

.btn-danger {
    background-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
}

#site-stats-chart {
    height: 300px;
}
</style>

