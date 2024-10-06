<x-layout>
    <x-slot:heading>
        Job Form
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of deatils from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Programmer" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field >

                    <x-form-field class="sm:col-span-4">
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="salary" id="salary" placeholder="$1,000,000" required />
                        </div>
                        <x-form-error name="salary" />
                    </x-form-field>
                </div>
                {{-- <div class="mt-10">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors as $error)
                                <li class="text-red-500 italic">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div> --}}
            </div>
        </div>

        <div class="flex mt-6 items-center justify-end gap-x-6">
            <a href="/jobs" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>

</x-layout>
