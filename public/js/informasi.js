document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".fade-section, .fade-in");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    }, {
        // threshold: 0.2 // makin kecil = makin cepat muncul
        threshold: window.innerWidth < 480 ? 0.05 : 0.2
    });

    sections.forEach(section => observer.observe(section));
});
