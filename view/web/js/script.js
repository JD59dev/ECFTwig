
let btnRole = document.getElementById('btnRole');
let buttons = document.getElementById('buttons');

const init = function () {
  let newRole = document.querySelector('.newRole');
  let firstRole = document.querySelector('.firstRole');

  // Création d'une nouvelle ligne de newRole
  // On va utiliser la méthode cloneNode pour la cloner
  // cloneNode() : https://developer.mozilla.org/en-US/docs/Web/API/Node/cloneNode
  newRole.appendChild(firstRole.cloneNode(true));

  // Si on clique sur btnRole ("Ajouter un rôle" sur la page du formulaire), il faudra aussi créer un bouton Supprimer sur chaque nouvelle ligne
  let btnDelete = document.createElement("button");
  btnDelete.textContent = "Supprimer";
  btnDelete.type = "button";
  btnDelete.classList.add("col", "btn", "btn-outline-danger");

  // Quand on clique sur le bouton Supprimer, on supprime la ligne créée
  btnDelete.addEventListener("click", () => {
    newRole.remove();
  });

  // Insertion de la nouvelle div newRole
  newRole.parentNode.insertBefore(btnDelete, newRole.nextSibling);

}

btnRole.addEventListener("click", init);



// console.log(btnRole);