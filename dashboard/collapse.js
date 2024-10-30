    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('bannerLink').addEventListener('click', function(event) {
            event.preventDefault();  // Prevent the default link behavior
            document.getElementById('offcanva1').style.display = 'none';
            document.getElementById('offcanva2').style.display = 'block';
        });

        document.getElementById('productLink').addEventListener('click', function(event) {
            event.preventDefault();  // Prevent the default link behavior
            document.getElementById('offcanva2').style.display = 'none';
            document.getElementById('offcanva1').style.display = 'block';
        });
    });
