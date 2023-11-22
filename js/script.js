
document.addEventListener("DOMContentLoaded", function() {
    const origin = document.getElementById("projetos");
    const element = document.getElementById("recente");
    const element2 = document.getElementById("atual");
    origin.addEventListener("mouseout", function() {
        element.style.display = "none";
        element2.style.display = "grid";
    });
});

var modal = document.getElementById("myModal");
var btn = document.getElementById("modalBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function enviarEmail() {
    // Coleta os dados do formulário
    var formData = new FormData(document.getElementById('contatoForm'));

    // Envia os dados usando Fetch
    fetch('contato.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Trata a resposta aqui se necessário
        alert('E-mails enviados com sucesso!');
    })
    .catch(error => {
        // Trata erros aqui se necessário
        console.error('Erro:', error);
    });
    alert('E-mails enviados com sucesso!');
}