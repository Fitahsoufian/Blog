@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
<div class="py-15 pb-12">
<h1 class="text-6xl">
Edit Post
</h1>
</div>
</div> 
<div class="w-4/5 m-auto pt-20">
<form method = "POST" action= "{{route('update',$articl)}}" enctype="multipart/form-data" >
@csrf 
@method('PUT')
<input type="text" name="title" value="{{ $articl->title }}" class="bg-gray-0 block border-b-2 w-full h-20 text-6xl outline-none">
<textarea name="description" class="py-20 bg-gray-0 block border-b-2 w-full text-xl outline-none">{{ $articl->description }}</textarea>
<button type="submit" class="uppercase mt-5 mb-5 bg-blue-500 text-gray-100 text-lg font-bold py-3 px-6 rounded-3xl">
    Update Post
</button>
</div>
@endsection