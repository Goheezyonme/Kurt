document.addEventListener('DOMContentLoaded', (event) => {
    const foodtruck = document.getElementById('foodTruckSearch');
	const musicians = document.getElementById('musicianSearch');
	const catering = document.getElementById('cateringSearch');
    const accomodations = document.getElementById('accomodationSearch');
    const transport = document.getElementById('transportationSearch');
	const venues = document.getElementById('venueSearch');
	
    foodtruck.addEventListener('click', () => {
        window.location.href = "foodTruck-search-HTML.html";
    });
	
	musicians.addEventListener('click', () => {
        window.location.href = "musicians-search-HTML.html";
    });
	
	catering.addEventListener('click', () => {
        window.location.href = "catering-search-HTML.html";
    });
	
	transport.addEventListener('click', () => {
    window.location.href = "TransportSearch.php";
	});
	
	accomodations.addEventListener('click', () => {
    window.location.href = "AccomodationsSearch.html";
	});
	
	venues.addEventListener('click', () => {
    window.location.href = "VenuesSearch.html";
	});
	
});
