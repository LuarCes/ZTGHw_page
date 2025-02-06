const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChildrens = [...carousel.children];

let isDragging =false;
let startX, startScrollLeft;

let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);



arrowBtns.forEach(btn => {
    btn.addEventListener("click",() => {
        carousel.scrollLeft +=btn.id == "left" ? -firstCardWidth : firstCardWidth;
    })
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return;
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const infiniteScroll = () => {
    const maxScrollLeft = carousel.scrollWidth - carousel.offsetWidth;

    if(carousel.scrollLeft <= 0){
        carousel.scrollLeft = 0;
    } else if (Math.ceil(carousel.scrollLeft) >= maxScroll){
        carousel.scrollLeft = carousel.offsetWidth;
    }
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove",dragging);
carousel.addEventListener("mouseup",dragStop);
carousel.addEventListener("mouseleave", dragStop);
carousel.addEventListener("scroll",infiniteScroll);