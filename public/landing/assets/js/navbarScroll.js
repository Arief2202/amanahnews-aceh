
(function() {
    "use strict";
    console.log($(window).width());
    if($(window).width() > 1200){
        function toggleScrolled() {
        const selectBody = document.querySelector('body');
        const selectHeader = document.querySelector('#header');
        if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
        window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
        }
    
        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);
    }
    else{
        const selectBody = document.querySelector('body');
        selectBody.classList.add('scrolled');        
    }

    $(window).resize(function() {
    if($(window).width() > 1200){
        window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
    }
    else{
        const selectBody = document.querySelector('body');
        selectBody.classList.add('scrolled');       
    }
    });
})();