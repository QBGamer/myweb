function showCart() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("cart-data-block").innerHTML = this.responseText;
        $('.cart-btn').click(function(){
            console.log('debug');
            controlCart(this.dataset.type,this.dataset.id);
        });
        }
    };
    xmlhttp.open("GET","./handle/cart/handle_cart.php",true);
    xmlhttp.send();
}
// function controlCart(type,id){
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//         document.getElementById("cart-data-block").innerHTML = this.responseText;
//         }
//     };
//     xmlhttp.open("GET","./handle/cart/handle_cart.php?type="+type+"$id="+id,true);
//     xmlhttp.send();
// }