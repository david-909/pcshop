$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".categoryFiltersButton", function (e) {
        var categoryId = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "/adminpanel/getcategoryfilters",
            data: {
                categoryId: categoryId,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                let output = `
                <div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Categories</span><span class="pull-right pointer" id="close-btnCategories">X</span>
                    <p><a class="text-right pointer" href="{{ route('createcategory') }}">Add</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Filters
                                </th>

                                <th>
                                    Delete
                                </th>
                                <th>

                                </th>


                            </thead>
                            <tbody>`;
                response.forEach((r) => {
                    output += `<tr>
                        <td>${r.filter}</td>
                        <td><button data-categoryid=${r.category_id} data-filterid="${r.filter_id}" class="btn btn-danger deleteCategoryFilter">Delete</button></td>
                    </tr>`;
                });

                output += "</tbody></table></div></div>";
                $("#originalCategories").addClass("none");
                $("#categoryFilters").html(output);
            },
        });
    });
    $(document).on("click", ".deleteCategoryFilter", function (e) {
        e.preventDefault();
        var category_id = $(this).attr("data-categoryid");
        var filter_id = $(this).attr("data-filterid");
        $.ajax({
            type: "DELETE",
            url: "/adminpanel/deletecategoryfilter",
            data: {
                category_id: category_id,
                filter_id: filter_id,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
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
                        text: "Successfully deleted",
                        showHideTransition: "slide",
                        icon: "success",
                    });
                    let output = `
                <div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Categories</span><span class="pull-right pointer" id="close-btnCategories">X</span>
                    <p><a class="text-right pointer" href="{{ route('createcategory') }}">Add</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Filters
                                </th>

                                <th>
                                    Delete
                                </th>
                                <th>

                                </th>


                            </thead>
                            <tbody>`;
                    response.forEach((r) => {
                        output += `<tr>
                        <td>${r.filter}</td>
                        <td><button data-categoryid=${r.category_id} data-filterid="${r.filter_id}" class="btn btn-danger deleteCategoryFilter">Delete</button></td>
                    </tr>`;
                    });
                    $("#categoryFilters").html(output);
                }
            },
        });
    });
    $(document).on("click", "#close-btnCategories", function (e) {
        e.preventDefault();
        $("#originalCategories").removeClass("none");
        $("#categoryFilters").html("");
    });
    $(document).on("click", ".filterValuesButton", function (e) {
        e.preventDefault();
        var filterId = $(this).attr("data-id");
        console.log(filterId);
        $.ajax({
            type: "GET",
            url: "/adminpanel/getfiltervalues",
            data: { id: filterId },
            dataType: "json",
            success: function (response) {
                console.log(response);
                let output = `<div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Filters</span><span class="pull-right pointer" id="close-btn">X</span>

                </div>
                <div class="card-body"><div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            Filter
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </thead>
                    <tbody>`;
                response.forEach((r) => {
                    output += `<tr>
                        <td>${r.filter_value}</td>
                        <td><button data-id=${r.id} class="btn btn-warning editFilterValue">Edit</button></td>
                        <td><button data-id=${r.id} data-filterid="${r.filter_id}" class="btn btn-danger deleteFilterValue">Delete</button></td>
                    </tr>`;
                });
                output += "</tbody></table></div></div>";
                $("#originalFilters").addClass("none");
                $("#filterValues").html(output);
            },
        });
    });
    $(document).on("click", "#close-btn", function (e) {
        e.preventDefault();
        $("#originalFilters").removeClass("none");
        $("#filterValues").html("");
    });
    $(document).on("click", ".editFilterValue", function (e) {
        e.preventDefault();
        var currentValue = $(this).parent().prev().text();
        var id = $(this).attr("data-id");

        $(this)
            .parent()
            .prev()
            .html(
                `<div class="d-inline"><input type='text' data-id="${id}" class="inputText" value='${currentValue}'><button class="updateFilterValue btn btn-success pull-right">Update</button></div>`
            );
    });
    $(document).on("change", "#categoryProduct", function (e) {
        var category_id = $(this).val();
        console.log(category_id);
        $.ajax({
            type: "GET",
            url: "/getFilterForCategory",
            data: {
                category_id: category_id,
            },
            dataType: "json",
            success: function (response) {
                let output = "";
                console.log(response);
                response.forEach((r) => {
                    r.values.forEach((e) => {
                        //console.log(e.id, e.filter_value);
                        output += `<div class='col-md-3'><input class="form-check-input" type="checkbox" name="filterValues[]" value="${e.id}"><label class="form-check-label">${e.filter_value}</label></div>`;
                    });
                });
                $("#productFilterValues").html(output);
            },
        });
    });
    $(document).on("click", ".updateFilterValue", function (e) {
        e.preventDefault();
        var id = $(this).prev().attr("data-id");
        var value = $(this).prev().val();
        $.ajax({
            type: "PUT",
            url: "/adminpanel/updatefiltervalue",
            data: {
                id: id,
                value: value,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response == 1) {
                    $.toast({
                        heading: "Success",
                        text: "Successfully updated",
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
    $(document).on("click", ".deleteFilterValue", function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var filter_id = $(this).attr("data-filterid");
        console.log(id);
        $.ajax({
            type: "DELETE",
            url: "/adminpanel/deletefiltervalue",
            data: { id: id, filter_id: filter_id },
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
                        text: "Successfully deleted",
                        showHideTransition: "slide",
                        icon: "success",
                    });

                    let output = `<div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Filters</span><span class="pull-right pointer" id="close-btn">X</span>

                </div>
                <div class="card-body"><div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>
                            Filter
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </thead>
                    <tbody>`;
                    response.forEach((r) => {
                        output += `<tr>
                        <td>${r.filter_value}</td>
                        <td><button data-id=${r.id} class="btn btn-warning editFilterValue">Edit</button></td>
                        <td><button data-id=${r.id} data-filterid="${r.filter_id}" class="btn btn-danger deleteFilterValue">Delete</button></td>
                    </tr>`;
                    });
                    output += "</tbody></table></div></div>";
                    $("#filterValues").html(output);
                }
            },
        });
    });
});
