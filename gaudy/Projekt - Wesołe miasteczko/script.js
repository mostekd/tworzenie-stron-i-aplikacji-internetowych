// Theme Toggle
const themeToggle = document.querySelector('.theme-toggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        document.body.dataset.theme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
        localStorage.setItem('theme', document.body.dataset.theme);
    });
}

// Load saved theme
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.body.dataset.theme = savedTheme;
});

// FAQ Accordion
const accordionItems = document.querySelectorAll('.accordion-item');
accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');
    const content = item.querySelector('.accordion-content');

    header.addEventListener('click', () => {
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
    });
});

// Attraction Filters
const filterButtons = document.querySelectorAll('.filter-btn');
filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        
        const age = button.dataset.age;
        window.location.href = `attractions.php?age=${age}`;
    });
});

// Booking Form Validation
const bookingForm = document.querySelector('.booking-form');
if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
        const dateInput = document.querySelector('#visit_date');
        const selectedDate = new Date(dateInput.value);
        const today = new Date();

        if (selectedDate < today) {
            e.preventDefault();
            alert('Proszę wybrać przyszłą datę!');
        }
    });
}
