// Basculer la visibilité et mettre à jour le compteur de clics
function toggleVisibility(id, arrowId, countId) {
    const element = document.getElementById(id);
    const arrow = document.getElementById(arrowId);
    const clickCountElement = document.getElementById(countId);

    // Obtenir l'ID utilisateur à partir du stockage local ou en générer un nouveau
    let userId = localStorage.getItem('userId');
    if (!userId) {
        userId = generateUserId();
        localStorage.setItem('userId', userId);
    }

    // Obtenir le nombre de clics pour l'utilisateur actuel
    let clickCount = parseInt(localStorage.getItem('clickCount_' + id + '_' + userId)) || 0;

    // Basculer la visibilité de l'élément
    if (element.style.display === 'none') {
        element.style.display = 'block';
        arrow.innerHTML = '&#9650;'; // Flèche vers le haut
        clickCount++;
    } else {
        element.style.display = 'none';
        arrow.innerHTML = '&#9660;'; // Flèche vers le bas
    }

    // Mettre à jour le compteur de clics
    clickCountElement.innerText = clickCount;
    localStorage.setItem('clickCount_' + id + '_' + userId, clickCount);
}

// Générer un ID utilisateur aléatoire
function generateUserId() {
    return Math.random().toString(36).substring(2);
}

// Afficher les compteurs de clics lors du chargement de la page
function displayClickCounts() {
    const userId = localStorage.getItem('userId');
    if (userId) {
        const sections = ['contact', 'skills', 'languages', 'interests', 'education', 'projects', 'internship', 'experience'];
        sections.forEach(section => {
            const clickCount = parseInt(localStorage.getItem('clickCount_' + section + '_' + userId)) || 0;
            document.getElementById(section + '-click-count').innerText = clickCount;
        });
    }
}

// Réinitialiser tous les compteurs de clics
function resetClickCounts() {
    const userId = localStorage.getItem('userId');
    if (userId) {
        const sections = ['contact', 'skills', 'languages', 'interests', 'education', 'projects', 'internship', 'experience'];
        sections.forEach(section => {
            localStorage.setItem('clickCount_' + section + '_' + userId, 0);
            document.getElementById(section + '-click-count').innerText = '0';
        });
    }
}

// Appeler displayClickCounts lors du chargement de la page
window.onload = displayClickCounts;

// Ajouter un écouteur d'événements au bouton de réinitialisation
document.getElementById('reset-button').addEventListener('click', resetClickCounts);
