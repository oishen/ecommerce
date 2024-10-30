document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll('.nav-link[data-bs-toggle="pill"]');
    
    function saveActiveTab() {
        const activeTab = document.querySelector('.nav-link.active[data-bs-toggle="pill"]');
        if (activeTab) {
            const href = activeTab.getAttribute('href');
            localStorage.setItem('activeTab', href);
        }
    }

    // Restore the active tab from local storage
    const activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        const tabToActivate = document.querySelector(`.nav-link[href="${activeTab}"]`);
        if (tabToActivate) {
            tabToActivate.classList.add('active');
            const tabPane = document.querySelector(activeTab);
            if (tabPane) {
                tabPane.classList.add('active', 'show');
            }
        }
    } else {
        // If no active tab is stored, set the first tab as active
        tabs[0].classList.add('active');
        const firstTabPane = document.querySelector(tabs[0].getAttribute('href'));
        if (firstTabPane) {
            firstTabPane.classList.add('active', 'show');
        }
    }

    // Store the active tab in local storage whenever a tab is clicked
    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            saveActiveTab();
        });
    });

    // Ensure the active tab is saved before leaving the page
    window.addEventListener('beforeunload', function () {
        saveActiveTab();
    });
});
