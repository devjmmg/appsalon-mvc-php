function iniciarApp(){filtrarFecha()}async function filtrarFecha(){document.querySelector("#fecha").addEventListener("change",(function(e){if(""===e.target.value){const e=(new Date).toISOString().split("T")[0];window.location=`?fecha=${e}`}else window.location=`?fecha=${e.target.value}`}))}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));