<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin - Plateforme de Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out" x-data="{ open: true }">
        <div class="flex items-center justify-between h-16 px-6 bg-blue-600 text-white">
            <h1 class="text-lg font-bold">Formation Admin</h1>
            <button @click="open = !open" class="lg:hidden">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <nav class="mt-8">
            <div class="px-6 py-3">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Gestion des Cours</p>
            </div>
            
            <a href="{{ route('admin.levels') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-layer-group mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Niveaux</span>
            </a>
            
            <a href="{{ route('admin.units') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-book-open mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Unités</span>
            </a>
            
            <a href="{{ route('admin.lessons') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-chalkboard-teacher mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Leçons</span>
            </a>
            
            <div class="px-6 py-3 mt-6">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Évaluations</p>
            </div>
            
            <a href="{{ route('admin.examens') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-file-alt mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Examens</span>
            </a>
            
            <a href="{{ route('admin.questions') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-question-circle mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Questions</span>
            </a>
            
            <a href="{{ route('admin.answers') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-check-circle mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Réponses</span>
            </a>
            
            <div class="px-6 py-3 mt-6">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Utilisateurs</p>
            </div>
            
            <a href="{{ route('admin.students') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-users mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Étudiants</span>
            </a>
            
            <a href="{{ route('admin.appartenir') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-certificate mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Inscriptions</span>
            </a>
            
            <a href="{{ route('admin.composer') }}" class="sidebar-link group flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-chart-line mr-3 text-gray-400 group-hover:text-blue-600"></i>
                <span>Résultats</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        <p class="text-sm text-gray-600">Gestion de la plateforme de formation en anglais</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="fas fa-layer-group text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Niveaux</p>
                            <p class="text-2xl font-bold text-gray-900" id="levels-count">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="fas fa-users text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Étudiants</p>
                            <p class="text-2xl font-bold text-gray-900" id="students-count">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <i class="fas fa-file-alt text-purple-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Examens</p>
                            <p class="text-2xl font-bold text-gray-900" id="exams-count">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-full">
                            <i class="fas fa-chalkboard-teacher text-orange-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Leçons</p>
                            <p class="text-2xl font-bold text-gray-900" id="lessons-count">-</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Actions Rapides</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <button onclick="openModal('levelModal')" class="quick-action-btn bg-blue-50 hover:bg-blue-100 text-blue-700 p-4 rounded-lg text-center transition-colors">
                                <i class="fas fa-plus-circle mb-2 text-xl"></i>
                                <p class="text-sm font-medium">Nouveau Niveau</p>
                            </button>
                            <button onclick="openModal('unitModal')" class="quick-action-btn bg-green-50 hover:bg-green-100 text-green-700 p-4 rounded-lg text-center transition-colors">
                                <i class="fas fa-book-open mb-2 text-xl"></i>
                                <p class="text-sm font-medium">Nouvelle Unité</p>
                            </button>
                            <button onclick="openModal('lessonModal')" class="quick-action-btn bg-purple-50 hover:bg-purple-100 text-purple-700 p-4 rounded-lg text-center transition-colors">
                                <i class="fas fa-chalkboard-teacher mb-2 text-xl"></i>
                                <p class="text-sm font-medium">Nouvelle Leçon</p>
                            </button>
                            <button onclick="openModal('examModal')" class="quick-action-btn bg-red-50 hover:bg-orange-100 text-orange-700 p-4 rounded-lg text-center transition-colors">
                                <i class="fas fa-file-alt mb-2 text-xl"></i>
                                <p class="text-sm font-medium">Nouvel Examen</p>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Activités Récentes</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4" id="recent-activities">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Chargement des activités...
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Content -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Contenu Récent</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="recent-content">
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>
                                    Chargement du contenu...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modals -->
    @include('admin.modals.level')
    @include('admin.modals.unit')
    @include('admin.modals.lesson')
    @include('admin.modals.exam')

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>