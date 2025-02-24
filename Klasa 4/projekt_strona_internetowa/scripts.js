document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('route-form');
    const routesList = document.getElementById('routes-list');
    const difficultySelect = document.getElementById('difficulty');
    const locationInput = document.getElementById('location');
    let map;
    let marker;

    async function loadDifficulties() {
        const response = await fetch('get_difficulties.php');
        const difficulties = await response.json();
        difficulties.forEach(difficulty => {
            const option = document.createElement('option');
            option.value = difficulty.id;
            option.textContent = difficulty.level;
            difficultySelect.appendChild(option);
        });
    }

    window.initMap = function() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 51.505, lng: -0.09 },
            zoom: 13
        });

        map.addListener('click', (e) => {
            const lat = e.latLng.lat();
            const lng = e.latLng.lng();
            locationInput.value = `${lat},${lng}`;
            if (marker) {
                marker.setPosition(e.latLng);
            } else {
                marker = new google.maps.Marker({
                    position: e.latLng,
                    map: map
                });
            }
        });
    };

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
            if (marker) {
                marker.setMap(null);
                marker = null;
            }
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
            div.textContent = `${route.name} (${route.difficulty}) - ${route.description} [${route.location}]`;
            routesList.appendChild(div);
        });
    }

    loadDifficulties();
    loadRoutes();
});
