        // Initialisation des états de visibilité
        const sectionStates = {
            contact: false,
            skills: false,
            languages: false,
            interests: false,
            education: false,
            projects: false,
            internships: false,
            experience: false
        };

        function toggleVisibility(sectionId, arrowId, counterId) {
            const section = document.getElementById(sectionId);
            const arrow = document.getElementById(arrowId);
            const counter = document.getElementById(counterId);
            
            sectionStates[sectionId] = !sectionStates[sectionId];

            if (sectionStates[sectionId]) {
                section.style.display = "block";
                arrow.innerHTML = "&#9650;";
            } else {
                section.style.display = "none";
                arrow.innerHTML = "&#9660;";
            }

            // Mise à jour du compteur si l'état a changé
            if (!counter.clicked) {
                counter.innerHTML = parseInt(counter.innerHTML) + 1;
                counter.clicked = true;
            }
        }

        function resetCounters() {
            // Réinitialiser les compteurs
            const counters = document.querySelectorAll('span[id$="-click-count"]');
            counters.forEach(counter => {
                counter.innerHTML = "0";
                counter.clicked = false;
            });

            // Réinitialiser les états de visibilité
            for (let sectionId in sectionStates) {
                sectionStates[sectionId] = false;
                document.getElementById(sectionId).style.display = "none";
                document.getElementById(sectionId + '-arrow').innerHTML = "&#9660;";
            }
        }