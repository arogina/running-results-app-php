$(document).ready(function() {
    var page = 1;
    $.ajax({
        url: "api/buduce_utrke.api.php",
        method: "GET",
        success: function(json) {
            $(json).each(function() {
                $("#races-body").append(
                    "<tr class='main__table-row'>" +
                        "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                        "<td class='main__table-data'>" + this["race"] + "</td>" +
                        "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                        "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                        "<td class='main__table-data'>" + this["country"] + "</td>" +
                    "</tr>"
                );
            })
        }
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/buduce_utrke.api.php",
            success: function(json) {
                $("#races-body").empty();
                $(json).each(function() {
                    $("#races-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                            "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                            "<td class='main__table-data'>" + this["country"] + "</td>" +
                        "</tr>"
                    );
                });
            }
        }).done(function() {page = 1;});
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/buduce_utrke.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {page--;});
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/buduce_utrke.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {page++});
    });
});