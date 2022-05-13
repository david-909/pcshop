$(document).ready(function () {
    /* var a . , =[]'';
    console.log(a); */
    /*  alert("ee"); */

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", "#addToCart", function (e) {
        var product_id = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: "/cart",
            data: {
                product_id: product_id,
            },
            dataType: "json",
            success: function (response) {
                if (response == 0) {
                    $.toast({
                        heading: "Error",
                        text: "An error occured",
                        showHideTransition: "slide",
                        icon: "error",
                    });
                } else {
                    $.toast({
                        heading: "Success",
                        text: "Added to cart",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                }
            },
        });
    });

    /* $("#filterButton").on("click", function (e) {

        var data = { brands: [], values: [] };
        selected = $("input[type='checkbox']:checked").value;
        console.log(selected);
        var keys = [];
        var values = [];
        for (let i = 0; i < selected.length; i++) {
            keys.push(selected[i].getAttribute("name"));
            values.push(selected[i].value);
        }

        let filters = keys.reduce((o, c, i) => {
            o[c] = o[c] ? o[c] + ", " + values[i] : values[i];
            return o;
        }, {});
        console.log(filters);
        console.log(Object.keys(selected));

    }); */
    $(document).on("change", ".quantityCart", function (e) {
        e.preventDefault();
        var cartId = $(this).attr("data-id");
        var quantity = $(this).val();
        $.ajax({
            type: "PUT",
            url: "/cart",
            data: {
                cart_id: cartId,
                quantity: quantity,
            },
            dataType: "json",
            success: function (response) {
                //console.log(response[0][0]);
                let pricesText = $(".itemPrice");
                $("#totalPrice").text("$" + response[1]);
                for (let i = 0; i < pricesText.length; i++) {
                    pricesText[i].innerHTML = "$" + response[0][i].price;
                }
            },
        });
    });
    $(document).on("click", ".removeCart", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        console.log(id);
        $.ajax({
            type: "DELETE",
            url: "/cart",
            data: {
                cart_id: id,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response) {
                    $("#cartBody").html(response);
                    $.ajax({
                        type: "GET",
                        url: "/getTotalPrice",
                        success: function (response) {
                            $("#totalPrice").html("$" + response);
                        },
                    });
                    $.toast({
                        heading: "Success",
                        text: "Removed from cart",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                } else if (response == 0) {
                    $.toast({
                        heading: "Error",
                        text: "An error occured",
                        showHideTransition: "slide",
                        icon: "error",
                    });
                }
            },
        });
    });

    $(".addToWishlist").on("click", function (e) {
        e.preventDefault();

        var productId = $(this).attr("data-id");
        var userId = $(this).attr("data-user");
        $.ajax({
            type: "POST",
            url: "/wishlist/" + productId,
            data: { productId, userId },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response == 1) {
                    $.toast({
                        heading: "Success",
                        text: "Successfully added to wishlist",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                } else if (response == 0) {
                    $.toast({
                        heading: "Error",
                        text: "Product is already in wishlist",
                        showHideTransition: "slide",
                        icon: "error",
                    });
                }
            },
        });
    });
    $(document).on("click", "#postReview", function (e) {
        e.preventDefault();
        var review = $("#reviewArea").val();
        var rating = $("input[name='rating']:checked").val();
        var productId = $("#productId").val();

        if (review != "" && rating != undefined) {
            $.ajax({
                type: "POST",
                url: "/postreview",
                data: {
                    productId: productId,
                    review: review,
                    rating: rating,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $.toast({
                        heading: "Success",
                        text: "Successfully posted a review",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                    var reviewDate = response.date["date"];
                    reviewDate = reviewDate.split("-");
                    var newDate =
                        reviewDate[2].substring(0, 2) +
                        "-" +
                        reviewDate[1] +
                        "-" +
                        reviewDate[0];
                    var output = `<li>
                                <div class="review-heading">
                                  <h6 class="name">${response.name} ${response.surname}</h6>
                                  <p class="date">${newDate}</p>`;
                    if (response.mark_id == 1) {
                        output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                    }
                    if (response.mark_id == 2) {
                        output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                    }
                    if (response.mark_id == 3) {
                        output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                    }
                    if (response.mark_id == 4) {
                        output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                    }
                    if (response.mark_id == 5) {
                        output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>`;
                    }
                    output += `</div>
                        <div class="review-body">
                            <p>${response.review}
                            </p>
                        </div>
                    </li>`;
                    $("#reviewsul").append(output);

                    /* var output = "";
                    response.forEach((r) => {
                        var reviewDate = r.date["date"];
                        reviewDate = reviewDate.split("-");

                        var newDate =
                            reviewDate[2].substring(0, 2) +
                            "-" +
                            reviewDate[1] +
                            "-" +
                            reviewDate[0];
                        output += `<li>
                    <div class="review-heading">
                        <h6 class="name">
                            ${r.name} ${r.surname}</h6>
                        <p class="date">
                            ${newDate}</p>`;
                        if (r.mark_id == 1) {
                            output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                        }
                        else if (r.mark_id == 2) {
                            output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                        }
                        else if (r.mark_id == 3) {
                            output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                        }
                        else if (r.mark_id == 4) {
                            output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>`;
                        }
                        else if (r.mark_id == 5) {
                            output += `<div class="review-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>`;
                        }

                        output += `
                        <div class="review-body">
                            <p>${r.review}
                            </p>
                        </div>
                    </li>`;
                    });
                    $("#reviewsul").html(output); */
                },
            });
        } else {
            $("#errorReview").html("You need to fill out the whole form");
        }
    });
});
