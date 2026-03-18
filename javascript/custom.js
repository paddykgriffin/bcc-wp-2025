// ─────────────────────────────────────────────
// Navbar — shrink on scroll
// ─────────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
  const navbar = document.querySelector(".navbar");
  if (!navbar) return;

  const navHeight = navbar.offsetHeight;
  let ticking = false;

  window.addEventListener(
    "scroll",
    () => {
      if (!ticking) {
        requestAnimationFrame(() => {
          const scrolled = window.scrollY > 300;
          navbar.classList.toggle("scrolled", scrolled);

          if (scrolled) {
            // Correct arithmetic: compute the value in JS, not in the string
            navbar.style.height =
              window.innerWidth < 992 ? "auto" : `${navHeight - 40}px`;
          } else {
            navbar.style.height = ""; // reset to CSS default
          }

          ticking = false;
        });

        ticking = true;
      }
    },
    { passive: true } // Lets iOS scroll without waiting for JS
  );
});


// ─────────────────────────────────────────────
// Sidebar — open / close toggle
// ─────────────────────────────────────────────
function openNav() {
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  if (!sidebar || !overlay) return;

  const isOpen = sidebar.getAttribute("data-state") === "open";
  const nextState = isOpen ? "closed" : "open";

  // Single source of truth via data-state; use CSS to drive the visual states
  sidebar.setAttribute("data-state", nextState);
  overlay.setAttribute("data-state", nextState);

  // Tailwind utility helpers
  sidebar.classList.toggle("translate-x-full", isOpen);
  sidebar.classList.toggle("translate-x-0", !isOpen);

  overlay.classList.toggle("opacity-0", isOpen);
  overlay.classList.toggle("opacity-100", !isOpen);
  overlay.classList.toggle("hidden", isOpen);
  overlay.classList.toggle("block", !isOpen);
  overlay.classList.toggle("pointer-events-none", isOpen);
}

document.addEventListener("DOMContentLoaded", () => {
  const ids = ["homeBtn", "menuBtn", "closeBtn", "overlay"];
  ids.forEach((id) => {
    const el = document.getElementById(id);
    if (el) el.addEventListener("click", openNav);
  });
});


// ─────────────────────────────────────────────
// Accordion — directions / locations
// ─────────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
  const toggleBtns = document.querySelectorAll(
    ".bcc-location-directions-accordion .btn"
  );

  toggleBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      this.classList.toggle("active");

      const nextDiv = this.nextElementSibling;
      if (nextDiv && nextDiv.tagName === "DIV") {
        nextDiv.classList.toggle("active");
      }
    });
  });
});


// ─────────────────────────────────────────────
// Hero scroll-down button
// ─────────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
  const scrollBtn = document.getElementById("scrollHeroDown");
  if (!scrollBtn) return;

  scrollBtn.addEventListener("click", () => {
    const heroSection = document.getElementById("latest-sermon");
    const nextSection = heroSection?.nextElementSibling;
    if (!nextSection) return;

    const OFFSET = 380; // px offset from top of next section
    const top =
      nextSection.getBoundingClientRect().top + window.scrollY - OFFSET;

    window.scrollTo({ top, behavior: "smooth" });
  });
});


// ─────────────────────────────────────────────
// Sidebar sub-menu toggles
// ─────────────────────────────────────────────
document.addEventListener("DOMContentLoaded", () => {
  const toggleButtons = document.querySelectorAll(".submenu-toggle");

  toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const submenu = button.nextElementSibling;
      if (!submenu?.classList.contains("sub-menu")) return;

      const isOpen = button.getAttribute("aria-expanded") === "true";
      button.setAttribute("aria-expanded", String(!isOpen));
      submenu.classList.toggle("open", !isOpen);

      const icon = button.querySelector(".material-symbols-outlined");
      if (icon) icon.textContent = isOpen ? "add" : "remove";
    });
  });
});
