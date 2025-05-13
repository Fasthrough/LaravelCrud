<x-layout>
    <h1 class="title text-center" >Login</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
            @csrf

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
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember checkbox --}}
            <div class="mb-4 flex justify-between items-center">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            @error('failed')
                <p class="error">{{ $message }}</p>
            @enderror

            {{-- Submit Button --}}
            <button class="btn w-full mb-4">Login</button>
        </form>

        {{-- OR Divider --}}
        <div class="flex items-center my-4">
            <hr class="flex-grow border-gray-300">
            <span class="mx-2 text-gray-500">OR</span>
            <hr class="flex-grow border-gray-300">
        </div>

        {{-- OAuth Buttons --}}
        <div class="space-y-2">
            <a href="{{ route('auth.google.redirect') }}" class="flex items-center justify-center gap-2 btn w-full bg-white text-black border hover:bg-gray-100">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="w-5 h-5">
                Sign in with Google
            </a>
            
        </div>
    </div>
</x-layout>
