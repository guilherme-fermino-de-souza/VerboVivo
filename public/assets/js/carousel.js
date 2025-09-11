const sliderTabs = document.querySelectorAll(".slider-tab");
const sliderIndicator = document.querySelector(".slider-indicator");
const sliderControls = document.querySelector(".slider-controls");

const updateIndicator = (tab, index) => {
    sliderIndicator.style.transform = `translateX(${tab.offsetLeft - 20}px)`;
    sliderIndicator.style.width = `${tab.getBoundingClientRect().width}px`;

    // Calculate the scroll
    const scrollLeft = sliderTabs[index].offsetLeft - sliderControls.
    offsetWidth / 2 + sliderTabs[index].offsetWidth / 2;
    sliderControls.scrollTo({ left: scrollLeft, behavior: "smooth"});

}

// Initializing the Swiper slider with fade effect and custom speed
const homeSwiper = new Swiper(".slider-container", {
    effect: "fade",
    speed: 1300,
    autoplay: {delay: 6000, disableOnInteraction: false,},
    navigation: {
        prevEl: "#slide-prev",
        nextEl: "#slide-next",
    },
    on: {
        slideChange: () => {
            const currentTabIndex = [...sliderTabs].indexOf(sliderTabs[homeSwiper.activeIndex]);
            updateIndicator(sliderTabs[homeSwiper.activeIndex], currentTabIndex);
        },
        reachEnd: () => homeSwiper.autoplay.stop()
    }
});

// Update the active tab and indicator position
sliderTabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
        homeSwiper.slideTo(index);
        updateIndicator(tab, index);
    });
});


updateIndicator(sliderTabs[0], 0);
window.addEventListener("resize", () => updateIndicator
(sliderTabs[homeSwiper.activeIndex], 0));