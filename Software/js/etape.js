$(document).ready(function() {
    var page = 1;
    $.ajax({
        url: "api/etape.api.php",
        method: "GET",
        success: function(json) {
            $(json).each(function() {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#stages-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["stage_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["name"] + "</td>" +
                            "<td class='main__table-data'>" + this["start_time"] + "</td>" +
                            "<td class='main__table-data'>" + this["closed"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                            "<td class='main__table-data'><button class='button__primary'>Pregledaj natjecatelje</button></td>" +
                        "</tr>"
                    );
                }
            })
        }
    }).done(function() {
        $("#stages-body").find("tr").each(function() {
            $(this).find("td:eq(5)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("obrasci/dodaj_etapu.php?stageid=" + id);
            });

            $(this).find("td:eq(6)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("prijavljeni_korisnici.php?stageid=" + id);
            });
        });
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/etape.api.php",
            success: function(json) {
                $("#stages-body").empty();
                $(json).each(function() {
                    if (!$(json)[0]["invalidParameters"]) {
                        $("#stages-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["stage_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["start_time"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Pregledaj natjecatelje</button></td>" +
                            "</tr>"
                        );
                    }
                });
            }
        }).done(function() {
            page = 1;
            $("#stages-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_etapu.php?stageid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("prijavljeni_korisnici.php?stageid=" + id);
                });
            });
        });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/etape.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#stages-body").empty();
                    $(json).each(function() {
                        $("#stages-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["stage_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["start_time"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Pregledaj natjecatelje</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page--;
            $("#stages-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_etapu.php?stageid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("prijavljeni_korisnici.php?stageid=" + id);
                });
            });
        });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/etape.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#stages-body").empty();
                    $(json).each(function() {
                        $("#stages-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["stage_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["name"] + "</td>" +
                                "<td class='main__table-data'>" + this["start_time"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Pregledaj natjecatelje</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page++
            $("#stages-body").find("tr").each(function() {
                $(this).find("td:eq(5)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_etapu.php?stageid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("prijavljeni_korisnici.php?stageid=" + id);
                });
            });
        });
    });
});