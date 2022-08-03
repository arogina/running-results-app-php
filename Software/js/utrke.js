$(document).ready(function() {
    var page = 1;
    $.ajax({
        url: "api/utrke.api.php",
        method: "GET",
        success: function(json) {
            $(json).each(function() {
                if (!$(json)[0]["invalidParameters"]) {
                    let updateBtn = "";
                    if (this["canUpdate"]) {
                        updateBtn = "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>";
                    }
                    $("#races-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                            "<td class='main__table-data'>" + this["closed"] + "</td>" +
                            "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                            "<td class='main__table-data'>" + this["country"] + "</td>" +
                            "<td class='main__table-data'><button class='button__primary'>Zaključaj utrku</button></td>" +
                            updateBtn +
                        "</tr>"
                    );
                }
            })
        }
    }).done(function() {
        $("#races-body").find("tr").each(function() {
            $(this).find("td:eq(7)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                window.location.replace("obrasci/dodaj_utrku.php?raceid=" + id);
            });

            $(this).find("td:eq(6)").children("button").click(function() {
                if ($(this).parent().parent().find("td:eq(3)").text() === "Završena") {
                    alert("Ova utrka je već zaključana!");
                } else {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    if (confirm("Jeste li sigurni da želite zaključati utrku?")) {
                        $.ajax({
                            url: "api/zakljucaj_utrku.api.php",
                            method: "POST",
                            data: { "raceid": id },
                            success: function(json) {
                                if ($(json)[0]["updated"]) alert("Uspješno ste zaključali utrku!")
                                else alert("Utrku nije moguće zaključati jer još postoje nezavršene etape u njoj!");
                            }
                        });
                    }
                }
            });
        });
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/utrke.api.php",
            success: function(json) {
                $("#races-body").empty();
                $(json).each(function() {
                    if (!$(json)[0]["invalidParameters"]) {
                        let updateBtn = "";
                        if (this["canUpdate"]) {
                            updateBtn = "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>";
                        }
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Zaključaj utrku</button></td>" +
                                updateBtn +
                            "</tr>"
                        );
                    }
                });
            }
        }).done(function() {
            page = 1;
            $("#races-body").find("tr").each(function() {
                $(this).find("td:eq(7)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_utrku.php?raceid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    if ($(this).parent().parent().find("td:eq(3)").text() === "Završena") {
                        alert("Ova utrka je već zaključana!");
                    } else {
                        let id = $(this).parent().parent().find("td:eq(0)").text();
                        if (confirm("Jeste li sigurni da želite zaključati utrku?")) {
                            $.ajax({
                                url: "api/zakljucaj_utrku.api.php",
                                method: "POST",
                                data: { "raceid": id },
                                success: function(json) {
                                    if ($(json)[0]["updated"]) alert("Uspješno ste zaključali utrku!")
                                    else alert("Utrku nije moguće zaključati jer još postoje nezavršene etape u njoj!");
                                }
                            });
                        }
                    }
                });
            });
        });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/utrke.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        let updateBtn = "";
                        if (this["canUpdate"]) {
                            updateBtn = "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>";
                        }
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Zaključaj utrku</button></td>" +
                                updateBtn +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page--;
            $("#races-body").find("tr").each(function() {
                $(this).find("td:eq(7)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_utrku.php?raceid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    if ($(this).parent().parent().find("td:eq(3)").text() === "Završena") {
                        alert("Ova utrka je već zaključana!");
                    } else {
                        let id = $(this).parent().parent().find("td:eq(0)").text();
                        if (confirm("Jeste li sigurni da želite zaključati utrku?")) {
                            $.ajax({
                                url: "api/zakljucaj_utrku.api.php",
                                method: "POST",
                                data: { "raceid": id },
                                success: function(json) {
                                    if ($(json)[0]["updated"]) alert("Uspješno ste zaključali utrku!")
                                    else alert("Utrku nije moguće zaključati jer još postoje nezavršene etape u njoj!");
                                }
                            });
                        }
                    }
                });
            });
        });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/utrke.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#races-body").empty();
                    $(json).each(function() {
                        let updateBtn = "";
                        if (this["canUpdate"]) {
                            updateBtn = "<td class='main__table-data'><button class='button__primary'>Ažuriraj</button></td>";
                        }
                        $("#races-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["race_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["due_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["closed"] + "</td>" +
                                "<td class='main__table-data'>" + this["race_type"] + "</td>" +
                                "<td class='main__table-data'>" + this["country"] + "</td>" +
                                "<td class='main__table-data'><button class='button__primary'>Zaključaj utrku</button></td>" +
                                updateBtn +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page++
            $("#races-body").find("tr").each(function() {
                $(this).find("td:eq(7)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    window.location.replace("obrasci/dodaj_utrku.php?raceid=" + id);
                });

                $(this).find("td:eq(6)").children("button").click(function() {
                    if ($(this).parent().parent().find("td:eq(3)").text() === "Završena") {
                        alert("Ova utrka je već zaključana!");
                    } else {
                        let id = $(this).parent().parent().find("td:eq(0)").text();
                        if (confirm("Jeste li sigurni da želite zaključati utrku?")) {
                            $.ajax({
                                url: "api/zakljucaj_utrku.api.php",
                                method: "POST",
                                data: { "raceid": id },
                                success: function(json) {
                                    if ($(json)[0]["updated"]) alert("Uspješno ste zaključali utrku!")
                                    else alert("Utrku nije moguće zaključati jer još postoje nezavršene etape u njoj!");
                                }
                            });
                        }
                    }
                });
            });
        });
    });
});