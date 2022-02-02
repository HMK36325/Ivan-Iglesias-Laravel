@extends("layouts.app2")

@section("content")
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listado de usuarios") }}</h1>
        </div>
    </div>

    <div class="flex justify-center flex-wrap p-4 mt-5">
        <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
            <thead>
            <tr>
                <th class="px-4 py-2">{{ __("Usuario") }}</th>
                <th class="px-4 py-2">{{ __("Email") }}</th>
            </tr>
            </thead>
            
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                                <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
