document.addEventListener("DOMContentLoaded", () => {
    const navbarContainer = document.getElementById("navbar");

    if (navbarContainer) {
        // Detect path (root or /pages/)
        let path = window.location.pathname;
        let navbarPath = path.includes("/pages/") ? "../navbar.html" : "navbar.html";

        // Fetch and inject navbar
        fetch(navbarPath)
            .then(res => {
                if (!res.ok) {
                    throw new Error(`Failed to load navbar: ${res.status}`);
                }
                return res.text();
            })
            .then(html => {
                navbarContainer.innerHTML = html;

                const hamburger = document.getElementById("hamburger");
                const navLinks = document.getElementById("nav-links");

                if (hamburger && navLinks) {
                    hamburger.addEventListener("click", () => {
                        navLinks.classList.toggle("show");
                    });
                }
            })
            .catch(err => {
                console.error(err);
                navbarContainer.innerHTML = "<p>Navbar failed to load.</p>";
            });
    }
});
