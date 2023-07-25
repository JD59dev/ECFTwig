let personnage = document.getElementById("personnage");
let nom = document.getElementsByID("nom");
let prenom = document.getElementById("prenom");

let delete1 = document.getElementById("sup1")
delete1.addEventListener("click", () => {
    personnage.value = "";
    nom.value = "";
    prenom.value = "";
})
let addButton=document.getElementById("add")
function createNewRoleInput() {
    const row = document.createElement("div");
    row.classList.add("row");
  
    const col1 = document.createElement("div");
    col1.classList.add("col");
    const personnageInput = document.createElement("input");
    personnageInput.type = "text";
    personnageInput.classList.add("form-control", "w-100");
    personnageInput.placeholder = "Personnage";
    personnageInput.name = "role";
    col1.appendChild(personnageInput);
    row.appendChild(col1);
  
    const col2 = document.createElement("div");
    col2.classList.add("col");
    const nomInput = document.createElement("input");
    nomInput.type = "text";
    nomInput.classList.add("form-control", "w-100");
    nomInput.placeholder = "Nom";
    nomInput.name = "nom";
    col2.appendChild(nomInput);
    row.appendChild(col2);
  
    const col3 = document.createElement("div");
    col3.classList.add("col");
    const prenomInput = document.createElement("input");
    prenomInput.type = "text";
    prenomInput.classList.add("form-control", "w-100");
    prenomInput.placeholder = "Prenom";
    prenomInput.name = "prenom";
    col3.appendChild(prenomInput);
    row.appendChild(col3);
  
    const col4 = document.createElement("div");
    col4.classList.add("col");
    const deleteButton = document.createElement("button");
    deleteButton.type = "button";
    deleteButton.classList.add("btn", "btn-primary", "mt-4");
    deleteButton.textContent = "Supprimer";
    deleteButton.addEventListener("click", () => {
      row.remove();
    });
    col4.appendChild(deleteButton);
    row.appendChild(col4);
  
    return row;
  }
  
  addButton.addEventListener("click", () => {
    const rolesContainer = document.querySelector(".form-group.col-md-12.mb-3");
    rolesContainer.appendChild(createNewRoleInput());
  });