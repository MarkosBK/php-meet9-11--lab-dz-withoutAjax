$(".checkboxCountry").click(function () {
    if ($('#adminCountries input:checkbox:checked').length > 0) {
        $("#deleteCountryInfo").css("color", "green");
        $("#deleteCountryInfo").val("Сlick to delete");
        $("#deleteCountry").prop("disabled", false);
    } else {
        $("#deleteCountryInfo").css("color", "orangered");
        $("#deleteCountryInfo").val("Select countries");
        $("#deleteCountry").prop("disabled", true);

    }
});

$(".checkboxCity").click(function () {
    if ($('#adminCities input:checkbox:checked').length > 0) {
        $("#deleteCityInfo").css("color", "green");
        $("#deleteCityInfo").val("Сlick to delete");
        $("#deleteCity").prop("disabled", false);
    } else {
        $("#deleteCityInfo").css("color", "orangered");
        $("#deleteCityInfo").val("Select cities");
        $("#deleteCity").prop("disabled", true);

    }
});

$(".checkboxHotel").click(function () {
    if ($('#adminHotels input:checkbox:checked').length > 0) {
        $("#deleteHotelInfo").css("color", "green");
        $("#deleteHotelInfo").val("Сlick to delete");
        $("#deleteHotel").prop("disabled", false);
    } else {
        $("#deleteHotelInfo").css("color", "orangered");
        $("#deleteHotelInfo").val("Select hotels");
        $("#deleteHotel").prop("disabled", true);

    }
});

$(".checkboxImage").click(function () {
    if ($('#adminImages input:checkbox:checked').length > 0) {
        $("#deleteImageInfo").css("color", "green");
        $("#deleteImageInfo").val("Сlick to delete");
        $("#deleteImage").prop("disabled", false);
    } else {
        $("#deleteImageInfo").css("color", "orangered");
        $("#deleteImageInfo").val("Select images");
        $("#deleteImage").prop("disabled", true);

    }
});

$("#countryHotelSelect").change(function () {
    let sel = $("#divCityHotelSelect").find("select");
    for (let i = 0; i < sel.length; i++) {
        const select = sel[i];
        if (("cityHotelId" + $("#countryHotelSelect").val()) == $(select).attr("name")) {
            $(select).css("visibility", "visible");
            $($(select).find("option")[1]).attr("selected", true);
        } else {
            $(select).css("visibility", "hidden");
            $($(select).find("option")[1]).attr("selected", false);
        }
    }
    $("#divCityHotelSelect").change();

})

$("#divCityHotelSelect").change(function () {
    $("#HotelsList").css("overflow", "auto");
    let sel = $("#HotelsList").find(".hotelsDiv");
    for (let i = 0; i < sel.length; i++) {
        const select = sel[i];
        let citySelector = "#cityHotelSelect" + $("#countryHotelSelect").val()
        if (("hotelsListSelector" + $(citySelector).val()) == $(select).attr("name")) {
            $(select).css("visibility", "visible");
            $(select).css("width", "100%");
            $(select).css("opacity", "1");
        } else {
            $(select).css("visibility", "hidden");
            $(select).css("width", "0");
            $(select).css("opacity", "0");
        }
    }
})


var input = document.getElementById("input__file");
var inputAvatar = document.getElementById("input__file__avatar");


$(input).change(function (e) {
    let submit = document.getElementById("addImage");
    let label = input.nextElementSibling,
        labelVal = label.querySelector('.input__file-button-text').innerText;
    let countFiles = '';
    if (this.files && this.files.length >= 1) {
        countFiles = this.files.length;
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }


    if (countFiles)
        label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
    else
        label.querySelector('.input__file-button-text').innerText = labelVal;
});


$(inputAvatar).change(function (e) {
    let submit = document.getElementById("addAvatar");
    let label = inputAvatar.nextElementSibling,
        labelVal = label.querySelector('.input__file-button-text').innerText;
    let countFiles = '';
    if (this.files && this.files.length >= 1) {
        countFiles = this.files.length;
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }


    if (countFiles)
        label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
    else
        label.querySelector('.input__file-button-text').innerText = labelVal;
});

$("#imagesHotelSelect").change(function () {
    let selDiv = $(".imageBlock");
    $('.inputsImage input:checkbox:checked').prop("checked", false);
    $("#deleteImageInfo").css("color", "orangered");
    $("#deleteImageInfo").val("Select images");
    $("#deleteImage").prop("disabled", true);

    for (let i = 0; i < selDiv.length; i++) {
        const selectDiv = selDiv[i];
        if ($("#imagesHotelSelect").val() == $(selectDiv).attr("id")) {
            $(selectDiv).css("visibility", "visible");
            $(selectDiv).css("opacity", "1");
        } else {
            $(selectDiv).css("visibility", "hidden");
            $(selectDiv).css("opacity", "0");
        }
    }

})