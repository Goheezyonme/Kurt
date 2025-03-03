document.addEventListener('DOMContentLoaded', (event) => {
    const foodtruck = document.getElementById('foodTruckSearch');
	const musicians = document.getElementById('musicianSearch');
	const catering = document.getElementById('cateringSearch');

    
    foodtruck.addEventListener('click', () => {
        window.location.href = "foodTruck-search-HTML.html";
    });
	
	musicians.addEventListener('click', () => {
        window.location.href = "musicians-search-HTML.html";
    });
	
	catering.addEventListener('click', () => {
        window.location.href = "catering-search-HTML.html";
    });
});