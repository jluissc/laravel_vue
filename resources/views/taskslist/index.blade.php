@extends('layouts.app')

@section('content')
    <nav class="flex p-4">
        <ul>
            <li><router-link to="/form" class="text-xl text-white mx-3 p-2"
                active-class="font-bold"
                exact>Add Task</router-link>
            </li>
            <li><router-link to="/" class="text-xl text-white mx-3 p-2"
                active-class="font-bold"
                exact>Tasks List</router-link>
            </li>
        </ul>
    </nav>
    <div class="flex justify-center mt-20">
        {{-- <form-component />
        <lists-component /> --}}
        <router-view></router-view>

    </div>

    
@endsection