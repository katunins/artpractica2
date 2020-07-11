<?php
use App\Http\Controllers\UploadController; 
use App\Http\Controllers\SqlController; 

$portfolios = UploadController::getPortfolios();
$tags = SqlController::gettag();   
// dd($_GET);
?>



<link rel="stylesheet" href="/css/portfolio.css">

<div class="content">
    <div class="tag-group">
        @foreach ($tags as $item)
        <div class="tag" value=<?=$item->code?>>
            <?=$item->name?>
        </div>
        @endforeach
    </div>
    <div class="block-group">
        @foreach ($portfolios as $item)

        <div class="block" tags=<?=$item->tags?>>
            <a href="{{ route('get-portfolio', $item->id) }}">
                <?php $url = Storage::url($item->title_image)?>
                <div class="img-block" style="background-image: url(<?=$url?>)"></div>
                <div class="link">
                    <?=$item->title ?>
                </div>

            </a>
            @if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio")
            <div class="edit-block">
                <a href="{{ route('editoneproject', $item->id) }}" class="button-edit">Редактировать</a>
                <a href="{{ route('deteteportfolio', $item->id) }}" class="button-del"
                    message="<?=$item->title ?>">Удалить</a>
            </div>
            @endif
        </div>


        @endforeach

        @if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio")
        <div class="block" tags="">
            <a href="{{ route('newproject') }}">
                <div class="img-block plus">+</div>
            </a>

        </div>
        @endif
    </div>
</div>

<script>
    function refreshTags () {
        let activeTags = []
        document.querySelectorAll('.tag').forEach (el=>{
            if (el.classList.contains('active')) {activeTags.push(el.getAttribute('value'))}
        })

        if (activeTags.length==0) {
            document.querySelectorAll('.block').forEach(block=>{
            block.classList.remove('hide')
        })
        } else {
            document.querySelectorAll('.block').forEach(block=>{
            // let general_hide = true
            
            block_tags = block.getAttribute('tags').split("||")
            let general_result = 1
            activeTags.forEach(acttag=>{
                let result = 0                
                block_tags.forEach(tag=>{
                    if (tag == acttag) result = 1
                })
                general_result *= result
            })
            if (general_result == 0) {
                block.classList.add('hide')
            } else {block.classList.remove('hide')}
        })
        }
    }

    function hrefTOtags() {
        var tags = window.location.search;
        // var b = new Object();
        tags = tags.substring(1).split("&");
        return tags;
    }

    function tagsTOhref () {
        let href = '?'
        document.querySelectorAll('.tag').forEach(element => {
            if (element.classList.contains('active')) {
                if (href.toString().slice(-1) !='?') href +='&'
                href += element.getAttribute('value')
            }
        })
        if (href =='?') {
            let link = window.location.href
            window.location.href = link.split('?')[0]
        } else { window.location.search = href }
    }
    
    document.addEventListener('DOMContentLoaded', function(){
    activeHREFtags = hrefTOtags()
    // console.log (activeHREFtags)

    document.querySelectorAll('.tag').forEach(element => {
        // console.log (element.getAttribute('value'), activeHREFtags.indexOf(element.getAttribute('value'))>=0)
        if (activeHREFtags.indexOf(element.getAttribute('value'))>=0) {
            element.classList.add('active')    
        }
    
       element.addEventListener ('click', function (event) {
        
            if (event.target.classList.contains('active')) {
                event.target.classList.remove ('active')
            } else {
                event.target.classList.add ('active')
                
            }
        
        refreshTags ()
        tagsTOhref()

       })
    })
    refreshTags()
})
</script>