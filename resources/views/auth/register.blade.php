<x-layout>
    <x-slot:heading>
        Register Form
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    {{-- first_name --}}
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="text" name="first_name" id="first_name" placeholder="First Name" required />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field >

                    {{-- last_name --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="text" name="last_name" id="last_name" placeholder="Last Name" required />
                        </div>
                        <x-form-error name="last_name" />
                    </x-form-field>

                    {{-- email --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="email" name="email" id="email" placeholder="email@email.com" required />
                        </div>
                        <x-form-error name="email" />
                    </x-form-field>

                    {{-- password --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="password" name="password" id="password" placeholder="********" required />
                        </div>
                        <x-form-error name="password" />
                    </x-form-field>

                    {{-- confirm password --}}
                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input required type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required />
                        </div>
                        <x-form-error name="password_confirmation" />
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="flex mt-6 items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layout>
