@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
<div class="py-15 border-b border-gray-200 pb-12">
<h1 class="text-6xl">
Blog Posts
</h1>
</div>
</div> 
@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
    <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
        {{ session()-> get('message')}}
    </p>
</div>
@endif


@if (Auth::check())
<div class="pt-15 w-4/5 m-auto">
<a href="/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-6 rounded-3xl">
Create Post

</a>
</div>
@endif
@foreach ($articls as $articl)
<div class="sm:grid grid-cols-2 gp-20 w-4/5">
    <div class="w-4/5 ml-16 mt-8" >
        <img src="https://image.freepik.com/free-vector/web-developers-courses-computer-programming-web-design-script-coding-study-computer-science-student-learning-interface-structure-components_335657-2542.jpg" alt="">
    </div>
    <div class="m-auto sm:m-auto text-left block">
       <h2 class="text-gray-700 font-bold text-5xl pb-4 ">{{ $articl->title }}
       </h2>
       <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $articl->user->name }}</span> Created on {{ date('jS M Y', strtotime($articl->updated_at)) }}
       </span>
       <p class="text-xl text-gray-700 pt-8 font-light pb-5">
        {{ $articl->description }}
       </p>
       <a href="/blog/{{$articl->id}}" class="uppercase bg-blue-500 text-gray-100 text-s font-bold py-2 px-6 rounded-3xl mt-2">Read More</a>
    </div>
</div> 
@endforeach

@endsection