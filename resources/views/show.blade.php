@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
<div class="py-15 pb-12">
<h1 class="text-6xl">
    {{ $articl->title }}
</h1>
</div>
</div> 

<div class="w-4/5 m-auto pt-20">
<span class="text-gray-500">By <span class="font-bold italic text-gray-800">
    {{ $articl->user->name }}
</span>,Created on {{ date('jS M Y', strtotime($articl->updated_at)) }} </span>
<div class="flex">
<p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light"> {{ $articl->description }}</p>
@if (isset(Auth::user()->id) && Auth::user()->id ==$articl->user_id)
<span class="mt-13 ml-15">
     <a href="/blog/{{$articl->id}}/edit" class="btn btn-danger bg-blue-500 px-5 py-2 rounded-2xl"> Edit </a>
</span>
<span class="mt-13 ml-3">
  <a href="/blog/{{ $articl->id }}/destroy" class="btn btn-danger bg-red-500 px-5 py-2 rounded-2xl">Delete</a>
</form>
</span>
</div> 
@endif
</div>
@endsection