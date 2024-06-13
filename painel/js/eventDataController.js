let bgModal = document.querySelector("#bgModal");
let bgModalHex = document.querySelector("#bgModalHex");

bgModal.addEventListener("input", () => { bgModalHex.value = bgModal.value; }, false);

let titleModal = document.querySelector("#titleModal");
let titleModalHex = document.querySelector("#titleModalHex");

titleModal.addEventListener("input", () => { titleModalHex.value = titleModal.value; }, false);

let textModal = document.querySelector("#textModal");
let textModalHex = document.querySelector("#textModalHex");

textModal.addEventListener("input", () => { textModalHex.value = textModal.value; }, false);