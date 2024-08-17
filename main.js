//-----------------LogIn / Sign Up------------------
// JavaScript for handling the pop-ups
document.addEventListener('DOMContentLoaded', function() {
  var showLoginSignUp = document.getElementById('showLoginSignUp');
  var popupBox = document.querySelector('.PopupBox');
  var loginForm = document.getElementById('loginForm');
  var signUpForm = document.getElementById('signUpForm');

  // Show the pop-up box when the "Log In / Sign Up" link is clicked
  showLoginSignUp.addEventListener('click', function(event) {
      event.preventDefault();
      popupBox.style.display = 'flex'; // Show the pop-up box
      loginForm.style.display = 'block'; // Show the login form by default
      signUpForm.style.display = 'none'; // Hide the sign-up form
  });

  // Show the Sign-Up form
  document.getElementById('showSignUp').addEventListener('click', function(event) {
      event.preventDefault();
      loginForm.style.display = 'none';
      signUpForm.style.display = 'block';
  });

  // Show the Login form
  document.getElementById('showLogIn').addEventListener('click', function(event) {
      event.preventDefault();
      signUpForm.style.display = 'none';
      loginForm.style.display = 'block';
  });

  // Hide the pop-up box when clicking outside (optional)
  window.addEventListener('click', function(event) {
      if (event.target === popupBox) {
          popupBox.style.display = 'none';
      }
  });
});


// ------------Shop Page-------------------------
document.addEventListener('DOMContentLoaded', () => {
    // Get the filter checkboxes and product items
    const filterForm = document.getElementById('filter-form');
    const products = document.querySelectorAll('.FastFoodChain');
  
    // Event listener for filter changes
    filterForm.addEventListener('change', () => {
      // Get selected filters
      const selectedFilters = Array.from(filterForm.querySelectorAll('input[type="checkbox"]:checked'))
        .map(input => input.id.split('-')[0]);
  
      // Filter products based on selected filters
      products.forEach(product => {
        const categories = product.getAttribute('data-categories').split(',');
        const matchesFilter = selectedFilters.length === 0 || selectedFilters.some(filter => categories.includes(filter));
  
        // Show or hide the product
        product.style.display = matchesFilter ? 'block' : 'none';
      });
    });
  });
//------------------Menu Page ------------------------------------
let orderItems = [];
let totalPrice = 0;

function addToOrder(name, price) {
  // Check if the item already exists in the order
  const existingItem = orderItems.find(item => item.name === name);
  if (existingItem) {
    // If the item exists, increment the quantity
    existingItem.quantity += 1;
  } else {
    // If the item does not exist, add it to the orderItems array
    orderItems.push({ name, price, quantity: 1 });
  }
  // Update the order summary display
  updateOrderSummary();
}

function updateOrderSummary() {
  const orderItemsContainer = document.getElementById('order-items');
  orderItemsContainer.innerHTML = ''; // Clear the existing order summary display

  totalPrice = 0; // Reset the total price to zero
  orderItems.forEach(item => {
    // Calculate the total price by summing up the price of each item multiplied by its quantity
    totalPrice += item.price * item.quantity;

    // Create a new div element for each order item
    const itemElement = document.createElement('div');
    itemElement.classList.add('order-item');
    itemElement.innerHTML = `
      <div>${item.name} x ${item.quantity} - ₱${(item.price * item.quantity).toFixed(2)}</div>
    `;
    // Append the created item element to the order items container
    orderItemsContainer.appendChild(itemElement);
  });

  // Update the total price display
  document.getElementById('total-price').textContent = totalPrice.toFixed(2);
}

function placeOrder() {
  // Check if the order is empty
  if (orderItems.length === 0) {
    alert('Your order is empty!');
    return;
  }

  // Display a success message
  alert('Order placed successfully!');
  
  // Reset the orderItems array and update the order summary display
  orderItems = [];
  updateOrderSummary();
}

// Handle the Login/Signup form submission
document.getElementById('authForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission behavior
  alert('Login/Signup submitted!');
});
