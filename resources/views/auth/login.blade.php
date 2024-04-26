<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN MANIAC XIII</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <style>
        .container{
            height:100vh;
        }
        .custom-bg {
            background-image: url('path/to/your/image.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: center;
        }
        body>div{
            background-image: url("{{asset('asset2024/main/bg.png')}}");
            background-size: 101% 101%; 
            background-position: center;
            background-repeat: no-repeat;
        }
        body>div>div>div {
            margin-bottom: 1.75rem;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-primary m-0 p-0">
        <div class="container d-flex justify-content-center align-items-center flex-column">
            <img src="{{ asset('asset2024/main/maniac.png') }}" alt="logo-maniac" class="w-50">
            <div class="bg-primary w-50 d-flex justify-content-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Address -->
                    <div>
                        <label for="username" :value="__('Username')">Username: </label>
                        <input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required
                        autofocus autocomplete="username" />
                        <span messages="$errors->get('username')" class="mt-2 text-danger"></span>
                    </div>
                    
                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')">Password :</label>
                        <input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                        
                        <span :messages="$errors->get('password')" class="mt-2 text-danger"></span>
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-3">
                        <label for="remember_me" class="inline-flex d-flex align-items-center">
                            <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 " name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-3 d-flex align-items-center">
                        <!-- Forgot your password? -->
                        <div>
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-decoration-none"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                            </a>
                            @endif 
                        </div>
                            
                        <!-- Button Log in -->
                        <button class="ms-3 btn-primary btn ">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>