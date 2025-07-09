<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Productbeheer</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body { background: #f7f7f7; font-family: sans-serif; }
    .admin-container { max-width: 600px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 8px; }
    .admin-container input, .admin-container button, .admin-container select { margin: 0.5rem 0; }
    .product-list { margin-top: 2rem; }
    .product-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; }
    .product-item input { width: 80px; }
    .product-grid { display: flex; flex-wrap: wrap; gap: 1rem; }
    .product-item { border: 1px solid #ddd; border-radius: 8px; padding: 1rem; background: #fff; flex: 1 1 calc(33.333% - 1rem); box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .product-item img { max-width: 50%; height: auto; border-radius: 4px; }
    .product-list img { max-height: 40px; max-width: 60px; margin-left: 8px; border-radius: 4px; vertical-align: middle; }
    </style>
</head>
<body>
<div class="admin-container">
    <h2>Admin Productbeheer</h2>
    <a href="index.php" style="display:inline-block;margin-bottom:1rem;text-decoration:none;background:#eee;padding:0.5rem 1rem;border-radius:4px;color:#333;">← Terug naar webshop</a>
    <div id="login-section">
        <input type="password" id="admin-password" placeholder="Wachtwoord">
        <button onclick="login()">Login</button>
        <p id="login-error" style="color:red;"></p>
    </div>
    <div id="admin-section" style="display:none;">
        <h3>Product toevoegen/wijzigen</h3>
        <input type="text" id="product-name" placeholder="Naam">
        <input type="number" id="product-price" placeholder="Prijs" step="0.01">
        <input type="file" id="product-image" accept="image/*">
        <select id="product-category">
            <option value="hives">BeeHives</option>
            <option value="beecare">BeeCare & Feeding</option>
            <option value="tools">Tools & Clothing</option>
        </select>
        <button onclick="addOrUpdateProduct()">Opslaan</button>
        <input type="hidden" id="edit-index">
        <div class="product-list" id="product-list"></div>
    </div>
</div>
<div class="product-grid" id="product-grid"></div>
<script>
const ADMIN_PASSWORD = "beekeeper"; // Pas dit wachtwoord aan!

function login() {
    const pw = document.getElementById('admin-password').value;
    if (pw === ADMIN_PASSWORD) {
        document.getElementById('login-section').style.display = 'none';
        document.getElementById('admin-section').style.display = 'block';
        loadProducts();
    } else {
        document.getElementById('login-error').textContent = "Wachtwoord onjuist!";
    }
}

function loadProducts() {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    const list = document.getElementById('product-list');
    const grid = document.getElementById('product-grid');
    list.innerHTML = '';
    grid.innerHTML = '';
    products.forEach((prod, idx) => {
        list.innerHTML += `
            <div class="product-item">
                <span>
                    <b>${prod.name}</b> - €${prod.price} 
                    (${prod.category || 'onbekend'})
                    ${prod.image ? `<img src="${prod.image}" alt="" style="height:30px;vertical-align:middle;">` : ''}
                </span>
                <span>
                    <button onclick="editProduct(${idx})">✏️</button>
                    <button onclick="deleteProduct(${idx})">🗑️</button>
                </span>
            </div>
        `;
        grid.innerHTML += `
            <div class="product-item">
                ${prod.image ? `<img src="${prod.image}" alt="${prod.name}">` : ''}
                <h3>${prod.name}</h3>
                <p>€${prod.price}</p>
                <p style="font-size:0.9em;color:#888;">${prod.category}</p>
            </div>
        `;
    });
}

function addOrUpdateProduct() {
    const name = document.getElementById('product-name').value.trim();
    const price = parseFloat(document.getElementById('product-price').value);
    const category = document.getElementById('product-category').value;
    const editIndex = document.getElementById('edit-index').value;
    const fileInput = document.getElementById('product-image');
    const file = fileInput.files[0];

    if (!name || isNaN(price)) return alert("Vul naam en prijs in!");

    let products = JSON.parse(localStorage.getItem('products')) || [];

    function saveProduct(imageData) {
        const product = { name, price, image: imageData, category };
        if (editIndex === "") {
            products.push(product);
        } else {
            products[editIndex] = product;
            document.getElementById('edit-index').value = "";
        }
        localStorage.setItem('products', JSON.stringify(products));
        document.getElementById('product-name').value = "";
        document.getElementById('product-price').value = "";
        fileInput.value = "";
        document.getElementById('product-category').value = "hives";
        loadProducts();
    }

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            saveProduct(e.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        // Bij bewerken zonder nieuwe afbeelding: behoud oude afbeelding
        let imageData = "";
        if (editIndex !== "") {
            imageData = products[editIndex].image;
        }
        saveProduct(imageData);
    }
}

function editProduct(idx) {
    const products = JSON.parse(localStorage.getItem('products')) || [];
    const prod = products[idx];
    document.getElementById('product-name').value = prod.name;
    document.getElementById('product-price').value = prod.price;
    document.getElementById('product-image').value = prod.image || "";
    document.getElementById('product-category').value = prod.category || "hives";
    document.getElementById('edit-index').value = idx;
}

function deleteProduct(idx) {
    let products = JSON.parse(localStorage.getItem('products')) || [];
    products.splice(idx, 1);
    localStorage.setItem('products', JSON.stringify(products));
    loadProducts();
}

// Eenmalig uitvoeren om je bestaande producten in localStorage te zetten
if (!localStorage.getItem('products')) {
    localStorage.setItem('products', JSON.stringify([
        { name: "Product 1", price: 10, image: "images/product1.jpg", category: "hives" },
        { name: "Product 2", price: 20, image: "images/product2.jpg", category: "beecare" },
        { name: "Product 3", price: 30, image: "images/product3.jpg", category: "tools" }
    ]));
}
</script>
</body>
</html>