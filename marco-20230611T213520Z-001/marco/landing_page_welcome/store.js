//------------botao do side bar menu----------------//

const toggleBtn = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');
const closeBtn = document.getElementById('close-btn');

toggleBtn.addEventListener('click', function() {
    sidebar.style.width = '250px';
});    

closeBtn.addEventListener('click', function() {
    sidebar.style.width = '0';
});  
//----------------------////----------------------//

//--------------------Slider---------------------//
const smallSlider = document.querySelector('.small-slider');
const prevButton = document.querySelector('#prev-button');
const nextButton = document.querySelector('#next-button');

prevButton.addEventListener('click', () => {
    smallSlider.scrollBy({
        top: 0,
        left: -800,
        behavior: 'smooth'
    });
});

nextButton.addEventListener('click', () => {
    smallSlider.scrollBy({
        top: 0,
        left: 800,
        behavior: 'smooth'
    });
});
//----------------------////----------------------//

//-------Show/hide login e register pop-ups-------//
const loginButton = document.getElementById('login-btn');
const regButton = document.getElementById('register-btn');
const regPopup = document.getElementById('register-popup');
const loginPopup = document.getElementById('login-popup');
const closePopup = document.querySelectorAll('.popup-close');
const switchPopupBtns = document.querySelectorAll('#switch-popup');

loginButton.addEventListener('click', function() {
    loginPopup.classList.add('show-popup');
});

regButton.addEventListener('click', function() {
    regPopup.classList.add('show-popup');
});

closePopup.forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
        loginPopup.classList.remove('show-popup');
        regPopup.classList.remove('show-popup');
    });
});

switchPopupBtns.forEach(function(switchBtn) {
    switchBtn.addEventListener('click', function() {
        loginPopup.classList.toggle('show-popup');
        regPopup.classList.toggle('show-popup');
    });
});
//----------------------////----------------------//