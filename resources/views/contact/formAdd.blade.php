<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pad-pro">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pad">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contact_store') }}" method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="nom" :value="__('nom')" />

                            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="numero" :value="__('numero de telephone')" />

                            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="decs" :value="__('description')" />

                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="desc"
                                {{-- required autocomplete="current-password" /> --}} required />

                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('submit') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pad ">
                <div class="p-6 text-gray-900">
                    <h1 onload="loading">liste des contacts</h1>

                    <div class="pad-contact">
                        @foreach ($contacts as $item)
                            <div for={{ strtolower($item->name) }} class="label"><?= strtoupper( substr($item->name, 0, 1)) ?></div>
                            <div class="card">
                                <p>Nom: {{ $item->name }}</p>
                                <p>Numero:{{ $item->numero }}</p>
                                <p>email:{{ $item->email }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- <script>
    loading()
    const loading=()=>{
        let ement=document.querySelector("[for^='f']")
        em
    console.log(ement , 4);
    }
   </script> --}}
</x-app-layout>
