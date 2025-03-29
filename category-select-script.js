document.addEventListener('DOMContentLoaded', (event) => {
    const foodtruck = document.getElementById('foodTruckSearch');
	const musicians = document.getElementById('musicianSearch');
	const catering = document.getElementById('cateringSearch');
    const accomodations = document.getElementById('accommodationSearch');
    const transport = document.getElementById('transportationSearch');
	const venues = document.getElementById('venueSearch');
	
    foodtruck.addEventListener('click', () => {
        window.location.href = "foodTruck-search.php";
    });
	
	musicians.addEventListener('click', () => {
        window.location.href = "musicians-search.php";
    });
	
	catering.addEventListener('click', () => {
        window.location.href = "catering-search.php";
    });
	
	transport.addEventListener('click', () => {
    window.location.href = "TransportSearch.php";
	});
	
	venues.addEventListener('click', () => {
    window.location.href = "VenuesSearch.php";
	});
	
	accomodations.addEventListener('click', () => {
    window.location.href = "AccomodationsSearch.php";
	});
	
});
