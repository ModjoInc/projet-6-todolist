//exercice 1
var nbr_efts = 4;
var nom_femme = "Rada";
var pays= "Puerto Rico";
var metier = "webdeveloper";

console.log("Vous serez " + metier + " et habiterez à " + pays + ", marié à " + nom_femme + " avec " + nbr_efts + " enfants" );

// exercice 2
var an = "2017";
var naissance = "1956"; // const ="1956";

console.log(an - naissance);

// exercice 3
var age = "45";
var age_max = "110";
var alim = "pomme";
var consom = "2";
var jours = "360";

var rest = age_max - age;
var consom_total = rest * jours * consom;

console.log( "Il vous reste " + consom_total + " " + alim + "s avant d'atteindre l'âge de " + age_max + " ans");

//exercice 4
var result = (1 + 2) * 3 + 4 / 2;
var part1 = 1 + 2;
var part2 = part1 * 3;
var part3 = 4 / 2;
var part4 = part2 + part3;

console.log("etape 1 : 1+2 = " + part1);
console.log("etape 2 : etape1 * 3 = " + part2);
console.log("etape 3 : 4/2 = " + part3);
console.log("etape 4 : (etape 2 + etape 3) = " + part4);
console.log("résultat : " + result);
