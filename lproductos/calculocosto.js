function calculocosto() {
    //valores 

    var kilo = document.formda.kilo.value;
    var costo = document.formda.costo.value;
    var hermano = document.formda.hermano.value;
    var ganancia_a = document.formda.ganancia_a.value;
    var ganancia_b = document.formda.ganancia_b.value;
    var ganancia_c = document.formda.ganancia_c.value;


    if (<?= $tipo ?> == "0") {
        moned = '1';
    }
    var costototal = eval(costo) + eval(hermano);


    if (<?= $tipo ?> == "0") {
        var precioporka = costototal + eval(ganancia_a);
        var precioporkb = costototal + eval(ganancia_b);
        var precioporkc = costototal + eval(ganancia_c);
    }
    if (<?= $tipo ?> == "1") {
        var precioporka = eval(costototal) * eval(ganancia_a) / 100 + eval(costototal);
        var precioporkb = eval(costototal) * eval(ganancia_b) / 100 + eval(costototal);
        var precioporkc = eval(costototal) * eval(ganancia_c) / 100 + eval(costototal);
    }

    document.formda.costo_total.value = costototal;
    document.formda.precio_kiloa.value = precioporka;
    document.formda.precio_kilob.value = precioporkb;
    document.formda.precio_kiloc.value = precioporkc;


    document.formda.precio_cajaa.value = precioporka * kilo;
    document.formda.precio_cajab.value = precioporkb * kilo;
    document.formda.precio_cajac.value = precioporkc * kilo;



}