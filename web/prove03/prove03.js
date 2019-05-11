function addToCart(action, itemName, price) {
   // fire off the request to /redirect.php
   console.log(`${action}ing ${itemName} at $${price}`);

   $.ajax({
      url: "addToCart.php",
      type: "post",
      data: {
         'action': action,
         'itemName': itemName,
         'price': price
      },
      datatype: 'json'
   }).done((res, textStatus, jqXHR) => {
      // $("#shopping-cart").empty();
      // let array = res;
      console.dir(res);
      
      // $("#shopping-cart").append(res);
   }).fail(function (jqXHR, textStatus, errorThrown) {
      // log the error to the console
      console.error("The following error occured: " + textStatus, errorThrown);
   });
}

// hide the add to cart button
$(".add-to-cart").on("click", e => {
   // e.target = $("p").html("Added").css("class", "added");
   e.target.innerHTML = "Added";
   e.target.classList.add("added");
});

// hide the add to cart button
$(".remove-item").on("click", e => {
   console.log(e.target.parentElement);
   
   e.target.parentElement.parentElement.classList.add("hide");
});