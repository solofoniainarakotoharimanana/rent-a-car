/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";
import "./styles/home.css";
import "./styles/login.css";
import "./styles/cars.css";

import "bootstrap/dist/css/bootstrap.min.css";
import "@fortawesome/fontawesome-free/css/all.css";

import "select2"; // globally assign select2 fn to $ element
import "select2/dist/css/select2.css";

import $ from "jquery";

/*require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');*/

import * as bootstrap from "bootstrap";

$(() => {
  $(".select2-category").select2({
    placeholder: "Choisir une ou plusieurs catégorie",
    allowClear: true
  });
  $(".select2-brand").select2({
    placeholder: "Choisir une ou plusieurs marque de voiture",
    allowClear: true
  });
});
