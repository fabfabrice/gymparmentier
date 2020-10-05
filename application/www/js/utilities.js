"use strict";

function installEventHandler(selector, type, eventHandler) {
  let domObject;
  // Récupération du premier objet DOM correspondant au sélecteur.
  domObject = document.querySelector(selector);
  // Installation d'un gestionnaire d'évènement sur cet objet DOM.
  domObject.addEventListener(type, eventHandler);
}

function getRandomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
