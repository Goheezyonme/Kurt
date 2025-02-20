document.addEventListener('DOMContentLoaded', (event) => {
    // Select all buttons with the class 'tag'
    const buttons = document.querySelectorAll('.tag');

    // Iterate over each button and add an event listener
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            if(button.style.backgroundColor === "grey"){
				button.style.backgroundColor = "yellow";
			}else{
				button.style.backgroundColor = "grey";
			};
				
        });
    });
});