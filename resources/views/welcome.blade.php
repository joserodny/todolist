<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<!-- component -->
<body class="antialiased bg-slate-200 text-slate-700 mx-2">
    <!-- Modal toggle -->

    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <div class="flex flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-medium">Tasks list</h1>
            </div>
            <div class="inline-flex space-x-2 items-center">
                <button  data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center text-indigo-200 hover:text-white bg-indigo-600 hover:bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium hidden md:block">Add</span>
                </button>
            </div>
        </div>
        <p class="text-slate-500">Hello, here are your latest tasks</p>

        <div id="tasks" class="my-5">

            @forelse ($task as $tasks)
                @if ($tasks->status_id == 1)
                <div id="task" class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent bg-gradient-to-r from-transparent to-transparent hover:from-slate-100 transition ease-linear duration-150">
                    <div class="inline-flex items-center space-x-2">
                        <div>
                            <form method="POST" action={{ route('todolist.update', $tasks->id) }}>
                                @csrf
                                @method('PUT')
                            <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500 hover:text-indigo-600 hover:cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            </button>
                            </form>
                        </div>
                        <div>{{ $tasks->task }}</div>
                    </div>
                    <div>
                        <form method="POST" action={{ route('todolist.destroy', $tasks->id) }}>
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @else

            <div id="task" class="flex justify-between items-center border-b border-slate-200 py-3 px-2 border-l-4  border-l-transparent">
                <div class="inline-flex items-center space-x-2">
                    <div>
                            <form method="POST" action={{ route('todolist.update', $tasks->id) }}>
                                @csrf
                                @method('PUT')
                                <button type="submit">
                                    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"/>
                                      </svg>
                                </button>
                        </form>
                        </div>


                    <div class="text-slate-500 line-through">{{ $tasks->task }}</div>
                </div>
                <div>
                    <form method="POST" action={{ route('todolist.destroy', $tasks->id) }}>
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 hover:text-slate-700 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                        </button>
                    </form>
                </div>
            </div>
                @endif


            @empty
            <h3>No Data</h3>
            @endforelse





        </div>

    </div>


    @include('modal')
    @include('sweetalert::alert')


</body>
</html>
