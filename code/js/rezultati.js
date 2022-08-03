$(document).ready(function() {
    var pageResults = 1;
    $.ajax({
        url: "api/rezultati.api.php",
        method: "GET",
        success: function(json) {
            if (!$(json)[0]["invalidParameters"]) {
                $(json).each(function() {
                    $("#results-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["place"] + "</td>" +
                            "<td class='main__table-data'>" + this["username"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["time"] + "</td>" +
                            "<td class='main__table-data'>" + this["points"] + "</td>" +
                            "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                        "</tr>"
                    );
                });
            }
        }
    });

    $("#btn-first-results").click(function() {
        $.ajax({
            url: "api/rezultati.api.php",
            success: function(json) {
                $("#results-body").empty();
                if (!$(json)[0]["invalidParameters"]) {
                    $(json).each(function() {
                        $("#results-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["time"] + "</td>" +
                                "<td class='main__table-data'>" + this["points"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { pageResults = 1; });
    });

    $("#btn-prev-results").click(function() {
        $.ajax({
            url: "api/rezultati.api.php",
            data: {"page": pageResults-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#results-body").empty();
                    $(json).each(function() {
                        $("#results-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["time"] + "</td>" +
                                "<td class='main__table-data'>" + this["points"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { pageResults--; });
    });

    $("#btn-next-results").click(function() {
        $.ajax({
            url: "api/rezultati.api.php",
            data: {"page": pageResults+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#results-body").empty();
                    $(json).each(function() {
                        $("#results-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["place"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["time"] + "</td>" +
                                "<td class='main__table-data'>" + this["points"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() { pageResults++ });
    });
});