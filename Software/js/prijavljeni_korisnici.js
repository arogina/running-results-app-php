$(document).ready(function() {
    var page = 1;
    $.ajax({
        url: "api/prijavljeni_korisnici.api.php",
        method: "GET",
        success: function(json) {
            if (!$(json)[0]["invalidParameters"]) {
                $(json).each(function() {
                    $("#competitors-body").append(
                        "<tr class='main__table-row'>" +
                            "<td class='main__table-data'>" + this["user_id"] + "</td>" +
                            "<td class='main__table-data'>" + this["username"] + "</td>" +
                            "<td class='main__table-data'>" + this["race"] + "</td>" +
                            "<td class='main__table-data'>" + this["signed_date"] + "</td>" +
                            "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                            "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                            "<td class='main__table-data'><button class='button__primary'>Evidentiraj vrijeme</button></td>" +
                        "</tr>"
                    );
                });
            }
        }
    }).done(function() {
        $("#competitors-body").find("tr").each(function() {
            $(this).find("td:eq(6)").children("button").click(function() {
                let id = $(this).parent().parent().find("td:eq(0)").text();
                let answer = prompt("Unesite vrijeme (hh:mm:ss) ili '0' ukoliko je korisnik odustao: ", "00:00:00");
                if (answer) {
                    if (answer == 0) {
                        $.ajax({
                            url: "api/evidentiraj_vrijeme.api.php",
                            method: "POST",
                            data: { "userid": id, "time": answer, "finished": 0 },
                            success: function(json) {
                                if ($(json)[0]["resultSaved"]) {
                                    alert("Vrijeme je uspješno spremljeno!");
                                } else if ($(json)[0]["closedStage"]) {
                                    alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                } else {
                                    alert("Pogreška prilikom spremanja vremena!");
                                }
                            }
                        });
                    } else {
                        let regex = /^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/;
                        if (!regex.test(answer)) {
                            alert("Pogrešan format vremena!");
                        } else {
                            $.ajax({
                                url: "api/evidentiraj_vrijeme.api.php",
                                method: "POST",
                                data: { "userid": id, "time": answer, "finished": 1 },
                                success: function(json) {
                                    if ($(json)[0]["resultSaved"]) {
                                        alert("Vrijeme je uspješno spremljeno!");
                                    } else if ($(json)[0]["closedStage"]) {
                                        alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                    } else {
                                        alert("Pogreška prilikom spremanja vremena!");
                                    }
                                }
                            });
                        }
                    }
                }
            });
        });
    });

    $("#btn-first").click(function() {
        $.ajax({
            url: "api/prijavljeni_korisnici.api.php",
            success: function(json) {
                $("#competitors-body").empty();
                if (!$(json)[0]["invalidParameters"]) {
                    $(json).each(function() {
                        $("#competitors-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["user_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["signed_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Evidentiraj vrijeme</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page = 1;
            $("#competitors-body").find("tr").each(function() {
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    let answer = prompt("Unesite vrijeme (hh:mm:ss) ili '0' ukoliko je korisnik odustao: ", "00:00:00");
                    if (answer) {
                        if (answer == 0) {
                            $.ajax({
                                url: "api/evidentiraj_vrijeme.api.php",
                                method: "POST",
                                data: { "userid": id, "time": answer, "finished": 0 },
                                success: function(json) {
                                    if ($(json)[0]["resultSaved"]) {
                                        alert("Vrijeme je uspješno spremljeno!");
                                    } else if ($(json)[0]["closedStage"]) {
                                        alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                    } else {
                                        alert("Pogreška prilikom spremanja vremena!");
                                    }
                                }
                            });
                        } else {
                            let regex = /^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/;
                            if (!regex.test(answer)) {
                                alert("Pogrešan format vremena!");
                            } else {
                                $.ajax({
                                    url: "api/evidentiraj_vrijeme.api.php",
                                    method: "POST",
                                    data: { "userid": id, "time": answer, "finished": 1 },
                                    success: function(json) {
                                        if ($(json)[0]["resultSaved"]) {
                                            alert("Vrijeme je uspješno spremljeno!");
                                        } else if ($(json)[0]["closedStage"]) {
                                            alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                        } else {
                                            alert("Pogreška prilikom spremanja vremena!");
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            });
        });
    });

    $("#btn-prev").click(function() {
        $.ajax({
            url: "api/prijavljeni_korisnici.api.php",
            data: {"page": page-1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#competitors-body").empty();
                    $(json).each(function() {
                        $("#competitors-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["user_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["signed_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Evidentiraj vrijeme</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page--;
            $("#competitors-body").find("tr").each(function() {
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    let answer = prompt("Unesite vrijeme (hh:mm:ss) ili '0' ukoliko je korisnik odustao: ", "00:00:00");
                    if (answer) {
                        if (answer == 0) {
                            $.ajax({
                                url: "api/evidentiraj_vrijeme.api.php",
                                method: "POST",
                                data: { "userid": id, "time": answer, "finished": 0 },
                                success: function(json) {
                                    if ($(json)[0]["resultSaved"]) {
                                        alert("Vrijeme je uspješno spremljeno!");
                                    } else if ($(json)[0]["closedStage"]) {
                                        alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                    } else {
                                        alert("Pogreška prilikom spremanja vremena!");
                                    }
                                }
                            });
                        } else {
                            let regex = /^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/;
                            if (!regex.test(answer)) {
                                alert("Pogrešan format vremena!");
                            } else {
                                $.ajax({
                                    url: "api/evidentiraj_vrijeme.api.php",
                                    method: "POST",
                                    data: { "userid": id, "time": answer, "finished": 1 },
                                    success: function(json) {
                                        if ($(json)[0]["resultSaved"]) {
                                            alert("Vrijeme je uspješno spremljeno!");
                                        } else if ($(json)[0]["closedStage"]) {
                                            alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                        } else {
                                            alert("Pogreška prilikom spremanja vremena!");
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            });
        });
    });

    $("#btn-next").click(function() {
        $.ajax({
            url: "api/prijavljeni_korisnici.api.php",
            data: {"page": page+1},
            success: function(json) {
                if (!$(json)[0]["invalidParameters"]) {
                    $("#competitors-body").empty();
                    $(json).each(function() {
                        $("#competitors-body").append(
                            "<tr class='main__table-row'>" +
                                "<td class='main__table-data'>" + this["user_id"] + "</td>" +
                                "<td class='main__table-data'>" + this["username"] + "</td>" +
                                "<td class='main__table-data'>" + this["race"] + "</td>" +
                                "<td class='main__table-data'>" + this["signed_date"] + "</td>" +
                                "<td class='main__table-data'>" + this["birth_date"] + "</td>" +
                                "<td class='main__table-data'><img src='" + this["picture"] + "' width='100'></td>" +
                                "<td class='main__table-data'><button class='button__primary'>Evidentiraj vrijeme</button></td>" +
                            "</tr>"
                        );
                    });
                }
            }
        }).done(function() {
            page++
            $("#competitors-body").find("tr").each(function() {
                $(this).find("td:eq(6)").children("button").click(function() {
                    let id = $(this).parent().parent().find("td:eq(0)").text();
                    let answer = prompt("Unesite vrijeme (hh:mm:ss) ili '0' ukoliko je korisnik odustao: ", "00:00:00");
                    if (answer) {
                        if (answer == 0) {
                            $.ajax({
                                url: "api/evidentiraj_vrijeme.api.php",
                                method: "POST",
                                data: { "userid": id, "time": answer, "finished": 0 },
                                success: function(json) {
                                    if ($(json)[0]["resultSaved"]) {
                                        alert("Vrijeme je uspješno spremljeno!");
                                    } else if ($(json)[0]["closedStage"]) {
                                        alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                    } else {
                                        alert("Pogreška prilikom spremanja vremena!");
                                    }
                                }
                            });
                        } else {
                            let regex = /^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/;
                            if (!regex.test(answer)) {
                                alert("Pogrešan format vremena!");
                            } else {
                                $.ajax({
                                    url: "api/evidentiraj_vrijeme.api.php",
                                    method: "POST",
                                    data: { "userid": id, "time": answer, "finished": 1 },
                                    success: function(json) {
                                        if ($(json)[0]["resultSaved"]) {
                                            alert("Vrijeme je uspješno spremljeno!");
                                        } else if ($(json)[0]["closedStage"]) {
                                            alert("Etapa je zatvorena, stoga nije više moguće evidentirati vrijeme!");
                                        } else {
                                            alert("Pogreška prilikom spremanja vremena!");
                                        }
                                    }
                                });
                            }
                        }
                    }
                });
            });
        });
    });

    $("#close-stage").click(function() {
        if(confirm("Jeste li sigurni da želite zaključati etapu?")) {
            $.ajax({
                url: "api/zakljucaj_etapu.api.php",
                success: function(json) {
                    if ($(json)[0]["updated"]) {
                        alert("Uspješno ste zaključali etapu!");
                        window.location.reload();
                    } else alert("Etapu nije moguće zaključati jer još postoje natjecatelji koji nisu završili etapu!");
                }
            });
        }
    });
});