// Laad cart uit localStorage, of begin met een lege array
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Sla cart op in localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Voeg een product toe aan de cart
function addToCart(productName, price) {
    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: price, quantity: 1 });
    }
    saveCart();
    alert(`${productName} has been added to your cart.`);
    updateCart();
}

// Verwijder een product uit de cart
function removeFromCart(productName) {
    cart = cart.filter(item => item.name !== productName);
    saveCart();
    updateCart();
}

// Update de cart-weergave
function updateCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    if (!cartItemsContainer || !cartTotalElement) return;

    cartItemsContainer.innerHTML = '';
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

    cartTotalElement.textContent = total.toFixed(2);
}

// Toon de cart pop-up
function openCart() {
    const cartPopup = document.getElementById('cart-popup');
    const cartOverlay = document.getElementById('cart-overlay');
    if (cartPopup && cartOverlay) {
        cartPopup.style.display = 'block';
        cartOverlay.style.display = 'block';
    }
    updateCart();
}

// Sluit de cart pop-up
function closeCart() {
    const cartPopup = document.getElementById('cart-popup');
    const cartOverlay = document.getElementById('cart-overlay');
    if (cartPopup && cartOverlay) {
        cartPopup.style.display = 'none';
        cartOverlay.style.display = 'none';
    }
}

// Placeholder voor checkout
function checkout() {
    alert('Checkout functionality is not implemented yet.');
}

// Zorg dat de cart altijd wordt getoond bij laden van de pagina
document.addEventListener('DOMContentLoaded', updateCart);