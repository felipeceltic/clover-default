<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>        

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Esqueceu sua senha? Sem problemas. Confirme seu e-mail abaixo e enviaremos um link para criação de uma nova senha.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Seu e-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
