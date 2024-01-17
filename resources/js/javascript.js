document.addEventListener('DOMContentLoaded', function () {
    const navLink = document.querySelector('.nav-link');

    navLink.addEventListener('click', function () {
        this.classList.toggle('active');
    });
});


