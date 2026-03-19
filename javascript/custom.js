// ─────────────────────────────────────────────
// HUD: helper UI utilities
// ─────────────────────────────────────────────
function openNav() {
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  const menuBtn = document.getElementById("menuBtn");
  if (!sidebar || !overlay) return;

  const isOpen = sidebar.getAttribute("data-state") === "open";
  const nextState = isOpen ? "closed" : "open";

  sidebar.setAttribute("data-state", nextState);
  overlay.setAttribute("data-state", nextState);

  sidebar.classList.toggle("translate-x-full", isOpen);
  sidebar.classList.toggle("translate-x-0", !isOpen);

  overlay.classList.toggle("opacity-0", isOpen);
  overlay.classList.toggle("opacity-100", !isOpen);
  overlay.classList.toggle("hidden", isOpen);
  overlay.classList.toggle("block", !isOpen);
  overlay.classList.toggle("pointer-events-none", isOpen);

  if (menuBtn) {
    menuBtn.setAttribute("aria-expanded", String(!isOpen));
    menuBtn.setAttribute("aria-label", !isOpen ? "Close main menu" : "Open main menu");
  }
}

function initNavbarScroll() {
  const navbar = document.querySelector(".navbar");
  if (!navbar) return;

  const navHeight = navbar.offsetHeight;
  let ticking = false;

  window.addEventListener(
    "scroll",
    () => {
      if (ticking) return;
      ticking = true;

      requestAnimationFrame(() => {
        const scrolled = window.scrollY > 300;
        navbar.classList.toggle("scrolled", scrolled);

        if (scrolled) {
          navbar.style.height =
            window.innerWidth < 992 ? "auto" : `${navHeight - 2}px`;
        } else {
          navbar.style.height = "";
        }

        ticking = false;
      });
    },
    { passive: true }
  );
}

function initSidebarToggle() {
  const ids = ["homeBtn", "menuBtn", "closeBtn", "overlay"];

  ids.forEach((id) => {
    const el = document.getElementById(id);
    if (!el) return;

    let lastTouchEnd = 0;

    el.addEventListener(
      "touchstart",
      () => {
        lastTouchEnd = Date.now();
        openNav();
      },
      { passive: true }
    );

    el.addEventListener("click", () => {
      if (Date.now() - lastTouchEnd > 300) {
        openNav();
      }
    });
  });
}

function initAccordion() {
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
}

function initHeroScroll() {
  const scrollBtn = document.getElementById("scrollHeroDown");
  if (!scrollBtn) return;

  scrollBtn.addEventListener("click", () => {
    const heroSection = document.getElementById("latest-sermon");
    const nextSection = heroSection?.nextElementSibling;
    if (!nextSection) return;

    const OFFSET = window.innerWidth < 480 ? 200 : 380;
    const top = nextSection.getBoundingClientRect().top + window.scrollY - OFFSET;

    window.scrollTo({ top, behavior: "smooth" });
  });
}

function initSubmenuToggle() {
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
}

document.addEventListener("DOMContentLoaded", () => {
  initNavbarScroll();
  initSidebarToggle();
  initAccordion();
  initHeroScroll();
  initSubmenuToggle();
});
