document.addEventListener('DOMContentLoaded', (event) => {
    //define buttons as all tags
	const buttons = document.querySelectorAll('.tag');
	
	//when any button is clicked toggle its color
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const currentColor = window.getComputedStyle(button).backgroundColor;
			
            if (currentColor === "rgb(128, 128, 128)") {
                button.style.backgroundColor = "#15BDA1";
            } else {
                button.style.backgroundColor = "grey";
            }
        });
    });
	
		//define the search button
	const search = document.getElementById("search");
	
	//
	search.addEventListener('click', () =>{
		buttons.forEach(button =>{
			if(button.style.backgroundColor === "rgb(21, 189, 161)"){
				console.log(button.innerHTML);
			}
		});
	});
	
});
