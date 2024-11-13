<x-layout>

    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">

        <form action="{{route('register')}}" method="post">
            @csrf
            {{--Username--}}
            <div class="mb-4">

                <label for="username">Username</label>
                <input type="text" name="username" value="{{old('username')}}" class="input 
                    @error ('username')!ring-red-500" @enderror>
                @error('username')
                    <P class="error">{{$message}}</P>
                @enderror

            </div>

            {{--Email--}}
            <div class="mb-4">
                <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email')}}" class="input 
                        @error ('email')!ring-red-500" @enderror>
                        @error('email')
                    <P class="error">{{$message}}</P>
                    @enderror
            </div>

                {{--password--}}
                <div class="mb-4">
                <label for="password">Password</label>
                    <input type="password" name="password" class="input 
                        @error ('password')!ring-red-500" @enderror>
                            @error('password')
                                <P class="error">{{$message}}</P>@enderror
            </div>
                    <div class="mb-8">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="input @error('password') !ring-red-500 @enderror">
                </div>
            
            {{--Submit Button--}}
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            
        </form>
    </div>
</x-layout>