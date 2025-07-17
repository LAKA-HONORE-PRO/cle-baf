// Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Charger les statistiques
    loadStats();
    
    // Charger les données pour les selects
    loadLevels();
    loadUnits();
    
    // Charger les activités récentes
    loadRecentActivities();
    
    // Charger le contenu récent
    loadRecentContent();
    
    // Configurer les formulaires
    setupForms();
});

// Gestion des modals
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Réinitialiser le formulaire
    const form = document.querySelector(`#${modalId} form`);
    if (form) {
        form.reset();
    }
}

// Fermer les modals en cliquant en dehors
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('bg-black')) {
        const modals = ['levelModal', 'unitModal', 'lessonModal', 'examModal'];
        modals.forEach(modalId => {
            if (!document.getElementById(modalId).classList.contains('hidden')) {
                closeModal(modalId);
            }
        });
    }
});

// Charger les statistiques
async function loadStats() {
    try {
        const responses = await Promise.all([
            fetch('/api/levels'),
            fetch('/api/students'),
            fetch('/api/examens'),
            fetch('/api/lessons')
        ]);
        
        const [levels, students, exams, lessons] = await Promise.all(
            responses.map(r => r.json())
        );
        
        document.getElementById('levels-count').textContent = levels.data?.length || 0;
        document.getElementById('students-count').textContent = students.data?.length || 0;
        document.getElementById('exams-count').textContent = exams.data?.length || 0;
        document.getElementById('lessons-count').textContent = lessons.data?.length || 0;
        
    } catch (error) {
        console.error('Erreur lors du chargement des statistiques:', error);
    }
}

// Charger les niveaux pour les selects
async function loadLevels() {
    try {
        const response = await fetch('/api/levels');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        
        const levelSelects = document.querySelectorAll('select[name="level_id"]');
        levelSelects.forEach(select => {
            select.innerHTML = '<option value="">Sélectionner un niveau</option>';
            if (data.data) {
                data.data.forEach(level => {
                    const option = document.createElement('option');
                    option.value = level.id;
                    option.textContent = level.intitule;
                    select.appendChild(option);
                });
            }
        });
    } catch (error) {
        console.error('Erreur lors du chargement des niveaux:', error);
        if (error.message.includes('419')) {
            console.warn('Session expirée, recharger la page ou relancer la requête.');
            // Optionnel : rediriger ou relancer la requête après un délai
            // window.location.reload();
        }
    }
}

// Charger les unités pour les selects
async function loadUnits() {
    try {
        const response = await fetch('/api/units');
        let clone = response.clone();
try {
        const data = await response.json();
        
        const unitSelects = document.querySelectorAll('select[name="unit_id"]');
        unitSelects.forEach(select => {
            select.innerHTML = '<option value="">Sélectionner une unité</option>';
            if (data.data) {
                data.data.forEach(unit => {
                    const option = document.createElement('option');
                    option.value = unit.id;
                    option.textContent = `${unit.intitule} (${unit.level?.intitule || 'Niveau inconnu'})`;
                    select.appendChild(option);
                });
            }
        });
        } catch (err) {
  console.error('Erreur parsing JSON:', err);
  const text = await clone.text();
  console.error('Contenu reçu (pas du JSON) :', text);
        }
    } catch (error) {
        console.error('Erreur lors du chargement des unités:', error);
    }
}

