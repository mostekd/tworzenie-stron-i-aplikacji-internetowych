function initMap(lat, lng, elementId) {
    var map = L.map(elementId).setView([lat, lng], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([lat, lng]).addTo(map);
}

document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('map')) {
        var map = L.map('map').setView([52.237049, 21.017532], 6); // Centered on Poland
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker;
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });
    }

    // Add animations
    const elements = document.querySelectorAll('section, .route, form');
    elements.forEach(element => {
        element.style.opacity = 0;
        element.style.transform = 'translateY(20px)';
    });

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    elements.forEach(element => {
        observer.observe(element);
    });
});
