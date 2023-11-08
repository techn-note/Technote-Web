function showProject() {
    const element = document.getElementById("recente");
    const element2 = document.getElementById("atual");
    element.style.display = "grid";
    element2.style.display = "none";
  }
  
  document.addEventListener("DOMContentLoaded", function() {
    const origin = document.getElementById("projetos");
    const element = document.getElementById("recente");
    const element2 = document.getElementById("atual");
    origin.addEventListener("mouseout", function() {
      element.style.display = "none";
      element2.style.display = "grid";
    });
  });