<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li>
                            <a href=" {{ route('sirop.index')}}">Voir les sirops</a>
                        </li>
                        <li>
                            <a href=" {{ route('softs.index')}}">Voir les softs</a>
                        </li>
                        <li>
                            <a href=" {{ route('fruits.index')}}">Voir les fruits</a>
                        </li>
                        <li>
                            <a href=" {{ route('type.index')}}">Voir les types d'alcools</a>
                        </li>
                        <li>
                            <a href=" {{ route('glasse.index')}}">Voir les types de verres</a>
                        </li>
                        <li>
                            <a href=" {{ route('brand.index')}}">Voir les marques d'alcool</a>
                        </li>
                        <li>
                            <a href=" {{ route('cocktails.index')}}">Voir les cocktails</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
