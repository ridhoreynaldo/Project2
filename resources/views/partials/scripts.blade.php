<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    // Effect global (boleh dibiarkan)
    document.addEventListener('mousemove', (e) => {
        const shapes = document.querySelectorAll('.shape');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;

        shapes.forEach((shape, index) => {
            const speed = (index + 1) * 10;
            const xOffset = (x - 0.5) * speed;
            const yOffset = (y - 0.5) * speed;
            if (shape.closest('.hero')) {
                shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
            }
        });
    });
</script>
