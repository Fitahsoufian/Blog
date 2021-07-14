@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
<div class="py-15 pb-12">
<h1 class="text-6xl">
Create Post
</h1>
</div>
</div> 
@if ($errors->any())
  <div class="w-4/5 m-auto">
      <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{  $error }}
                </li>
            @endforeach
      </ul>
  </div>  
@endif
<div class="w-4/5 m-auto pt-20">
<form method = "POST" action= "{{url('/blog')}}" enctype="multipart/form-data" >
@csrf
<input type="text" name="title" placeholder="Title ..." class="bg-gray-0 block border-b-2 w-full h-20 text-6xl outline-none">
<textarea name="description" placeholder="Description ..."class="py-20 bg-gray-0 block border-b-2 w-full text-xl outline-none"></textarea>
<div class="bg-grey-lighter pt-15">
<label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer mb-4">
<span class=" text-base leading-normal">
Select a file
</span>
<input type="file" name="image" class="hidden" >
</label>
</div>
<button type="submit" class="uppercase mt-5 mb-5 bg-blue-500 text-gray-100 text-lg font-bold py-3 px-6 rounded-3xl">
    Add Post
</button>
</div>
@endsection