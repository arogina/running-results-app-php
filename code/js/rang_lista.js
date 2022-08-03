$(document).ready(function() {
    var page = 1;

    $.ajax({
        url: "api/rang_lista.api.php",
        method: "GET",
        success: function(json) {
            if (!$(json)[0]["invalidParameters"]) {
                $(json).each(function() {
                    $("#rang-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["place"] + "</td>" +
                            "<td class='main__table-data'>" + this["stage_num"] + "</td>" +
                            "<td class='main__table-data'>" + this["username"] + "</td>" +
                        "</tr>"
                    );
                });
            }
        }
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/rang_lista.api.php",
            success: function(json) {
                $("#rang-body").empty();
                if (!$(json)[0]["invalidParameters"]) {
                    $(json).each(function() {
                        $("#rang-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage_num"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page = 1; });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/rang_lista.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#rang-body").empty();
                    $(json).each(function() {
                        $("#rang-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage_num"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page--; });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/rang_lista.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#rang-body").empty();
                    $(json).each(function() {
                        $("#rang-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage_num"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page++ });
    });
});