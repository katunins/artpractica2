@extends('admin/index')
{{-- <link rel="stylesheet" href="/css/portfolio.css"> --}}

@section('content')
@include('portfolio-block')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        document.querySelectorAll('.button-del').forEach(elem=>{
            elem.addEventListener('click', (event)=>{

            console.log ('1 ')  
            var href = event.target.href
            var message = event.target.getAttribute('message')
            event.preventDefault();
            document.querySelector('.my_modal-title').innerHTML = 'Удаление проекта'
            document.querySelector('.my_modal-body').innerHTML = '<p>'+message+'?</p>'
            document.getElementById('modal_open').style.display = 'block'
            document.getElementById('delete-button').setAttribute('onclick',"location.href = '"+href+"'")
        })
        })   
    })
</script>