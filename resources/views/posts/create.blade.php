@extends('layouts.app')

@section('title', '| Criar Post')

@section('content')
    @include('components.navbar')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <!-- enctype mostra que tem arquivos juntos alem dos textos -->

        <form action="/posts" method="post" class="mw-100"
         enctype="multipart/form-data">

            @csrf

            <h1 class="text-secondary text-center mb-center mb-5">
                Criar post
            </h1>

            <input type="file" class="form-control" name="photo" 
            accept="image/*">

            <br>

            <textarea class="form-control mb-3" name="description" 
            placeholder="Descrição" rows="3"></textarea>
            

            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>
        
    </div>
@endsection
