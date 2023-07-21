document.getElementById('menu-btn').addEventListener('click', function () {
    document.getElementById('side-nav').classList.toggle('open');
  });
  
  document.getElementById('close-btn').addEventListener('click', function () {
    document.getElementById('side-nav').classList.remove('open');
  });
  