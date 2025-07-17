<!-- Modal Examen -->
<div id="examModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg max-w-lg w-full mx-4 max-h-screen overflow-y-auto">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Nouvel Examen</h3>
            <button onclick="closeModal('examModal')" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="examForm" class="p-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Unité</label>
                    <select name="unit_id" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionner une unité</option>
                        <!-- Les options seront chargées dynamiquement -->
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Intitulé</label>
                    <input type="text" name="intitule" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ex: Test de grammaire">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <input type="text" name="description" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ex: Test de grammaire de base">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Objectifs</label>
                    <textarea name="objectifs" required rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Objectifs pédagogiques de l'examen..."></textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Durée (min)</label>
                        <input type="number" name="duree" required min="1"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="30">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Points</label>
                        <input type="number" name="nbre_points" required min="1"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="100">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sélectionner un type</option>
                            <option value="QCM">QCM</option>
                            <option value="Vrai/Faux">Vrai/Faux</option>
                            <option value="Texte libre">Texte libre</option>
                            <option value="Mixte">Mixte</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nb passages</label>
                        <input type="number" name="nbre_passage" required min="1"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="3">
                    </div>
                </div>
                
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="etat" value="1" 
                               class="mr-2 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="text-sm font-medium text-gray-700">Examen actif</span>
                    </label>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeModal('examModal')" 
                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-orange-700">
                    Créer l'examen
                </button>
            </div>
        </form>
    </div>
</div>