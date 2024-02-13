document.getElementById('open_btn').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('open-sidebar');
});
document.getElementById("logout_btn").addEventListener("click", function() {
    window.location.href = "logout.php";
});

function carregarPagina(pagina) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("conteudo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", pagina, true);
    xhttp.send();
}

