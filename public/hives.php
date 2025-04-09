<!-- filepath: c:\xampp\htdocs\Beetraining\BeeTraining\public\hives.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeTraining Webshop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="hives.css"> <!-- Link to the new CSS file -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Onderdeel van Bee-Ideas</h1>
        </header>
        <div class="logo-container">
            <button class="menu-btn" onclick="openMenu()">Menu</button> <!-- Menu button -->
            <img src="images/logo.png" alt="BeeTraining Logo">
            <button class="view-cart-btn" onclick="openCart()">🛒</button> <!-- Shopping cart button -->
                        <!-- Shopping Cart Pop-Up -->
            <div id="cart-popup" class="cart-popup">
                <div class="cart-header">
                    <h2>Shopping Cart</h2>
                    <button class="close-cart-btn" onclick="closeCart()">×</button>
                </div>
                <div class="cart-items">
                    <!-- Cart items will be dynamically added here -->
                </div>
                <div class="cart-footer">
                    <p>Total: €<span id="cart-total">0.00</span></p>
                    <button onclick="checkout()">Checkout</button>
                </div>
            </div>
            
            <!-- Background Overlay -->
            <div id="cart-overlay" class="cart-overlay" onclick="closeCart()"></div>
            </div>
        </div>
        <div class="divider"></div>
        <main>
            <h2>Our Products</h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="images/product1.jpg" alt="Product 1">
                    <h3>Product 1</h3>
                    <p>€10.00</p>
                    <button onclick="addToCart('Product 1', 10)">Add to Cart</button>
                </div>
                <div class="product-item">
                    <img src="images/product2.jpg" alt="Product 2">
                    <h3>Product 2</h3>
                    <p>€20.00</p>
                    <button onclick="addToCart('Product 2', 20)">Add to Cart</button>
                </div>
                <div class="product-item">
                    <img src="images/product3.jpg" alt="Product 3">
                    <h3>Product 3</h3>
                    <p>€30.00</p>
                    <button onclick="addToCart('Product 3', 30)">Add to Cart</button>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 BeeTraining. All rights reserved.</p>
        </footer>
    </div>

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
    <script src="cart.js"></script> <!-- New JavaScript file for cart functionality -->
</body>
</html>