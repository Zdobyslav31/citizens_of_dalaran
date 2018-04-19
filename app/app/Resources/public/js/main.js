let menu = document.querySelector('aside.subpage')
let menuPosition = menu.getBoundingClientRect().top;
window.addEventListener('scroll', function() {
    if (x.matches){
        if (window.pageYOffset >= menuPosition - 310) {
            menu.style.position = 'sticky';
            menu.style.top = '310px';
        } else {
            menu.style.position = 'static';
            menu.style.top = '';
        }
    }
});

let x = window.matchMedia("(max-width: 991px)");