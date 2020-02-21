$("#addToCart").click(
    function() {
      
      var productId = $("#productId").html();
      var quantity = $("#productQuan").val();
      var cartData = { productId:productId, quantity:quantity };
      $.ajax({
          url: "/cybercom/ecommerce/Public/Cart/addCart",
          method:"POST",
          data: { cartData },
          success: function(data) {
            alert("Added to Cart");
            console.log(data);
          }
      });
    }
);