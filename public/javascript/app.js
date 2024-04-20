let alerts = document.querySelectorAll('.alert');

if (alerts.length > 0) {
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.classList.add('d-none');
    }, 4000);
  });
}


