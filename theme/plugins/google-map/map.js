// On initialise la latitude et la longitude de Paris (centre de la carte)

var macarte = null;
var markerClusters; // Servira à stocker les groupes de marqueurs
// Nous initialisons une liste de marqueurs
var villes = {
  "Salle entrainement": { "lat": 50.80554, "lon": 2.15243 }
};
console.log()
// Fonction d'initialisation de la carte
function initMap() {
	var markers = []; // Nous initialisons la liste des marqueurs
	// Nous définissons le dossier qui contiendra les marqueurs
	// Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
	macarte = L.map('map').setView([villes['Salle entrainement'].lat, villes['Salle entrainement'].lon], 11);
	markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
	// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		// Il est toujours bien de laisser le lien vers la source des données
		attribution: 'données © OpenStreetMap/ODbL - rendu OSM France',
		minZoom: 5,
		maxZoom: 16,
		zoom : 1
	}).addTo(macarte);
	// Nous parcourons la liste des villes
	for (ville in villes) {
		// Nous définissons l'icône à utiliser pour le marqueur, sa taille affichée (iconSize), sa position (iconAnchor) et le décalage de son ancrage (popupAnchor)
		var myIcon = L.icon({
			iconUrl: "./images/marker.png",
			iconSize: [50, 50],
			iconAnchor: [25, 50],
			popupAnchor: [-3, -76],
		});
		var marker = L.marker([villes[ville].lat, villes[ville].lon], { icon: myIcon }); // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters
		marker.bindPopup(ville);
		markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
		markers.push(marker); // Nous ajoutons le marqueur à la liste des marqueurs
	}
	var group = new L.featureGroup(markers); // Nous créons le groupe des marqueurs pour adapter le zoom
	macarte.fitBounds(group.getBounds().pad(0.5)); // Nous demandons à ce que tous les marqueurs soient visibles, et ajoutons un padding (pad(0.5)) pour que les marqueurs ne soient pas coupés
	macarte.addLayer(markerClusters);
}
window.onload = function(){
  // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
  initMap(); 
};