<!-- filepath: c:\xampp\htdocs\Beetraining\BeeTraining\public\hives.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BeeTraining Webshop - Tools & Clothing</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="toolsclothing.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Part of Bee-Ideas</h1>
        </header>
        <div class="logo-container">
            <!-- Menu button -->
            <button class="menu-btn" onclick="openMenu()">Menu</button>
            <!-- Logo links to admin page -->
            <div class='logo'>
                <a href="admin.php" title="Go to admin">
                    <img src="images/logo.png" alt="BeeTraining Logo" style="cursor:pointer;">
                </a>
            </div>
            <!-- Cart button -->
            <button class="view-cart-btn" onclick="openCart()">🛒</button>
            <!-- Cart popup (shared across all pages) -->
            <div id="cart-popup" class="cart-popup">
                <div class="cart-header">
                    <h2>Shopping Cart</h2>
                    <button class="close-cart-btn" onclick="closeCart()">×</button>
                </div>
                <div class="cart-items"></div>
                <div class="cart-footer">
                    <p>Total: €<span id="cart-total">0.00</span></p>
                    <button onclick="checkout()">Checkout</button>
                </div>
            </div>
            <div id="cart-overlay" class="cart-overlay" onclick="closeCart()"></div>
        </div>
        <h2 class="page-title">Tools & Clothing</h2>
        <div class="divider"></div>
        <main>
            <h2>Our Products</h2>
            <!-- Product grid: products are loaded dynamically from localStorage -->
            <div class="product-grid" id="product-grid"></div>
        </main>
        <footer>
            <p>&copy; 2025 BeeTraining. All rights reserved.</p>
        </footer>
    </div>
    <!-- Menu overlay for navigation -->
    <div id="menu-overlay" class="menu-overlay">
        <button class="close-btn" onclick="closeMenu()">←</button>
        <nav class="menu-links">
            <a href="index.php">Home</a>
            <a href="hives.php">BeeHives</a>
            <a href="BeeCare.php">BeeCare & Feeding</a>
            <a href="ToolsClothing.php">Tools & Clothing</a>
        </nav>
    </div>
    <script>
    // Show only products for the "tools" category
    function showProducts() {
        // Get all products from localStorage
        const products = JSON.parse(localStorage.getItem('products')) || [];
        const grid = document.getElementById('product-grid');
        grid.innerHTML = '';
        // Filter and display only products for this page's category
        products
            .filter(prod => prod.category === "Bee-T&C")
            .forEach(prod => {
                grid.innerHTML += `
                    <div class="product-item">
                        ${prod.image ? `<img src="${prod.image}" alt="${prod.name}">` : ''}
                        <h3>${prod.name}</h3>
                        <p>€${prod.price}</p>
                        <button onclick="addToCart('${prod.name}', ${prod.price})">Add to Cart</button>
                    </div>
                `;
            });
    }
    // Run showProducts when the page is loaded
    document.addEventListener('DOMContentLoaded', showProducts);
    </script>
    <!-- Menu and cart scripts (shared across all pages) -->
    <script src="menu.js"></script>
    <script src="cart.js"></script>
</body>
</html>