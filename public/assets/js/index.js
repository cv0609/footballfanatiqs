// Toggle Menu Functionaliy Start
document.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".menu-toggle-btn").addEventListener("click", function () {
    document.body.classList.add("menuToggle");
  });

  document.querySelector(".menu-close-btn").addEventListener("click", function () {
    document.body.classList.remove("menuToggle");
  });
});
// Toggle Menu Functionaliy End


  // Header Scroll JS Start
  $(document).ready(function () {
    $(window).scroll(function () {
      var header = $("header");
      header.toggleClass("fixed-header", $(window).scrollTop() > 0);
    });
  });
  // Header Scroll JS End

// AOS JS Start
AOS.init();
// AOS JS Start




// Newsletter Validations JS Start
function validateNews() {
  const emailInput = document.getElementsByClassName('email-signup-input').value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


  if (!emailInput) {
    alert('E-Mail darf nicht leer sein');
  } else if (!emailRegex.test(emailInput)) {
    alert('Ungültige E-Mail-Adresse! Bitte geben Sie eine gültige Adresse ein.');
  } else {
    alert('Registrierung erfolgreich! DANKE.');
  }
}
// Newsletter Validations JS End



// League Pages Tabs JS Start
$('.tab').on('click', function (evt) {
  evt.preventDefault();
    $('.tab').removeClass('active');
  $(this).addClass('active');
  var sel = $(this).attr('data-toggle-target');  
  $('.tab-content').removeClass('active');
  $(sel).addClass('active');
});
$(".profile").click(function(){
  $(this).find(".dropdown").slideToggle();
});
// League Pages Tabs JS Start

// Contact Form Validation Start
function validateContactForm() {
  const name = document.getElementsByClassName('contact-form').value.trim();
  const email = document.getElementsByClassName('contact-email').value.trim();
  const topic = document.getElementsByClassName('contact-topic').value;
  const message = document.getElementsByClassName('message').value.trim();

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (name.length < 2 || name.length > 100) {
    alert('Le nom doit comporter au minimum 2 caractères et au maximum 100 caractères.');
    return false;
  }
  if (!emailRegex.test(email)) {
    alert(`'S'il vous plaît, mettez une adresse email valide.'`);
    return false;
  }
  if (!topic) {
    alert('Veuillez choisir un sujet.');
    return false;
  }
  if (message.length < 10 || message.length > 1000) {
    alert('Le message doit comporter au minimum 10 et au maximum 1000 caractères.');
    return false;
  }
  alert('Le formulaire a été envoyé avec succès ! Merci de nous avoir contacté.');
  return true;
}
// Contact Form Validation End


// Blogs Cards JS Start
$(document).ready(function() {
  $('.custom-blog-card').on('click', function() {
    var $card = $(this);
    var $toggleButton = $card.find('.toggle-button');
    var $hiddenContent = $card.find('.hidden-content');    
    $card.toggleClass('expanded');
    if ($card.hasClass('expanded')) {
      $hiddenContent.slideDown(500); 
      $toggleButton.text('Read Less...');
    } else {
      $hiddenContent.slideUp(500); 
      $toggleButton.text('Read More...');
    }
  });
});
// Blogs Cards JS End

// form modal js start
function toggleSignup(){
  document.getElementById("login-toggle").style.backgroundColor="#fff";
   document.getElementById("login-toggle").style.color="#222";
   document.getElementById("signup-toggle").style.backgroundColor="#110987";
   document.getElementById("signup-toggle").style.color="#fff";
   document.getElementById("login-form").style.display="none";
   document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
   document.getElementById("login-toggle").style.backgroundColor="#110987";
   document.getElementById("login-toggle").style.color="#fff";
   document.getElementById("signup-toggle").style.backgroundColor="#fff";
   document.getElementById("signup-toggle").style.color="#222";
   document.getElementById("signup-form").style.display="none";
   document.getElementById("login-form").style.display="block";
}

