<!-- filepath: c:\xampp\htdocs\Beetraining\BeeTraining\public\hives.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeTraining Webshop - BeeHives</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="hives.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Onderdeel van Bee-Ideas</h1>
        </header>
        <div class="logo-container">
            <button class="menu-btn" onclick="openMenu()">Menu</button>
            <div class='logo'>
                <a href="admin.php" title="Ga naar admin">
                    <img src="images/logo.png" alt="BeeTraining Logo" style="cursor:pointer;">
                </a>
            </div>
            <button class="view-cart-btn" onclick="openCart()">🛒</button>
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
        <h2 class="page-title">BeeHives</h2>
        <div class="divider"></div>
        <main>
            <h2>Onze Producten</h2>
            <div class="product-grid" id="product-grid"></div>
        </main>
        <footer>
            <p>&copy; 2025 BeeTraining. All rights reserved.</p>
        </footer>
    </div>
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
        function showProducts() {
        const products = JSON.parse(localStorage.getItem('products')) || [];
        const grid = document.getElementById('product-grid');
        grid.innerHTML = '';
        products
            .filter(prod => prod.category === "hives")
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
    document.addEventListener('DOMContentLoaded', showProducts);
    </script>
    <script src="menu.js"></script>
    <script src="cart.js"></script>
</body>
</html>