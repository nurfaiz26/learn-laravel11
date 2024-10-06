<x-layout>
    <x-slot:heading>
        Login Form
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    {{-- email --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="email" name="email" id="email"
                                placeholder="email@email.com" required :value="old('email')"/>
                        </div>
                        <x-form-error name="email" />
                    </x-form-field>

                    {{-- password --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="password" name="password" id="password" placeholder="********"
                                required />
                        </div>
                        <x-form-error name="password" />
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="flex mt-6 items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>

</x-layout>