// form modal js end

// slider js start
class SliderClip {
  constructor(el) {
    this.el = el;
    this.Slides = Array.from(this.el.querySelectorAll('ul:first-of-type > li'));
    this.Nav = Array.from(this.el.querySelectorAll('.link_add a'));
    this.totalSlides = this.Slides.length;
    this.current = 0;

    // Clone first and last slides for infinite loop effect
    const firstSlide = this.Slides[0].cloneNode(true);
    const lastSlide = this.Slides[this.Slides.length - 1].cloneNode(true);
    this.el.querySelector('ul:first-of-type').appendChild(firstSlide);
    this.el.querySelector('ul:first-of-type').insertBefore(lastSlide, this.Slides[0]);
    this.Slides = Array.from(this.el.querySelectorAll('ul:first-of-type > li'));

    this.setInitialStyles();
    this.initEvents();
  }

  setInitialStyles() {
    // Add current and position the slider to the first slide after the cloned one
    this.el.querySelector('ul:first-of-type').style.transition = 'none';
    this.el.querySelector('ul:first-of-type').style.transform = `translateX(-${100}%)`;
    this.Slides[1].classList.add('current'); // Start from the first original slide
  }

  initEvents() {
    // Add event listeners for navigation arrows
    const prevArrow = this.el.querySelector('.arrow-prev');
    const nextArrow = this.el.querySelector('.arrow-next');

    prevArrow.addEventListener('click', () => this.changeSlide('prev'));
    nextArrow.addEventListener('click', () => this.changeSlide('next'));

    // Add event listeners for dots
    this.Nav.forEach((dot, index) => {
      dot.addEventListener('click', (event) => {
        event.preventDefault();
        this.goToSlide(index + 1); // Adjust for the offset of cloned slides
      });
    });
  }

  changeSlide(direction) {
    const sliderTrack = this.el.querySelector('ul:first-of-type');
    sliderTrack.style.transition = 'transform 0.5s ease';

    if (direction === 'next') {
      this.current++;
    } else if (direction === 'prev') {
      this.current--;
    }

    sliderTrack.style.transform = `translateX(-${this.current * 100}%)`;

    // Handle infinite loop logic
    sliderTrack.addEventListener(
      'transitionend',
      () => {
        if (this.current === 0) {
          sliderTrack.style.transition = 'none';
          this.current = this.totalSlides; // Move to the last real slide
          sliderTrack.style.transform = `translateX(-${this.current * 100}%)`;
        }
        if (this.current === this.Slides.length - 1) {
          sliderTrack.style.transition = 'none';
          this.current = 1; // Move to the first real slide
          sliderTrack.style.transform = `translateX(-${this.current * 100}%)`;
        }

        this.updateNav();
      },
      { once: true }
    );

    this.updateNav();
  }

  goToSlide(index) {
    this.current = index;
    const sliderTrack = this.el.querySelector('ul:first-of-type');
    sliderTrack.style.transition = 'transform 0.5s ease';
    sliderTrack.style.transform = `translateX(-${this.current * 100}%)`;

    this.updateNav();
  }

  updateNav() {
    // Update navigation dots
    this.Nav.forEach((dot) => dot.classList.remove('current_dot'));
    const visibleIndex = (this.current - 1 + this.totalSlides) % this.totalSlides; // Adjust for clones
    if (this.Nav[visibleIndex]) {
      this.Nav[visibleIndex].classList.add('current_dot');
    }
  }
}

const slider = new SliderClip(document.querySelector('.slider'));


// slider js end

function toggleFaq(element) {
  const content = element.nextElementSibling;
  const icon = element.querySelector('.faq-icon');

  if (content.classList.contains('show')) {
      content.classList.remove('show');
      icon.classList.remove('rotate');
  } else {
      content.classList.add('show');
      icon.classList.add('rotate');
  }
}