function refreshTags() {

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
    blocksReformat()
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
    let screenWidth = document.querySelector('.portfolio-block-group').offsetWidth-4 //ширина экрана
    var margin = 2 // расстояние между кадрами px
    if (screenWidth > 768) {
        
        var maxOfBlocksInLine = 3
    } else {
        
        var maxOfBlocksInLine = 2
    }

    let lastHeight = 0

    while (i < blocks.length) {

        // высчитаем сколько карточек помещается в строке
        let countOfBlocksInLine = 0
        let pixelSumm = 0
        do {

            pixelSumm += Number(blocks[i + countOfBlocksInLine].getAttribute('landWidth'))
            countOfBlocksInLine++

        } while ((countOfBlocksInLine + i) < blocks.length && countOfBlocksInLine < maxOfBlocksInLine)

        let blockHeight = Math.round(screenWidth / pixelSumm) - margin * 2

        if (blockHeight > (screenWidth / 2.2)) blockHeight = Math.round(screenWidth / 3)

        let scale = pixelSumm / countOfBlocksInLine

        for (let index = 0; index < countOfBlocksInLine; index++) {


            // если изображение осталось одно и оно не панорамное
            if (countOfBlocksInLine == 1) {

                if (lastHeight != 0) blockHeight = lastHeight
                // blockHeight = lastHeight == 0 ? (Math.round(screenWidth / maxOfBlocksInLine / blocks[i + index].getAttribute('landWidth')) - margin * 2) : lastHeight
                blockWidth = Math.round(blockHeight * blocks[i + index].getAttribute('landWidth'))
                // blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / maxOfBlocksInLine) - margin * 2
                // console.log ('loop')
                // break
            } else {
                blockWidth = Math.round(blocks[i + index].getAttribute('landWidth') / scale * screenWidth / countOfBlocksInLine) - margin * 2
                
            }
            
            blocks[i + index].setAttribute("style", "width: " + blockWidth + "px; height: " + blockHeight + "px; margin: " + margin + "px ");
            
        }

        i += countOfBlocksInLine
        lastHeight = blockHeight
    }
}


document.addEventListener('DOMContentLoaded', function () {
    blocksReformat()
    let portfolioBlock = document.querySelector('.portfolio-block-group')
    portfolioBlock.setAttribute('style', 'opacity: 0')
    window.onresize = function (event) {
        blocksReformat()
    };
    activeHREFtags = hrefTOtags()
    // console.log (activeHREFtags)

    document.querySelectorAll('.tag').forEach(element => {
        // console.log (element.getAttribute('value'), activeHREFtags.indexOf(element.getAttribute('value'))>=0)
        if (activeHREFtags.indexOf(element.getAttribute('value')) >= 0) {
            element.classList.add('active')
        }

        element.addEventListener('click', function (event) {
            portfolioBlock.setAttribute('style', 'opacity: 0')
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
    portfolioBlock.setAttribute('style', 'opacity: 1')


})