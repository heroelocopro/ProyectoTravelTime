

<title>
    {{ Route::currentRouteName() }}
</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<style>
    *{
        font-family: 'Roboto', sans-serif;
    }
    body{
        background: url('img/portada/personasCaminando.png');
         background-position-y:50%; 
         background-size: auto
    }
    @media  (max-width: 600px){
        body{

            background-position-x: 20%;
        }
    }

    @media  (min-width: 1000px){
        body{

            background-position-x: 25%;
        }
    }
</style>

<body class="overflow-hidden">
    
</body>
<button class="float-start btn btn-primary m-1 shadow"><a class="text-decoration-none text-white" href="{{route('verEventos')}}">Volver</a></button>
<div style="min-height: 50.5rem;" class="d-flex flex-row justify-content-center align-items-center container-fluid"  >
    <form method="POST" style="width: 30rem" class="shadow rounded-3 border p-5" action="{{route('register')}}">
        @csrf
        <h1 class="text-center pb-5 fw-bold">Registro <hr></h1>

        @error("name")  
        <div class="alert alert-danger p-0 m-0">
            <p class="text-center pt-3">Error Nombre incorrecto </p>
        </div>
        @enderror ()

        
        <input name="name" class="rounded-3 p-2 d-block my-2 shadow w-100" placeholder="Nombre" type="text" required>
        @error("email")
        <div class="alert alert-danger p-0 m-0">
            <p class="text-center pt-3">Error Email incorrecto o ya en uso</p>
        </div>
        @enderror
        <input name="email" class="rounded-3 p-2 d-block my-2 shadow w-100" placeholder="Email" type="text" required>
        @error("password")
        <div class="alert alert-danger p-0 m-0">
            <p class="text-center pt-3">Error Contraseña</p>
        </div>
        @enderror
        <input name="password" class="rounded-3 p-2 d-block my-2 shadow w-100" placeholder="Contraseña" type="password" required>
        @error("passowrd_confirmation")
        <div class="alert alert-danger p-0 m-0">
            <p class="text-center pt-3">Error Confirmar Contraseña</p>
        </div>
        @enderror
        <input name="password_confirmation" class="rounded-3 p-2 d-block my-2 shadow w-100" placeholder="Confirmar Contraseña" type="password" required>
        <button type="submit" class="btn btn-primary d-block mx-auto shadow">Registro</button>
    </form>
</div>

<script  src="js/bootstrap.bundle.min.js" ></script>
{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
