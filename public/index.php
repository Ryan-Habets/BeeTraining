<!-- filepath: c:\xampp\htdocs\Beetraining\BeeTraining\public\index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeTraining</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Onderdeel van Bee-Ideas</h1>
        </header>
        <div class="logo-container">
            <button class="menu-btn" onclick="openMenu()">Menu</button>
            <img src="images/logo.png" alt="BeeTraining Logo">
        </div>
    </div>
    <div class="divider"></div>
    <div class="container">
        <main>
            <div class="rectangle-box">
                <p>introductie webshop</p>
            </div>
            <div class="scroll-space"></div>
        </main>
    </div>
    <footer>
        <p>&copy; 2025 BeeTraining. All rights reserved.</p>
    </footer>

    <!-- Slide-Over Menu -->
    <div id="menu-overlay" class="menu-overlay">
        <button class="close-btn" onclick="closeMenu()">←</button> <!-- Left-pointing arrow -->
        <nav class="menu-links">
            <a href="index.php">Home</a>
            <a href="hives.php">BeeHives</a>
            <a href="#">BeeCare & Feeding</a>
            <a href="#">Tools & Clothing</a>
        </nav>
    </div>

    <script src="menu.js"></script>
</body>
</html>