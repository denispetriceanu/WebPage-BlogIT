var allText = "";
var styleToSet = "";
var color = "";

function getAllText() {
    allText = document.getElementById("textArea1").value;
}

function getSelectedText() {
    getAllText();
    var txtArea = document.getElementById("textArea1");
    var selectedText;
    if (txtArea.selectionStart != undefined) {
        var startPosition = txtArea.selectionStart;
        var endPosition = txtArea.selectionEnd;
        selectedText = txtArea.value.substring(startPosition, endPosition);
    }
    console.log(color + " asta " + styleToSet)
    if (styleToSet == "" && color == "") {
        return;
    } else {
        if (styleToSet != "") {
            textGood = "<" + styleToSet + ">" + selectedText + "</" + styleToSet + ">";
            allText = allText.replace(selectedText, textGood);
            txtArea.value = allText;
            styleToSet = "";
        } else {
            textGood = "<span style='color:" + color + "'>" + selectedText + "</span>";
            allText = allText.replace(selectedText, textGood);
            txtArea.value = allText;
            color = "";
        }

    }
}

function cleanTextArea() {
    document.getElementById('textArea1').value = "";
}

function selectStyle(stil) {
    styleToSet = stil;
}

function getColor() {
    color = document.getElementById('colorpicker').value;
    console.log(color + " asta");
}


function setText(){
    text = document.getElementById('textArea1').value;
    document.getElementById('whereToShow').innerHTML = text;
}