document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('route-form');
    const routesList = document.getElementById('routes-list');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const response = await fetch('add_route.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            loadRoutes();
            form.reset();
        } else {
            alert('Failed to add route');
        }
    });

    async function loadRoutes() {
        const response = await fetch('get_routes.php');
        const routes = await response.json();
        routesList.innerHTML = '';
        routes.forEach(route => {
            const div = document.createElement('div');
            div.textContent = `${route.name} (${route.difficulty}) - ${route.description}`;
            routesList.appendChild(div);
        });
    }

    loadRoutes();
});
