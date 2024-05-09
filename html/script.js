

var mySwiper = new Swiper('.swiper-container', {
    autoplay: {
    delay: 5000,
    },
    direction: 'horizontal',
  effect: 'fade',
  loop: true,
  speed: 1000,
  })

var swiper = new Swiper(".slide-content-products", {
    // slidesPerView: 5,
    spaceBetween: 25,
    loop: true,
    centerSlide:'true',
    fade:'true',
    grabCursor:'true',
    speed:1000,
    depth:200,
      modifier:4,
      rotate:100,
      scale:4,
      slideShadow:true,
      effect:'overflow',
      
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets:'true',
      speed:1000,
      
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0:{
            slidesPerView:1.4,
            centeredSlides : true,  
        },
        520:{
            slidesPerView:1.6,
            centeredSlides : true, 
        },
        850:{
            slidesPerView:3,
        },
        1150:{
            slidesPerView:4,
        },
    },
    autoplay: {
        delay: 1500,
      },

      
  });

  

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 4000,
      },
  });
  
  var mySwiper = new Swiper('.swiper-container-offers', {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000,
    },
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 0,
        stretch: 80,
        depth: 200,
        modifier: 1,
        slideShadows: false,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

})

var typing=new Typed(".text", {
    cursorChar: '',
    strings: ["Uma Ghee is a local organic food brand in Tamil Nadu. We are dedicated to offering the highest quality products that bring joy to your table. Our journey started with a belief in the power of natural and locally sourced ingredients, and we remain committed to this philosophy in everything we create."],
    typeSpeed: 20,
});