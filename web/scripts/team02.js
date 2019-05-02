document.getElementById("click-me").addEventListener("click", e => {
    alert("Clicked!");
});

document.getElementById("change-color").addEventListener("click", e => {
    const color = document.getElementById("new-color").value;
    document.getElementById("first-div").style.backgroundColor = color;
});