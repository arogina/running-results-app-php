$(document).ready(function() {
    var page = 1;
    var sort = "none";

    $("#sort-btn").click(function() {
        sort = $("#sort").val();
        $.ajax({
            url: "api/galerija_slika.api.php",
            method: "GET",
            data: { "sort": sort },
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#winners-body").empty();
                    $(json).each(function() {
                        $("#winners-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='200'></td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["surname"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        });
    });

    $.ajax({
        url: "api/galerija_slika.api.php",
        method: "GET",
        data: { "sort": sort },
        success: function(json) {
            if (!$(json)[0]["invalidParameters"]) {
                $(json).each(function() {
                    $("#winners-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'><img src='" + this["picture"] + "' width='200'></td>" +
                            "<td class='main__table-data'>" + this["name"] + "</td>" +
                            "<td class='main__table-data'>" + this["surname"] + "</td>" +
                            "<td class='main__table-data'>" + this["stage"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["country"] + "</td>" +
                        "</tr>"
                    );
                });
            }
        }
    });

    $("#btn-first-winners").click(function() {
        $.ajax({
            url: "api/galerija_slika.api.php",
            method: "GET",
            data: { "sort": sort },
            success: function(json) {
                $("#winners-body").empty();
                if (!$(json)[0]["invalidParameters"]) {
                    $(json).each(function() {
                        $("#winners-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='200'></td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["surname"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page = 1; });
    });

    $("#btn-prev-winners").click(function() {
        $.ajax({
            url: "api/galerija_slika.api.php",
            method: "GET",
            data: { "sort": sort, "page": page-1 },
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#winners-body").empty();
                    $(json).each(function() {
                        $("#winners-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='200'></td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["surname"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page--; });
    });

    $("#btn-next-winners").click(function() {
        $.ajax({
            url: "api/galerija_slika.api.php",
            method: "GET",
            data: { "sort": sort, "page": page+1 },
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#winners-body").empty();
                    $(json).each(function() {
                        $("#winners-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='200'></td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["surname"] + "</td>" +
                                "<td class='main__table-data'>" + this["stage"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { page++ });
    });
});