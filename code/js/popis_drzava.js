$(document).ready(function() {
    var page = 1;
    $.ajax({
        url: "api/popis_drzava.api.php",
        method: "GET",
        success: function(json) {
            $(json).each(function() {
                let moderators = this["moderators"].map(moderator => moderator + "<br>").join("");
                $("#countries-body").append(
                    "<tr class='main__table-row'>" +
                        "<td class='main__table-data'>" + this["country_id"] + "</td>" +
                        "<td class='main__table-data'>" + this["country"] + "</td>" +
                        "<td class='main__table-data'>" + this["label"] + "</td>" +
                        "<td class='main__table-data'>" + this["continent"] + "</td>" +
                        "<td class='main__table-data'>" + moderators + "</td>" +
                        "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                        "<td class='main__table-data'><button class='button__primary'>Dodaj moderatora</button></td>" +
                    "</tr>"
                );
            })
        }
    }).done(function() {
        $("#countries-body").find("tr").each(function() {
            $(this).find("td:eq(5)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("obrasci/dodaj_drzavu.php?countryid=" + id);
            });

            $(this).find("td:eq(6)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("obrasci/dodaj_moderatora.php?countryid=" + id);
            });
        });
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/popis_drzava.api.php",
            success: function(json) {
                $("#countries-body").empty();
                $(json).each(function() {
                    let moderators = this["moderators"].map(moderator => moderator + "<br>").join("");
                    $("#countries-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["country_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "<td class='main__table-data'>" + this["label"] + "</td>" +
                            "<td class='main__table-data'>" + this["continent"] + "</td>" +
                            "<td class='main__table-data'>" + moderators + "</td>" +
                            "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                            "<td class='main__table-data'><button class='button__primary'>Dodaj moderatora</button></td>" +
                        "</tr>"
                    );
                });
            }
        }).done(function() {
            page = 1;
            $("#countries-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_drzavu.php?countryid=" + id);
                });
    
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_moderatora.php?countryid=" + id);
                });
            });
        });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/popis_drzava.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#countries-body").empty();
                    $(json).each(function() {
                        let moderators = this["moderators"].map(moderator => moderator + "<br>").join("");
                        $("#countries-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["country_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                                "<td class='main__table-data'>" + this["label"] + "</td>" +
                                "<td class='main__table-data'>" + this["continent"] + "</td>" +
                                "<td class='main__table-data'>" + moderators + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Dodaj moderatora</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page--;
            $("#countries-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_drzavu.php?countryid=" + id);
                });
    
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_moderatora.php?countryid=" + id);
                });
            });
        });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/popis_drzava.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#countries-body").empty();
                    $(json).each(function() {
                        let moderators = this["moderators"].map(moderator => moderator + "<br>").join("");
                        $("#countries-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["country_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                                "<td class='main__table-data'>" + this["label"] + "</td>" +
                                "<td class='main__table-data'>" + this["continent"] + "</td>" +
                                "<td class='main__table-data'>" + moderators + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Dodaj moderatora</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page++
            $("#countries-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_drzavu.php?countryid=" + id);
                });
    
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_moderatora.php?countryid=" + id);
                });
            });
        });
    });
});