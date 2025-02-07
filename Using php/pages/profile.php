<?php
// In a real application, you would fetch user data from a database
$user = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'profession' => 'Software Developer',
    'experience' => '5 years',
    'skills' => ['JavaScript', 'PHP', 'Python', 'SQL', 'React', 'Node.js'],
    'education' => 'Bachelor of Science in Computer Science',
    'location' => 'New York, NY',
    'applied_jobs' => [
        ['title' => 'Senior Developer', 'company' => 'Tech Corp', 'status' => 'In Review'],
        ['title' => 'Full Stack Engineer', 'company' => 'Web Solutions', 'status' => 'Interviewed'],
    ],
    'saved_jobs' => [
        ['title' => 'DevOps Engineer', 'company' => 'Cloud Systems'],
        ['title' => 'AI Researcher', 'company' => 'AI Innovations'],
    ],
    'offers' => [
        ['title' => 'Backend Developer', 'company' => 'Data Systems', 'salary' => '$120,000'],
    ],
];
?>

<section class="profile fade-in">
    <h2>User Profile</h2>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-picture-container">
                <img src="images/profile-placeholder.jpg" alt="Profile Picture" class="profile-picture">
                <button id="upload-picture" class="btn">Upload Picture</button>
            </div>
            <div class="profile-summary">
                <h3><?php echo $user['name']; ?></h3>
                <p><?php echo $user['profession']; ?></p>
                <p><?php echo $user['location']; ?></p>
            </div>
        </div>
        <div class="profile-details">
            <div class="detail-section">
                <h4>Contact Information</h4>
                <p>Email: <?php echo $user['email']; ?></p>
            </div>
            <div class="detail-section">
                <h4>Professional Summary</h4>
                <p>Experience: <?php echo $user['experience']; ?></p>
                <p>Education: <?php echo $user['education']; ?></p>
            </div>
            <div class="detail-section">
                <h4>Skills</h4>
                <div class="skills-list">
                    <?php foreach ($user['skills'] as $skill): ?>
                        <span class="skill-tag"><?php echo $skill; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="detail-section">
                <h4>Resume</h4>
                <button id="upload-resume" class="btn">Upload Resume</button>
                <p id="resume-status">No resume uploaded</p>
            </div>
        </div>
        <div class="profile-activity">
            <h3>Activity</h3>
            <div class="activity-section">
                <h4>Applied Jobs</h4>
                <ul>
                    <?php foreach ($user['applied_jobs'] as $job): ?>
                        <li><?php echo $job['title']; ?> at <?php echo $job['company']; ?> - <?php echo $job['status']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="activity-section">
                <h4>Saved Jobs</h4>
                <ul>
                    <?php foreach ($user['saved_jobs'] as $job): ?>
                        <li><?php echo $job['title']; ?> at <?php echo $job['company']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="activity-section">
                <h4>Received Offers</h4>
                <ul>
                    <?php foreach ($user['offers'] as $offer): ?>
                        <li><?php echo $offer['title']; ?> at <?php echo $offer['company']; ?> - <?php echo $offer['salary']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="profile-settings">
            <h3>Profile Settings</h3>
            <form id="visibility-settings">
                <h4>Visibility Preferences</h4>
                <div>
                    <input type="checkbox" id="visible-to-employers" name="visible-to-employers" checked>
                    <label for="visible-to-employers">Visible to Employers</label>
                </div>
                <div>
                    <input type="checkbox" id="show-salary" name="show-salary">
                    <label for="show-salary">Show Salary Expectations</label>
                </div>
                <button type="submit" class="btn">Save Settings</button>
            </form>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const uploadPictureBtn = document.getElementById('upload-picture');
    const uploadResumeBtn = document.getElementById('upload-resume');
    const resumeStatus = document.getElementById('resume-status');
    const visibilityForm = document.getElementById('visibility-settings');

    uploadPictureBtn.addEventListener('click', () => {
        // Implement picture upload functionality
        console.log('Upload picture clicked');
    });

    uploadResumeBtn.addEventListener('click', () => {
        // Implement resume upload functionality
        console.log('Upload resume clicked');
        resumeStatus.textContent = 'Resume uploaded successfully';
    });

    visibilityForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Implement saving visibility settings
        console.log('Visibility settings saved');
    });
});
</script>

<style>
.profile-container {
    background-color: var(--bg-color);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 2rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.profile-header {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
}

.profile-picture-container {
    position: relative;
    margin-right: 2rem;
}

.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}

#upload-picture {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.8rem;
    padding: 0.3rem 0.5rem;
}

.profile-summary {
    flex-grow: 1;
}

.profile-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.detail-section {
    background-color: var(--card-bg-color);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    padding: 1rem;
}

.detail-section h4 {
    margin-bottom: 0.5rem;
    color: var(--primary-color);
}

.skills-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.skill-tag {
    background-color: var(--accent-color);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.9rem;
}

.profile-activity {
    margin-bottom: 2rem;
}

.activity-section {
    margin-bottom: 1rem;
}

.activity-section ul {
    list-style-type: none;
    padding-left: 0;
}

.activity-section li {
    margin-bottom: 0.5rem;
}

.profile-settings {
    background-color: var(--card-bg-color);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    padding: 1rem;
}

#visibility-settings div {
    margin-bottom: 0.5rem;
}
</style>

