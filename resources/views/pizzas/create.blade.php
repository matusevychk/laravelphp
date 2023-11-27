@extends('layouts.layout')
            
@section('content')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white" style="justify-content: center; align-items: center;">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
    <div class="wrapper create-pizza">
        <h1>Create a new Pizza</h1>
        <form action="/pizzas" method="POST">
            @csrf
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name">
            <label for="type">Choose pizza type:</label>
            <select name="type" id="type">
                <option value="margarita">Margarita</option>
                <option value="hawaiian">Hawaiian</option>
                <option value="veg supreme">Veg supreme</option>
                <option value="volcano">Volcano</option>
            </select>
            <label for="base">Choose base of type:</label>
            <select name="base" id="base">
                <option value="cheesy crust">Cheesy crust</option>
                <option value="thin & crispy">Thin & crispy</option>
                <option value="garlic crust">Garlic crust</option>
                <option value="thick">Thick</option>
            </select>
            <select name="price" id="price">
                <option value="0">0</option>
            </select>
            <fieldset>
                <label>Extra toppings:</label>
                <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms<br />
                <input type="checkbox" name="toppings[]" value="peppers">Peppers<br />
                <input type="checkbox" name="toppings[]" value="garlic">Garlic<br />
                <input type="checkbox" name="toppings[]" value="olives">Olives<br />
            </fieldset>
            <input type="submit" value="Order Pizza">
        </form>
    </div>        
            
@endsection