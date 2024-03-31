@props(['todo'=>$todo])

<div class="p-4 xl:flex gap-2 justify-between {{ $todo->status == 'incomplete' ? 'bg-primary': 'bg-green-500'}} items-center m-4 text-white font-bold text-xl rounded-md hover:shadow-xl relative">
  <div  class='w-full ' >
    <input   value="{{$todo['body']}}" maxlength="50" id='todo{{$todo['id']}}' class=" todo bg-transparent  focus:outline-none w-full" disabled onblur="removeFocus(event)" ></input>
    
  </div>
@if($todo->status == 'incomplete')
  <div class=" flex  gap-3">
    <form action="{{route('deleteTodo',$todo)}}" method='post'>
      @csrf
      @method('DELETE')
    <button class="todo-btn hover:scale-105 todo-btn hover:text-red-500">
  <i class="fa fa-trash  "></i>
</form>
    </button>
    <button class="todo-btn hover:scale-105 todo-btn hover:text-green-500" onclick="editTodo({{$todo['id']}})"> 
      <i class="fa fa-pen "></i>
  </button>
  </div>
  @endif
  <div class="absolute top-0 bottom-0 flex flex-col justify-center -right-10 ">
    @if($todo->status == 'incomplete')
    <form action="{{route('complete',$todo)}}" method="post">
      @csrf
    <button ><i class="fa-regular fa-circle-check text-black hover:text-green-500 todo-btn text-3xl"></i>
    </button>
    </form>
  @else
  <form action="{{route('deleteTodo',$todo)}}" method='post'>
        @csrf
        @method('DELETE')
      <button class="todo-btn p-1 text-black hover:scale-105 todo-btn hover:text-red-500">
    <i class="fa fa-trash fa-lg "></i>
      </form>
    @endif

  </div>
</div>