/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function modal() {

    var html = getElementsByTagname("html")[0];
    var capaModal = getElementsByClassName("modal-reposo");
    for (i = 0; i < capaModal.length; i++) {

        function ventModal(i) {
            capaModal[i].addEventListener("click", function () {

                var infoModal = this.getElementsByClassName("info-modal-reposo")[0];
                var altoVent = html.offsetHeight;
                var body = document.getElementsByTagName("body")[0];
                var cerrar = this.getElementsByClassName("alin-dcha")[0];
                this.style.height = altoVent + "px";
                this.style.top = html.scrollTop + "px";
                this.classList.remove("modal-reposo");
                this.classList.add("modal-activo");
                infoModal.classList.remove("info-modal-reposo");
                infoModal.classList.add("info-modal-activo");

                body.style.overflow = "hidden";
                html.onkeypress = function () {
                    return false
                };
                cerrar.onclick = function () {
                    location.reload()
                }


            });

        }
        ventModal(i);
    }//fin del for

}



