<x-layout>

    <h1 class="title text-center">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">

        <form action="{{ route('register') }}" method="post">
            @csrf

            {{-- Username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" 
                       class="input @error('username') ring-red-500 @enderror">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" 
                       class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" 
                       class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-8">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" 
                       class="input @error('password') ring-red-500 @enderror">
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="bg-slate-600 hover:bg-slate-200 text-white font-bold py-2 px-4 rounded w-full">
                Register
            </button>
        </form>

        {{-- OR Divider --}}
        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-300">
            <span class="mx-2 text-gray-500">OR</span>
            <hr class="flex-grow border-gray-300">
        </div>

        {{-- OAuth Buttons --}}
        <div class="space-y-2">
            <a href="{{ route('auth.google.redirect') }}" 
               class="flex items-center justify-center gap-2 btn w-full bg-white text-black border hover:bg-gray-100">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="w-5 h-5">
                Sign up with Google
            </a>
        </div>
    </div>

</x-layout>
