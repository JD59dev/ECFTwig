let btnRole = document.getElementById('btnRole');
let btnDelete = document.getElementById('btnDelete');
let newRole = document.querySelector('.newRole');
let firstRole = document.querySelector('.firstRole');

const init = function () {

  // Création d'une nouvelle ligne de newRole
  // On va utiliser la méthode cloneNode pour la cloner
  // cloneNode() : https://developer.mozilla.org/en-US/docs/Web/API/Node/cloneNode
  newRole.appendChild(firstRole.cloneNode(true));
  btnDelete.removeAttribute("hidden");
}

btnRole.addEventListener("click", init);


// Quand on clique sur le bouton Supprimer, on supprime la ligne créée
btnDelete.addEventListener("click", () => {
  newRole.innerHTML = "";
  btnDelete.setAttribute("hidden", "hidden");
});