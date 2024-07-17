// script.js

// Get the container element
const container = document.querySelector('.container');

// Get the form elements
const form = document.querySelector('#login-form');
const inputs = form.querySelectorAll('input');
const label = form.querySelector('label');
const submitButton = form.querySelector('input[type="submit"]');
const errorMessage = document.querySelector('#error-message');

// Add event listener to the window load event
window.addEventListener('load', () => {
  // Add fade-in effect to the container
  container.classList.add('fade-in');

  // Add fade-in effect to the form elements
  inputs.forEach((input) => {
    input.classList.add('fade-in');
  });
  label.classList.add('fade-in');
  submitButton.classList.add('fade-in');
  errorMessage.classList.add('fade-in');
});

// Add CSS transition to the elements
container.style.transition = 'opacity 0.5s';
inputs.forEach((input) => {
  input.style.transition = 'opacity 0.5s';
});
label.style.transition = 'opacity 0.5s';
submitButton.style.transition = 'opacity 0.5s';
errorMessage.style.transition = 'opacity 0.5s';

// Add CSS opacity to the elements
container.style.opacity = 0;
inputs.forEach((input) => {
  input.style.opacity = 0;
});
label.style.opacity = 0;
submitButton.style.opacity = 0;
errorMessage.style.opacity = 0;