document.addEventListener('DOMContentLoaded', (event) => {
    const button = document.getElementById('foodTruckSearch');
    
    button.addEventListener('click', () => {
        window.location.href = "foodTruck-search-HTML.html";
    });
});