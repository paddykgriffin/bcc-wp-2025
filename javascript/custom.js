
document.addEventListener("DOMContentLoaded", () => {
// Navbar background change on scroll
  const navbar = document.querySelector(".navbar");
  const navHeight = navbar.offsetHeight;

  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      navbar.classList.add("scrolled");
      document.body.style.position = "relative"; // Fix IE scroll jank
      if (window.innerWidth < 992) { // lg breakpoint
        navbar.style.height = "auto";
      } else {
        navbar.style.height = `${navHeight}px - 40`;
      }
    } else {
      navbar.classList.remove("scrolled");
      document.body.style.position = "static"; // Fix IE scroll jank
      navbar.style.height = ""; // Reset height
    }
  }
);
});


 // Sidebar Toggle
 function openNav() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    if (!sidebar || !overlay) return; // Ensure elements exist before proceeding

    const isOpen = sidebar.getAttribute("data-state") === "open";

    sidebar.setAttribute("data-state", isOpen ? "closed" : "open");
    overlay.setAttribute("data-state", isOpen ? "closed" : "open");

    sidebar.classList.toggle("translate-x-full", isOpen);
    sidebar.classList.toggle("translate-x-0", !isOpen);

    overlay.classList.toggle("opacity-0", isOpen);
    overlay.classList.toggle("opacity-100", !isOpen);
    overlay.classList.toggle("hidden", isOpen);
    overlay.classList.toggle("block", !isOpen);
    overlay.classList.toggle("pointer-events-none", isOpen);
}



// Wait for the DOM to load before adding event listeners
document.addEventListener("DOMContentLoaded", () => {
    const homeBtn = document.getElementById("homeBtn");
    const menuBtn = document.getElementById("menuBtn");
    const closeBtn = document.getElementById("closeBtn");
    const overlay = document.getElementById("overlay");

    if (homeBtn) homeBtn.addEventListener("click", openNav);
    if (menuBtn) menuBtn.addEventListener("click", openNav);
    if (closeBtn) closeBtn.addEventListener("click", openNav);
    if (overlay) overlay.addEventListener("click", openNav);
});