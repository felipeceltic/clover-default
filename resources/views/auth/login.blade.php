<x-guest-layout>
    <x-header />
    <div class="md:grid gap-0 md:grid-cols-2 z-20">
        <div class="md:col">
            <x-authentication-card>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('E-mail') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Senha') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembrar de mim') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif

                        <x-button class="ml-4">
                            {{ __('Entrar') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
        <div class="md:col bg-slate-900 flex justify-center items-center relative -z-10">
            <span class="bg-green-400 absolute left-[-200px] rounded-full w-[400px] h-[400px] blur-3xl"></span>
            <lord-icon
                src="https://cdn.lordicon.com/dqxvvqzi.json"
                trigger="hover"
                colors="outline:#121331,primary:#ffc738,secondary:#4bb3fd"
                state="hover-nodding"
                style="width:450px;height:450px">
            </lord-icon>
        </div>
    </div>
</x-guest-layout>
