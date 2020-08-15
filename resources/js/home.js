document.addEventListener("DOMContentLoaded", () => {
    // переназначим последовательность эффектов wow для картинок в сетке
    if (window.matchMedia('(max-width: 768px)').matches) {
        document.querySelector('.gallery-item-2').children[0].setAttribute("data-wow-delay", "0.0s")
        document.querySelector('.gallery-item-1').children[0].setAttribute("data-wow-delay", "0.1s")
        document.querySelector('.gallery-item-4').children[0].setAttribute("data-wow-delay", "0.3s")
        document.querySelector('.gallery-item-3').children[0].setAttribute("data-wow-delay", "0.5s")
    }


    // кнопки подбробнее в направляниях деятельности
    document.querySelectorAll('.direction button').forEach((butt) => {
        butt.onclick = function() {
            let details = this.nextSibling.nextSibling
            if (details) {
                if (details.classList.contains('hide')) {
                    details.classList.remove('hide')
                } else {
                    details.classList.add('hide')
                }
            }
        }
    })
});