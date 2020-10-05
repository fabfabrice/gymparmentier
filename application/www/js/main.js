"use strict";

/***********************************************/
/***********************************************/
/**************              *******************/
/**************     MENU     *******************/
/**************              *******************/
/***********************************************/
/***********************************************/

$(".menu-collapsed").click(function () {
  $(this).toggleClass("menu-expanded");
});

/***********************************************/
/***********************************************/
/**************              *******************/
/**************    SLIDER    *******************/
/**************              *******************/
/***********************************************/
/***********************************************/

// Déclaration des constantes et variables //

const AUTOPLAY_DELAY = 3000;
const ARROW_LEFT = "ArrowLeft";
const ARROW_RIGHT = "ArrowRight";
const SPACE = "Space";
let slides;
let state;

// fonctions //

function refreshSlider() {
  const activeSlide = document.querySelector(".active");
  activeSlide.classList.remove("active");
  slides[state.index].classList.add("active");
}

function onSliderGoToNext() {
  state.index++;
  if (state.index == slides.length) {
    state.index = 0;
  }
  refreshSlider();
}

function onSliderGoToPrevious() {
  state.index--;
  if (state.index < 0) {
    state.index = slides.length - 1;
  }
  refreshSlider();
}

function onSliderGoToRandom() {
  let random;
  do {
    random = getRandomInteger(0, slides.length - 1);
  } while (random == state.index);
  state.index = random;
  refreshSlider();
}

function onSliderPlayPause() {
  const playPauseButton = document.querySelector("#play-pause");
  if (state.timer == null) {
    state.timer = window.setInterval(onSliderGoToNext, AUTOPLAY_DELAY);
    playPauseButton.title = "Arreter le diaporama";
  } else {
    window.clearInterval(state.timer);
    state.timer = null;
    playPauseButton.title = "Démarrer le diaporama";
  }
  const icon = document.querySelector("#play-pause i");
  icon.classList.toggle("fa-play");
  icon.classList.toggle("fa-pause");
}

function onSliderKeyDown(event) {
  switch (event.code) {
    case ARROW_RIGHT:
      onSliderGoToNext();
      break;
    case ARROW_LEFT:
      onSliderGoToPrevious();
      break;
    case SPACE:
      event.preventDefault();
      onSliderPlayPause();
      break;
  }
}

// gestionnaire d'évènements //

document.addEventListener("DOMContentLoaded", function () {
  slides = document.querySelectorAll(".slider-figure");
  state = new Object();
  state.index = 0;
  state.timer = null;

  installEventHandler("#prev", "click", onSliderGoToPrevious);
  installEventHandler("#next", "click", onSliderGoToNext);
  installEventHandler("#random", "click", onSliderGoToRandom);
  installEventHandler("#play-pause", "click", onSliderPlayPause);

  document.addEventListener("keydown", onSliderKeyDown);
});

/***************************************************/
/***************************************************/
/**************                  *******************/
/**************   SE CONNECTER   *******************/
/**************                  *******************/
/***************************************************/
/***************************************************/

$(".form")
  .find("input, textarea")
  .on("keyup blur focus", function (e) {
    let $this = $(this),
      label = $this.prev("label");

    if (e.type === "keyup") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.addClass("active highlight");
      }
    } else if (e.type === "blur") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.removeClass("highlight");
      }
    } else if (e.type === "focus") {
      if ($this.val() === "") {
        label.removeClass("highlight");
      } else if ($this.val() !== "") {
        label.addClass("highlight");
      }
    }
  });

$(".tab a").on("click", function (e) {
  e.preventDefault();

  $(this).parent().addClass("active");
  $(this).parent().siblings().removeClass("active");

  let target = $(this).attr("href");

  $(".tab-content > div").not(target).hide();

  $(target).fadeIn(600);
});

/***************************************************/
/***************************************************/
/**************                  *******************/
/**************      ADMIN       *******************/
/**************                  *******************/
/***************************************************/
/***************************************************/

$(".userRole").on("change", function (event) {
  let id = $(this).data("id");
  let value = $(this).val();
  let result = { id: id, value: value };

  $.post(getRequestUrl() + "/admin/role", result, function (res) {
    console.log(res);
  });
});
