<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'main';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobRecruit - Find Your Dream Job</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
    <script src="js/main.js" defer></script>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <main>
        <?php
        switch ($page) {
            case 'main':
                include 'pages/main.php';
                break;
            case 'profile':
                include 'pages/profile.php';
                break;
            case 'jobs':
                include 'pages/jobs.php';
                break;
            case 'contact':
                include 'pages/contact.php';
                break;
            case 'about':
                include 'pages/about.php';
                break;
            case 'login':
                include 'pages/login.php';
                break;
            case 'dashboard':
                include 'pages/dashboard.php';
                break;
            case 'admin':
                include 'pages/admin.php';
                break;
            case 'blog':
                include 'pages/blog.php';
                break;
            default:
                include 'pages/main.php';
        }
        ?>
    </main>

    <?php include 'components/footer.php'; ?>
    <script src="js/theme.js"></script>
</body>
</html>

