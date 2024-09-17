const scrollTopBtn = document.getElementById('scrollTopBtn');

// Show button when user scrolls down 100px
window.onscroll = function() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    scrollTopBtn.style.display = "block";
  } else {
    scrollTopBtn.style.display = "none";
  }
};

// Scroll to top when button is clicked
scrollTopBtn.onclick = function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
};





  const loadingSpinner = document.getElementById('loadingSpinner');
  window.addEventListener('load', function() {
    loadingSpinner.style.display = 'none'; // Hide spinner when page loads
  });
  window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
      loadingSpinner.style.display = 'none'; // Hide spinner if page is loaded from cache
    }
  });
  window.addEventListener('beforeunload', function() {
    loadingSpinner.style.display = 'flex'; // Show spinner before leaving the page
  });