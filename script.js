document.getElementById('learnMore').addEventListener('click', () => {
  alert('Discover more about our features!');
});

const form = document.querySelector('form');
form.addEventListener('submit', (event) => {

  const name = document.getElementById('name').value;
  const message = document.getElementById('message').value;

  if (name && message) {
      // alert(`Thank you, ${name}! Your message has been submitted.`);
  } else {
      alert('Please fill out all fields before submitting.');
  }
});