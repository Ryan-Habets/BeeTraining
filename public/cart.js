let cart = []; // Array to store cart items

// Function to add an item to the cart
function addToCart(productName, price) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1; // Increment quantity if item already exists
    } else {
        cart.push({ name: productName, price: price, quantity: 1 }); // Add new item
    }
    alert(`${productName} has been added to your cart.`);
    updateCart();
}

// Function to open the cart pop-up
function openCart() {
    const cartPopup = document.getElementById('cart-popup');
    const cartOverlay = document.getElementById('cart-overlay');
    if (cartPopup && cartOverlay) {
        cartPopup.style.display = 'block'; // Show the cart pop-up
        cartOverlay.style.display = 'block'; // Show the background overlay
    }
    updateCart();
}

// Function to close the cart pop-up
function closeCart() {
    const cartPopup = document.getElementById('cart-popup');
    const cartOverlay = document.getElementById('cart-overlay');
    if (cartPopup && cartOverlay) {
        cartPopup.style.display = 'none'; // Hide the cart pop-up
        cartOverlay.style.display = 'none'; // Hide the background overlay
    }
}

// Function to update the cart display
function updateCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    cartItemsContainer.innerHTML = ''; // Clear existing items

    let total = 0;
    cart.forEach(item => {
        total += item.price * item.quantity;
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <p>${item.name} (x${item.quantity}) - €${(item.price * item.quantity).toFixed(2)}</p>
            <button onclick="removeFromCart('${item.name}')">Remove</button>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    cartTotalElement.textContent = total.toFixed(2); // Update total price
}

// Function to remove an item from the cart
function removeFromCart(productName) {
    cart = cart.filter(item => item.name !== productName); // Remove item
    updateCart();
}

// Function to handle checkout (placeholder)
function checkout() {
    alert('Checkout functionality is not implemented yet.');
}