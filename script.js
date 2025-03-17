var pulsantello = document.getElementById("pulsantello");
var pulsantello2 = document.getElementById("pulsantello2");
var informazioni = document.getElementById("informazioni");

function changeNavBarBg(){
    var navbar = document.getElementById('navbar');
    var scrollValue = window.scrollY;
    if(scrollValue < 50){
        navbar.classList.remove('bgColor');
    }
    else{
        navbar.classList.add('bgColor');
    }
}
window.addEventListener('scroll', changeNavBarBg);

const scrollContainer = document.querySelector('.scroll-container');

    function scrollLeft() {
        scrollContainer.scrollBy({
            left: -window.innerWidth,
            behavior: 'smooth'
        });
    }

    function scrollRight() {
        scrollContainer.scrollBy({
            left: window.innerWidth,
            behavior: 'smooth'
        });
    }

const urlParams = new URLSearchParams(window.location.search);
const hideButton = urlParams.get('hideButton');

if (hideButton === 'true'){
    document.getElementById('pulsantePagina2').style.display = 'none';
    document.getElementById('menu').style.right = 0;
}

pulsantello.addEventListener("click",function(){
    window.scrollTo({
        left:0,
        top: 695,
        behavior: "smooth",
    });
});

pulsantello2.addEventListener("click",function(){
    window.scrollTo({
        left:0,
        top: 0,
        behavior: "smooth",
    });
});

function infoscroll(){
    window.scrollTo({
        left:0,
        top: 2000,
        behavior: "smooth",
    });
}

function showSidebar(){
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'flex';
}

function hideSidebar(){
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none'
}
