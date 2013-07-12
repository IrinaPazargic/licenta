function highlightCurrentElement(buttonsArray, target) {
    $.each(buttonsArray, function(index, value) {
        if (value[0].id == target[0].id) {
            $(value[0]).css('backgroundColor', '#009933');
        } else {
            $(value[0]).css('backgroundColor', '#B0B0B0  ');
        }
    });
}

function showHiddenElement(divsArray, divVisible, divHidden, divToShow) {
    $.each(divsArray, function(index, div) {
        if (div[0].id == divToShow[0].id) {
            $(divVisible[0]).append(div[0]);
        } else {
            $(divHidden[0]).append(div[0]);
        }
    });
}
