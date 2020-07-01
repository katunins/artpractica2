<?php
use App\Http\Controllers\UploadController; 
use App\Http\Controllers\SqlController; 

$portfolios = UploadController::getPortfolios();
$tags = SqlController::gettag();   
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
        <a href="{{ route('get-portfolio', $item->id) }}">
            <div class="block" tags=<?=$item->tags?>>
                <?php $url = Storage::url($item->title_image)?>
            <div class="img-block" style="background-image: url(<?=$url?>)"></div>
            
            <?php if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio") {?>
            <div class="edit-block">
                <button>Редактировать</button>
                <button style="background-color: orange">Удалить</button>
                
            </div>
        <?php }?>
            
            <div class="link">
                <?=$item->title ?>
            </div>
            </div>
            
        </a>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    
    document.querySelectorAll('.tag').forEach(element => {
       element.addEventListener ('click', function (event) {
        
        if (event.target.classList.contains('active')) {
            event.target.classList.remove ('active')
        } else {
            event.target.classList.add ('active')
            
        }
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
            if (general_result == 0) {block.classList.add('hide')} else {block.classList.remove('hide')}
        })
        }

       })
    })
})
</script>

