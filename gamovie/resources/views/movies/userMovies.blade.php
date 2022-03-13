
@extends('layouts.app')
@section('content')
<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <th class="px-6 py-2 text-xs text-gray-500">
                            -
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Descripción
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Fecha
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($user->movies as $movie)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    Jon doe
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">Nombre:{{$movie->name}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                            {{$movie->fecha}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection