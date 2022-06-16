import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();


// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});

/* accordion effect */
const accordionHeader = document.querySelectorAll(".accordion-header");
accordionHeader.forEach((header) => {
header.addEventListener("click", function () {
    const accordionContent = header.parentElement.querySelector(".accordion-content");
    let accordionMaxHeight = accordionContent.style.maxHeight;

    // Condition handling
    if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
    accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
    header.querySelector(".fas").classList.remove("fa-plus");
    header.querySelector(".fas").classList.add("fa-minus");
    } else {
    accordionContent.style.maxHeight = `0px`;
    header.querySelector(".fas").classList.add("fa-plus");
    header.querySelector(".fas").classList.remove("fa-minus");
    }
});
});



//CKEDITOR

