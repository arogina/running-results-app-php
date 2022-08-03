$(document).ready(function() {
    var page = 1;

    $.ajax({
        url: "api/prijavljene_utrke.api.php",
        method: "GET",
        success: function(json) {
            if (!$(json)[0]["invalidParameters"]) {
                $(json).each(function() {
                    $("#races-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["sign_date"] + "</td>" +
                            "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                            "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                        "</tr>"
                    );
                });
            }
        }
    }).done(function() {
        $("#races-body").find("tr").each(function() {
            $(this).find("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("obrasci/prijava_utrke.php?raceid=" + id);
            });
        });
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/prijavljene_utrke.api.php",
            success: function(json) {
                $("#races-body").empty();
                $(json).each(function() {
                    $("#races-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["sign_date"] + "</td>" +
                            "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                            "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                        "</tr>"
                    );
                });
            }
        }).done(function() {
            page = 1;
            $("#races-body").find("tr").each(function() {
                $(this).find("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/prijava_utrke.php?raceid=" + id);
                });
            });
        });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/prijavljene_utrke.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["sign_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page--;
            $("#races-body").find("tr").each(function() {
                $(this).find("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/prijava_utrke.php?raceid=" + id);
                });
            });
        });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/prijavljene_utrke.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["sign_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page++
            $("#races-body").find("tr").each(function() {
                $(this).find("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/prijava_utrke.php?raceid=" + id);
                });
            });
        });
    });
});