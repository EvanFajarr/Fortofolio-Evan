const txtElement = ["Hi, everyone!,my full name is Evan Fajar Krisdiyanto, you can call me Evan. I live in Bantul.I really like music and watch anime. Besides that, I am also interested in Programing. ", ""];
let count = 0;
let txtIndex = 0;
let currentTxt = "";
let words = "";
(function ngetik() {
    if (count == txtElement.length) {
        count = 0;
    }

    currentTxt = txtElement[count];

    words = currentTxt.slice(0, ++txtIndex);
    document.querySelector(".efek").textContent = words;

    setTimeout(ngetik, 50);
})();