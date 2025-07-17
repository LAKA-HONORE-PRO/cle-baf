
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Gestion des Examens</h1>
        <button onclick="openModal('examModal')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter un Examen
        </button>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Intitulé
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Unité
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Durée
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($examens as $examen)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $examen->intitule }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $examen->unit->intitule ?? 'N/A' }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $examen->duree }} min
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <button class="text-blue-500 hover:text-blue-700 mr-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin.modals.exam')
@endsection