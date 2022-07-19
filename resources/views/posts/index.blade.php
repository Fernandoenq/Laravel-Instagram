@extends('layouts.app')

@section('title', '| Dashboard')

@section('content')
    @include('components.navbar')
    <div class="min-vh-100 d-flex flex-column 
    justify-content-center align-items-center" style="margin-top: 80px">
    <p>{{$likes}}</p>
        @foreach($posts as $post)
        <?php $controle2 = 0; ?>

            <div class="card mb-3" style="width: 600px">
                <div class="card-header bg-white border-0">
                    <span class="fw-bold">{{ $post->user->name}}</span>
                </div>

                <img src="{{$post->image}}" alt="card-image">

                <div class="card-body">
                    <p class="card-text">
                        {{ $post->description}}
                    </p>
                
                    

                    <?php 
                        $controle2 = 0;
                        $controle = 0;
                        foreach($likes as $like){
                            if($like->post_id == $post->id){
                            $controle = $controle + 1;
                        
                            if($controle2 != 1){
                                if($userid == $like->user_id ){
                                    $controle2 = 1;
                                    $controle3 = $like->id;

                                }else{
                                    $controle2 = 0;
                                }
                            }
                            }
                        }
                        ?>

                    <p>{{$controle}}</p>

                    @if($controle2 == 0)
                    <form action="/posts/like/{{$post->id}}" method="POST">
                        @csrf
                        <button type="submit" class="bi bi-heart"></button>
                    </form>
                    
                    @else
                    <form action="/posts/unlike/{{$controle3}}" method="POST">
                        @csrf
                        <button type="submit" class="bi bi-heart-fill"></button>
                    </form>
                    @endif
                    

                    
                    <p value="$curtidas"></p>
                    <form action="/posts/delete/{{$post->id}}" method="POST">
                        @csrf
                        <button type="submit" class="bi bi-trash"></button>  
                    </form>

                    </div>
                    
            </div>

        @endforeach

        <p>Olá JANETE</p>
    </div>
@endsection
