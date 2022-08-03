$(document).ready(function () {
    $("body").on("click", "#submit", function () {
        document.getElementById("c4_smbl").style.color = "green";
        document.getElementById("c5_smbl").style.color = "red";
        console.log("DIKLIK");
    });
});
