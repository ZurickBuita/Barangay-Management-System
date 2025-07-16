document.addEventListener('DOMContentLoaded', ()=> {
 // Get the current file name
 const currentFile = window.location.pathname.split('/').pop();

 // Select all nav-links
 const navLinks = document.querySelectorAll(".nav-link");
 navLinks.forEach(link => {
 	// Get href attribute without query or hash
 	const linkHref = link.getAttribute("href");
 	if (!linkHref) return;

 	const linkFile = linkHref.split("/").pop().split("?")[0].split("#")[0];
 	const navItem = link.closest(".nav-item");

 	// Compare to current file
 	if (linkFile === currentFile) {
 		link.classList.add("bg-primary");
 		link.style.borderLeft = "solid 6px white";
 		if (navItem) {
 			navItem.classList.add("active");
 		}
 	} else {
 		link.classList.remove("bg-primary");
 		if (navItem) {
 			navItem.classList.remove("active");
 		}
 	}
 });
});