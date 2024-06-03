// Initialisation des états de visibilité 可见性状态初始化
const sectionStates = {
    contact: false, // Contact
    skills: false, // Compétences
    languages: false, // Langues
    interests: false, // Intérêts
    education: false, // Éducation
    projects: false, // Projets
    internships: false, // Stages
    experience: false // Expérience
};

function toggleVisibility(sectionId, arrowId, counterId) {
    // Basculer la visibilité 切换可见性
    const section = document.getElementById(sectionId);
    const arrow = document.getElementById(arrowId);
    const counter = document.getElementById(counterId);
    
    sectionStates[sectionId] = !sectionStates[sectionId];

    // Si visible, afficher la flèche vers le haut, sinon vers le bas 如果是可见的，则显示箭头朝上，否则朝下
    if (sectionStates[sectionId]) {
        section.style.display = "block";
        arrow.innerHTML = "&#9650;"; // Flèche vers le haut 箭头向上
    } else {
        section.style.display = "none";
        arrow.innerHTML = "&#9660;"; // Flèche vers le bas 箭头向下
    }

    // Si l'état a changé, mettre à jour le compteur 如果状态已更改，则更新计数器
    if (!counter.clicked) {
        counter.innerHTML = parseInt(counter.innerHTML) + 1;
        counter.clicked = true;
    }
}

function resetCounters() {
    // Réinitialiser les compteurs 重置计数器
    const counters = document.querySelectorAll('span[id$="-click-count"]');
    counters.forEach(counter => {
        counter.innerHTML = "0";
        counter.clicked = false;
    });

    // Réinitialiser les états de visibilité 重置可见性状态
    for (let sectionId in sectionStates) {
        sectionStates[sectionId] = false;
        document.getElementById(sectionId).style.display = "none";
        document.getElementById(sectionId + '-arrow').innerHTML = "&#9660;"; // Flèche vers le bas
    }
}
