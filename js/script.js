// ==============================
// GAMEVERSE JAVASCRIPT
// ==============================

// Hero Slider

const slides = document.querySelectorAll(".slide");

const nextBtn = document.querySelector(".next");

const prevBtn = document.querySelector(".prev");

let currentSlide = 0;

function showSlide(index){

    slides.forEach((slide)=>{

        slide.classList.remove("active");

    });

    slides[index].classList.add("active");

}

function nextSlide(){

    currentSlide++;

    if(currentSlide >= slides.length){

        currentSlide = 0;

    }

    showSlide(currentSlide);

}

function prevSlide(){

    currentSlide--;

    if(currentSlide < 0){

        currentSlide = slides.length - 1;

    }

    showSlide(currentSlide);

}

if(nextBtn){

    nextBtn.addEventListener("click", nextSlide);

}

if(prevBtn){

    prevBtn.addEventListener("click", prevSlide);

}

// Auto Slide

setInterval(nextSlide,5000);
// ==============================
// SCROLL ANIMATION
// ==============================

const observer = new IntersectionObserver((entries)=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.classList.add("show");

        }

    });

},{
    threshold:0.2
});

document.querySelectorAll("section").forEach((section)=>{

    observer.observe(section);

});

// ==============================
// SMOOTH SCROLL
// ==============================

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

    anchor.addEventListener("click",function(e){

        e.preventDefault();

        const target=document.querySelector(this.getAttribute("href"));

        if(target){

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});
// ==============================
// BACK TO TOP BUTTON
// ==============================

const backToTop = document.createElement("button");

backToTop.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';

backToTop.className = "back-to-top";

document.body.appendChild(backToTop);

window.addEventListener("scroll",()=>{

    if(window.scrollY > 400){

        backToTop.classList.add("active");

    }else{

        backToTop.classList.remove("active");

    }

});

backToTop.addEventListener("click",()=>{

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

});

// ==============================
// NEWSLETTER FORM
// ==============================

const newsletterForm = document.querySelector(".newsletter-form");

if(newsletterForm){

    newsletterForm.addEventListener("submit",(e)=>{

        e.preventDefault();

        alert("Thank you for subscribing to GameVerse!");

        newsletterForm.reset();

    });

}
// ==============================
// SEARCH FILTER
// ==============================

const searchInput = document.querySelector(".search-box input");

if(searchInput){

    searchInput.addEventListener("keyup",function(){

        const value=this.value.toLowerCase();

        const cards=document.querySelectorAll(".game-card");

        cards.forEach(card=>{

            const title=card.querySelector("h3").textContent.toLowerCase();

            if(title.includes(value)){

                card.style.display="block";

            }else{

                card.style.display="none";

            }

        });

    });

}

// ==============================
// GAME CARD HOVER EFFECT
// ==============================

const gameCards=document.querySelectorAll(".game-card");

gameCards.forEach(card=>{

    card.addEventListener("mouseenter",()=>{

        card.style.transform="translateY(-12px) scale(1.02)";

    });

    card.addEventListener("mouseleave",()=>{

        card.style.transform="translateY(0) scale(1)";

    });

});

// ==============================
// WISHLIST BUTTON
// ==============================

const wishlistButtons = document.querySelectorAll(".wishlist-btn");

wishlistButtons.forEach(button => {

    button.addEventListener("click", function () {

        this.classList.toggle("active");

        if (this.classList.contains("active")) {

            this.innerHTML = '<i class="fa-solid fa-heart"></i>';

            alert("Game added to Wishlist ❤️");

        } else {

            alert("Game removed from Wishlist");

        }

    });

});

// ==============================
// CART BUTTON
// ==============================

const cartButtons = document.querySelectorAll(".cart-btn");

cartButtons.forEach(button => {

    button.addEventListener("click", function () {

        alert("Game added to Cart 🛒");

    });

});

// ==============================
// BUY NOW BUTTON
// ==============================

const buyButtons = document.querySelectorAll(".buy-btn");

buyButtons.forEach(button => {

    button.addEventListener("click", function () {

        alert("Redirecting to Checkout...");

    });

});

// ==============================
// NAVBAR BACKGROUND ON SCROLL
// ==============================

const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {

    if (window.scrollY > 80) {

        navbar.style.background = "#0b1220";

        navbar.style.boxShadow = "0 5px 20px rgba(0,0,0,.4)";

    } else {

        navbar.style.background = "rgba(15,20,35,.95)";

        navbar.style.boxShadow = "none";

    }

});
// ==============================
// ANIMATED STATISTICS COUNTER
// ==============================

const statNumbers = document.querySelectorAll(".stat-box h2");

const animateCounter = () => {

    statNumbers.forEach(counter => {

        const text = counter.innerText;

        const target = parseInt(text.replace(/\D/g, ""));

        const suffix = text.replace(/[0-9]/g, "");

        let count = 0;

        const speed = Math.max(10, target / 100);

        const updateCounter = () => {

            if (count < target) {

                count += speed;

                counter.innerText = Math.floor(count) + suffix;

                requestAnimationFrame(updateCounter);

            } else {

                counter.innerText = target + suffix;

            }

        };

        updateCounter();

    });

};

const statsSection = document.querySelector(".stats-section");

if (statsSection) {

    const statsObserver = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                animateCounter();

                statsObserver.unobserve(entry.target);

            }

        });

    }, { threshold: 0.5 });

    statsObserver.observe(statsSection);

}

// ==============================
// IMAGE LOADING EFFECT
// ==============================

const images = document.querySelectorAll("img");

images.forEach(img => {

    img.addEventListener("load", () => {

        img.style.opacity = "1";

        img.style.transition = "opacity .5s ease";

    });

});

// ==============================
// PAGE LOADED
// ==============================

window.addEventListener("load", () => {

    console.log("GameVerse Loaded Successfully!");

});
// ==============================
// MOBILE MENU (Future Ready)
// ==============================

const menuToggle = document.querySelector(".menu-toggle");
const navLinks = document.querySelector(".nav-links");

if (menuToggle && navLinks) {

    menuToggle.addEventListener("click", () => {

        navLinks.classList.toggle("active");

    });

}

// ==============================
// BUTTON RIPPLE EFFECT
// ==============================

const buttons = document.querySelectorAll(
    ".hero-btn, .deal-btn, .buy-btn, .login-btn, .register-btn"
);

buttons.forEach(button => {

    button.addEventListener("click", function (e) {

        const ripple = document.createElement("span");

        const rect = this.getBoundingClientRect();

        ripple.style.left = (e.clientX - rect.left) + "px";
        ripple.style.top = (e.clientY - rect.top) + "px";

        ripple.className = "ripple";

        this.appendChild(ripple);

        setTimeout(() => {

            ripple.remove();

        }, 600);

    });

});

// ==============================
// CONSOLE MESSAGE
// ==============================

console.log("%cWelcome to GameVerse", "color:#00bfff;font-size:18px;font-weight:bold;");
console.log("%cProfessional Gaming Store Loaded Successfully!", "color:#8a2be2;font-size:14px;");