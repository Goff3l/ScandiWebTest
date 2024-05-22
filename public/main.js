const savebtn = document.getElementById("save");
const switcher = document.getElementById('productType');

switcher.addEventListener("change", (e) => {
  let fulllist = ["dvd", "book", "furniture"];
  document.getElementById(e.target.value).classList.remove("hidden");

  let indexToRemove = fulllist.indexOf(e.target.value);
  if (indexToRemove > -1) {
    fulllist.splice(indexToRemove, 1);
  }

  fulllist.map((atr) => {
    document.getElementById(atr).classList.add("hidden");
    document.querySelector(`#${atr} input`).value = null;
    console.log(document.getElementById(atr).value);
  });

  document.querySelectorAll(`#${e.target.value} input`).forEach((input) => {
    input.disabled = false;
    input.required = true;
  })
});

savebtn.addEventListener("click", (e) => {
  document.querySelectorAll('.hidden input').forEach((input) => {
    input.disabled = true;
    input.required = false;
  });
});