// Charger les activités récentes
async function loadRecentActivities() {
    try {
        const activitiesContainer = document.getElementById('recent-activities');
        
        // Simuler des activités récentes (à adapter selon vos besoins)
        const activities = [
            {
                icon: 'fas fa-user-plus',
                text: 'Nouvel étudiant inscrit',
                time: 'Il y a 2 heures',
                color: 'text-green-600'
            },
            {
                icon: 'fas fa-book',
                text: 'Nouvelle leçon créée',
                time: 'Il y a 4 heures',
                color: 'text-blue-600'
            },
            {
                icon: 'fas fa-chart-line',
                text: 'Examen complété',
                time: 'Il y a 6 heures',
                color: 'text-purple-600'
            },
            {
                icon: 'fas fa-star',
                text: 'Certification obtenue',
                time: 'Il y a 1 jour',
                color: 'text-yellow-600'
            }
        ];
        
        activitiesContainer.innerHTML = activities.map(activity => `
            <div class="flex items-center text-sm">
                <i class="${activity.icon} ${activity.color} mr-3"></i>
                <div class="flex-1">
                    <p class="text-gray-900">${activity.text}</p>
                    <p class="text-gray-500 text-xs">${activity.time}</p>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('Erreur lors du chargement des activités:', error);
        document.getElementById('recent-activities').innerHTML = 
            '<div class="text-sm text-red-600">Erreur lors du chargement des activités</div>';
    }
}

// Charger le contenu récent
async function loadRecentContent() {
    try {
        const contentContainer = document.getElementById('recent-content');
        
        // Charger les différents types de contenu
        const [levels, units, lessons, exams] = await Promise.all([
            fetch('/api/levels').then(r => r.json()).catch(() => ({data: []})),
            fetch('/api/units').then(r => r.json()).catch(() => ({data: []})),
            fetch('/api/lessons').then(r => r.json()).catch(() => ({data: []})),
            fetch('/api/examens').then(r => r.json()).catch(() => ({data: []}))
        ]);
        
        // Combiner et trier par date
        const allContent = [
            ...(levels.data || []).map(item => ({...item, type: 'Niveau', icon: 'fas fa-layer-group', color: 'bg-blue-100 text-blue-800'})),
            ...(units.data || []).map(item => ({...item, type: 'Unité', icon: 'fas fa-book-open', color: 'bg-green-100 text-green-800'})),
            ...(lessons.data || []).map(item => ({...item, type: 'Leçon', icon: 'fas fa-chalkboard-teacher', color: 'bg-purple-100 text-purple-800'})),
            ...(exams.data || []).map(item => ({...item, type: 'Examen', icon: 'fas fa-file-alt', color: 'bg-orange-100 text-orange-800'}))
        ];
        
        // Trier par date de création (les plus récents en premier)
        allContent.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
        
        // Prendre les 10 premiers
        const recentContent = allContent.slice(0, 10);
        
        if (recentContent.length === 0) {
            contentContainer.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                        Aucun contenu récent trouvé
                    </td>
                </tr>
            `;
            return;
        }
        
        contentContainer.innerHTML = recentContent.map(item => `
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-8 w-8 ${item.color} rounded-full flex items-center justify-center">
                            <i class="${item.icon} text-sm"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">${item.type}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${item.intitule}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${
                        item.etat !== false ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                    }">
                        ${item.etat !== false ? 'Actif' : 'Inactif'}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    ${new Date(item.created_at).toLocaleDateString('fr-FR')}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `).join('');
        
    } catch (error) {
        console.error('Erreur lors du chargement du contenu récent:', error);
        document.getElementById('recent-content').innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-red-600">
                    Erreur lors du chargement du contenu
                </td>
            </tr>
        `;
    }
}

// Configuration des formulaires
function setupForms() {
    // Formulaire niveau
    document.getElementById('levelForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm(this, '/api/levels', 'POST', 'levelModal');
    });
    
    // Formulaire unité
    document.getElementById('unitForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm(this, '/api/units', 'POST', 'unitModal');
    });
    
    // Formulaire leçon
    document.getElementById('lessonForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm(this, '/api/lessons', 'POST', 'lessonModal');
    });
    
    // Formulaire examen
    document.getElementById('examForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        await submitForm(this, '/api/examens', 'POST', 'examModal');
    });
}

// Soumettre un formulaire
async function submitForm(form, url, method, modalId) {
    try {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        // Convertir les checkboxes
        if (data.etat === undefined) data.etat = false;
        if (data.is_valider === undefined) data.is_valider = false;
        
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify(data)
        });

        let clone = response.clone();
try {
  const json = await response.json();
        
        if (response.ok) {
            showNotification('Élément créé avec succès!', 'success');
            closeModal(modalId);
            
            // Recharger les données
            loadStats();
            loadLevels();
            loadUnits();
            loadRecentContent();
            
        } else {
            const errorData = await response.json();
            showNotification(errorData.message || 'Erreur lors de la création', 'error');
        }
        } catch (err) {
  console.error('Erreur parsing JSON:', err);
  const text = await clone.text();
  console.error('Contenu reçu (pas du JSON) :', text);
}
        
    } catch (error) {
        console.error('Erreur lors de la soumission:', error);
        showNotification('Erreur lors de la soumission', 'error');
    }
}

// Afficher une notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden transform transition-all duration-300 ease-in-out`;
    
    const bgColor = type === 'success' ? 'bg-green-50' : type === 'error' ? 'bg-red-50' : 'bg-blue-50';
    const textColor = type === 'success' ? 'text-green-800' : type === 'error' ? 'text-red-800' : 'text-blue-800';
    const iconColor = type === 'success' ? 'text-green-400' : type === 'error' ? 'text-red-400' : 'text-blue-400';
    const icon = type === 'success' ? 'fas fa-check-circle' : type === 'error' ? 'fas fa-exclamation-circle' : 'fas fa-info-circle';
    
    notification.innerHTML = `
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="${icon} ${iconColor}"></i>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium ${textColor}">${message}</p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none" onclick="this.parentElement.parentElement.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer automatiquement après 5 secondes
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}