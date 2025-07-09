<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Cart Animation Test</title>
<style>
  body {
    font-family: sans-serif;
    margin: 2rem;
  }
  .view-cart-btn {
    font-size: 2rem;
    padding: 0.5rem 1rem;
    cursor: pointer;
  }
  .cart-popup {
    display: none;
    position: fixed;
    width: 300px;
    padding: 1rem;
    background: white;
    border: 2px solid #8e8276;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.5);
    transition: all 0.4s ease;
    z-index: 1000;
  }
  .cart-overlay {
    display: none;
    position: fixed;
    top:0; left:0; right:0; bottom:0;
    background: rgba(0,0,0,0.5);
    z-index: 900;
  }
</style>
</head>
<body>

<button class="view-cart-btn">🛒</button>

<div class="cart-popup">
  <h2>Winkelwagen</h2>
  <p>Je winkelwagen is leeg.</p>
  <button onclick="closeCart()">Sluit</button>
</div>

<div class="cart-overlay" onclick="closeCart()"></div>

<script>
  const cartBtn = document.querySelector('.view-cart-btn');
  const cartPopup = document.querySelector('.cart-popup');
  const cartOverlay = document.querySelector('.cart-overlay');

  cartBtn.addEventListener('click', () => {
    // Startpositie: popup bij knop
    const rect = cartBtn.getBoundingClientRect();

    cartPopup.style.display = 'block';
    cartOverlay.style.display = 'block';
    cartPopup.style.opacity = '0';
    cartPopup.style.top = `${rect.top + rect.height / 2}px`;
    cartPopup.style.left = `${rect.left + rect.width / 2}px`;
    cartPopup.style.transform = 'translate(-50%, -50%) scale(0.5)';

    // Force reflow
    cartPopup.offsetHeight;

    // Animate naar midden
    cartPopup.style.opacity = '1';
    cartPopup.style.top = '50%';
    cartPopup.style.left = '50%';
    cartPopup.style.transform = 'translate(-50%, -50%) scale(1)';
  });

  function closeCart() {
    const rect = cartBtn.getBoundingClientRect();

    cartPopup.style.opacity = '0';
    cartPopup.style.top = `${rect.top + rect.height / 2}px`;
    cartPopup.style.left = `${rect.left + rect.width / 2}px`;
    cartPopup.style.transform = 'translate(-50%, -50%) scale(0.5)';

    setTimeout(() => {
      cartPopup.style.display = 'none';
      cartOverlay.style.display = 'none';
    }, 400);
  }
</script>

</body>
</html>
