function toggleVisibility(id, arrowId, countId) {
    var element = document.getElementById(id);
    var arrow = document.getElementById(arrowId);
    var clickCountElement = document.getElementById(countId);
    
    // Obtenir l'identifiant utilisateur à partir des cookies
    var userId = getCookie("userId");
    
    // Si aucun identifiant utilisateur n'est disponible, en générer un nouveau et le stocker dans les cookies
    if (!userId) {
        userId = generateUserId();
        setCookie("userId", userId, 365); // Définir la durée de validité du cookie à un an
    }
    
    // Obtenir le nombre de clics de l'utilisateur à partir des cookies
    var clickCount = parseInt(getCookie("clickCount_" + userId)) || 0;
    
    // Si l'élément est caché, le montrer ; sinon, le cacher
    if (element.style.display === "none") {
        element.style.display = "block";
        arrow.innerHTML = "&#9650;"; // flèche vers le haut
        clickCount++;
    } else {
        element.style.display = "none";
        arrow.innerHTML = "&#9660;"; // flèche vers le bas
    }
    
    // Mettre à jour le nombre de clics et le stocker dans les cookies
    clickCountElement.innerText = clickCount;
    setCookie("clickCount_" + userId, clickCount, 365); // Définir la durée de validité du cookie à un an
}
    
// Générer un identifiant utilisateur aléatoire
function generateUserId() {
    return Math.random().toString(36).substring(2);
}
    
// Définir un cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
    
// Obtenir un cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
