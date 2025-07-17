<!-- Modal Unité -->
<div id="unitModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg max-w-lg w-full mx-4 max-h-screen overflow-y-auto">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Nouvelle Unité</h3>
            <button onclick="closeModal('unitModal')" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="unitForm" class="p-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                    <select name="level_id" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionner un niveau</option>
                        <!-- Les options seront chargées dynamiquement -->
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Intitulé</label>
                    <input type="text" name="intitule" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ex: Grammaire de base">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" required rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Description de l'unité..."></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Objectifs</label>
                    <textarea name="objectifs" required rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Objectifs pédagogiques de l'unité..."></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeModal('unitModal')" 
                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Créer l'unité
                </button>
            </div>
        </form>
    </div>
</div>