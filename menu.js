let cart = [];
const cartDashboard = document.getElementById('cartDashboard');
const cartItems = document.getElementById('cartItems');
const cartTotal = document.getElementById('cartTotal');
const closeBtn = document.querySelector('.close-btn');
const checkoutBtn = document.querySelector('.checkout_btn');
const popup = document.getElementById('popup');
const popupMessage = document.getElementById('popupMessage');
const closePopup = document.querySelector('.close-popup');

function addToCart(itemName, itemPrice, itemImage) {
    // Add item to cart
    cart.push({ name: itemName, price: itemPrice, image: itemImage });
    
    // Update cart UI
    updateCart();
    
    // Display cart dashboard
    cartDashboard.classList.add('active');
}

function updateCart() {
    // Clear existing cart items
    cartItems.innerHTML = '';
    
    // Calculate total
    let total = 0;
    cart.forEach((item, index) => {
        // Add item to cart UI
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart_item');
        
        itemElement.innerHTML = `
            <div class="item_info">
                <div>
                    <h4>${item.name}</h4>
                    <p>LKR ${item.price.toFixed(2)}</p>
                </div>
            </div>
            <div class="remove-btn" onclick="removeFromCart(${index})">&times;</div>
        `;
        cartItems.appendChild(itemElement);
        
        // Update total
        total += item.price;
    });
    
    // Update total in cart UI
    cartTotal.innerText = total.toFixed(2);
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function displayPopup(message) {
    popupMessage.innerText = message;
    popup.classList.remove('hidden');
}

closeBtn.addEventListener('click', () => {
    cartDashboard.classList.remove('active');
});

closePopup.addEventListener('click', () => {
    popup.classList.add('hidden');
});

checkoutBtn.addEventListener('click', () => {
    if (cart.length === 0) {
        displayPopup("Please select your items.");
    } else {
        displayPopup("Order placed successfully!");
    }
});
