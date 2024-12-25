
import '../haschajeticon/style.css';


document.addEventListener('DOMContentLoaded', function() {

    const navigation = document.getElementById('navigation');
    const headline = document.getElementById('topNav');

    if (navigation) {
        const jumpClasses = navigation.getAttribute('data-jump').split(' ') || [];
        let headlineHeight = 0;
    
        if (headline) {
            headlineHeight = headline.offsetHeight;
        }
            
        function handleScroll() {
            const scrollPosition = window.scrollY;

            if (scrollPosition > headlineHeight) {
                jumpClasses.forEach(className => navigation.classList.add(className));
            } else {
                jumpClasses.forEach(className => navigation.classList.remove(className));
            }
        }

        window.addEventListener('scroll', handleScroll);

        handleScroll();
    }
    
    const t_mpt = document.getElementById('main-page-title');
    if(t_mpt) {
        const t_mpt_words = t_mpt.innerHTML.split(' ');
        t_mpt.innerHTML = t_mpt_words.map(word => {
            // return `<span class="top-title-first-letter">${word[0]}</span>${word.slice(1)}`;
            if (word.length > 0) {
                return `<span class="top-title-first-letter">${word[0]}</span>${word.slice(1)}`;
            }
            return word;
        }).join(' ');
        
    }

});
