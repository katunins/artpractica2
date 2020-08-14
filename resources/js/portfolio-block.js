function refreshTags() {
    console.log (66)
    let activeTags = []
    document.querySelectorAll('.tag').forEach(el => {
        if (el.classList.contains('active')) { activeTags.push(el.getAttribute('value')) }
    })

    if (activeTags.length == 0) {
        document.querySelectorAll('.portfolio-block').forEach(block => {
            block.classList.remove('hide')
        })
    } else {
        document.querySelectorAll('.portfolio-block').forEach(block => {
            // let general_hide = true

            block_tags = block.getAttribute('tags').split("||")
            let general_result = 1
            activeTags.forEach(acttag => {
                let result = 0
                block_tags.forEach(tag => {
                    if (tag == acttag) result = 1
                })
                general_result *= result
            })
            if (general_result == 0) {
                block.classList.add('hide')
            } else { block.classList.remove('hide') }
        })
    }

    
}

function hrefTOtags() {
    var tags = window.location.search;
    // var b = new Object();
    tags = tags.substring(1).split("&");
    return tags;
}

function tagsTOhref() {
    let href = '?'
    document.querySelectorAll('.tag').forEach(element => {
        if (element.classList.contains('active')) {
            if (href.toString().slice(-1) != '?') href += '&'
            href += element.getAttribute('value')
        }
    })
    if (href == '?') {
        let link = window.location.href
        window.location.href = link.split('?')[0]
    } else { window.location.search = href }
}

function blocksReformat() {
    // отформатируем блоки
    let blocks = document.querySelectorAll('.portfolio-block:not(.hide)');
    let i = 0
    let screenWidth = document.querySelector('.portfolio-block-group').offsetWidth //ширина экрана
    var maxOfBlocksInLine = 3 // максимум квадратных карточек в строке
    var margin = 3 // расстояние между кадрами

    // стандартные размеры для этого экрана
    let types = {
        pano: Math.round(screenWidth * 0.66),
        square: Math.round(screenWidth * 0.25),
        vert: Math.round(screenWidth * 0.25),
        land: Math.round(screenWidth * 0.33),
    }


    while (i < blocks.length) {

        // console.log('цикл')
        // высчитаем сколько карточек помещается в строке
        let countOfBlocksInLine = 0
        let pixelSumm = 0
        do {
            pixelSumm += Number(blocks[i + countOfBlocksInLine].getAttribute('landWidth'))
            countOfBlocksInLine++

        } while ((countOfBlocksInLine + i) < blocks.length && countOfBlocksInLine < maxOfBlocksInLine)

        // в строке помещается countOfBlocksInLine блоков
        // общей шириной pixelSumm пикселей
        // let blockHeight = Math.round(screenWidth / countOfBlocksInLine)
        let blockHeight = Math.round(screenWidth / pixelSumm) - margin * 2
        let scale = pixelSumm / countOfBlocksInLine

        console.log('блоков', countOfBlocksInLine, pixelSumm)
        console.log('высота', blockHeight)
        console.log('scale', scale)

        for (let index = 0; index < countOfBlocksInLine; index++) {
            // console.log(blocks[i+index])
            blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / countOfBlocksInLine) - margin * 2
            // console.log('Width', blockWidth)
            blocks[i + index].setAttribute("style", "width: " + blockWidth + "px; height: " + blockHeight + "px; margin: " + margin + "px");

        }


        i += countOfBlocksInLine


        // i++
    }
}


document.addEventListener('DOMContentLoaded', function () {
    
    activeHREFtags = hrefTOtags()
    // console.log (activeHREFtags)

    document.querySelectorAll('.tag').forEach(element => {
        // console.log (element.getAttribute('value'), activeHREFtags.indexOf(element.getAttribute('value'))>=0)
        if (activeHREFtags.indexOf(element.getAttribute('value')) >= 0) {
            element.classList.add('active')
        }

        element.addEventListener('click', function (event) {

            if (event.target.classList.contains('active')) {
                event.target.classList.remove('active')
            } else {
                event.target.classList.add('active')

            }

            refreshTags()
            tagsTOhref()

        })
    })
    refreshTags()
    blocksReformat ()

})


        // let itBlock = blocks[i].getAttribute('imgType')
        // let secondBlock = (i < blocks.length - 1) ? blocks[i + 1].getAttribute('imgType') : false
        // let thirdBlock = (i < blocks.length - 2) ? blocks[i + 2].getAttribute('imgType') : false
        // let forthBlock = (i < blocks.length - 2) ? blocks[i + 3].getAttribute('imgType') : false

        // console.log(itBlock)
        // console.log(secondBlock)

        // //PANO
        // if (itBlock.getAttribute('imgType') == 'pano' && secondBlock.getAttribute('imgType') == 'pano') {
        //     // PANO + PANO
        // } else { 
        //     // PANO + ANY
        // }



        // //VERT || SQUARE
        // if (itBlock.getAttribute('imgType') == 'pano') {
        // }

        // //VERT || SQUARE
        // if (itBlock.getAttribute('imgType') == 'pano') {
        // }

        // //LAND
        // if (itBlock.getAttribute('imgType') == 'pano') {
        // }