function openNav() {
    document.getElementById('sideNav').classList.add('open');
    document.getElementById('navOverlay').classList.add('active');
    document.getElementById('menu-span1').style.display = 'none';
    document.getElementById('menu-span2').style.display = 'none';
    document.getElementById('menu-span3').style.display = 'none';
}
function closeNav() {
    document.getElementById('sideNav').classList.remove('open');
    document.getElementById('navOverlay').classList.remove('active');
    document.getElementById('menu-span1').style.display = 'block';
    document.getElementById('menu-span2').style.display = 'block';
    document.getElementById('menu-span3').style.display = 'block';
}