function showProduct() {
    document.getElementById('offcanva1').style.display = 'block';
    document.getElementById('offcanva2').style.display = 'none';
    localStorage.setItem('currentOffcanvas', 'product');
}

function showBanner() {
    document.getElementById('offcanva1').style.display = 'none';
    document.getElementById('offcanva2').style.display = 'block';
    localStorage.setItem('currentOffcanvas', 'banner');
}

function restoreOffcanvasState() {
    const currentOffcanvas = localStorage.getItem('currentOffcanvas');
    if (currentOffcanvas === 'banner') {
        showBanner();
    } else {
        showProduct();
    }
}