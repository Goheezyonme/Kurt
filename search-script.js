document.addEventListener('DOMContentLoaded', (event) => {
    const buttons = document.querySelectorAll('.tag');
	
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
});
