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

    // // история с модальным окном 
    // var modal = document.getElementById("myModal");
    // var btn = document.getElementById("myBtn");
    // document.querySelectorAll('.myBtn').forEach((elem) => {
    //     elem.onclick = function(data) {
    //         document.getElementById('modalFrame').src = this.getAttribute('href')
    //         modal.style.display = "block";
    //     }
    // })

    // document.getElementsByClassName("close")[0].onclick = function() {
    //     modal.style.display = "none";
    //     document.getElementsByTagName('video')[0].pause()
    // }

    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //         document.getElementsByTagName('video')[0].pause()
    //     }
    // }
});