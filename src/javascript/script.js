document.getElementById('open_btn').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('open-sidebar');
});
document.getElementById("logout_btn").addEventListener("click", function() {
    window.location.href = "logout.php";
});

