@extends('layout.base')


@section('content')
  <div class="mt-10 flex flex-col justify-center items-center">
    {{-- input section --}}
    <div class="w-1/3">
        <div class="shadow-md flex border mx-auto rounded-md  relative">
          <input type="text"  class="px-4 py-3  w-full block h-full rounded-md focus:outline-none" placeholder="Enter your todo">
          <div class="flex absolute top-0 bottom-0 right-0 ">
            <button class="text-white bg-indigo-600 px-3 rounded-md" ><i class="fa fa-plus "></i></button>
          </div>
        </div>
    </div>
    {{-- listing section --}}
    <div  class="border border-red-500 w-1/3 mt-20">
      {{-- here goes a todo component --}}
      <div>
        <h3>THis is a todo </h3>
      </div>
    </div>
  </div>
@endsection