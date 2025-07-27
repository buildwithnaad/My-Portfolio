const scrollBtn = document.getElementById('zxy__ScrollTopBtn');
const fillBar = document.getElementById('zxy__FillBar');

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY || window.pageYOffset;
  const windowHeight = window.innerHeight;
  const docHeight = document.body.scrollHeight - windowHeight;
  const scrollPercent = Math.min(scrollY / docHeight, 1);

  // Show after 100vh
  if (scrollY > windowHeight) {
    scrollBtn.classList.add('zxy__UptBtn_shown');
  } else {
    scrollBtn.classList.remove('zxy__UptBtn_shown');
  }

  // Fill height based on scroll
  fillBar.style.height = `${scrollPercent * 100}%`;
});

scrollBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});
// $('#head').on('click', function(){

//   $('#bg-image').toggle( );

// })


$(document).ready(function () {
  // Checkbox set to ON on load
  $('#themeToggle').prop('checked', true).trigger('change');

  // Use change event (works for both touch and click)
  $('#themeToggle').on('change', function () {
    $('body').toggleClass('light');
    $('#themeIcon').toggleClass('fa-sun fa-moon');
    $('#bg-image').toggle();
    console.log('Theme toggled!');
  });
});
