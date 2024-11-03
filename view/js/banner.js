var imgtag = document.getElementById("img");
var imgarr = [
  "../view/img/0.jpg",
  "../view/img/1.jpg",
  "../view/img/2.jpg",
  "../view/img/3.jpg",
];
console.log(imgtag);
var i = 0;
function slider() {
  imgtag.src = imgarr[i];
  i++;
  if (i == imgarr.length) {
    i = 0;
  }
}
setInterval(slider, 3000);
var images = [];
for (let i = 0; i < 4; i++) {
  images[i] = new Image();
  images[i].src = "../view/img/" + i + ".jpg";
}
var index = 0;
function pre() {
  index--;
  if (index < 0) {
    index = images.length - 1;
  }
  var anh = document.getElementById("img");
  anh.src = images[index].src;
}
function next() {
  index++;
  if (index >= images.length) {
    index = 0;
  }
  var anh = document.getElementById("img");
  anh.src = images[index].src;
}
function error() {
  alert("Bạn có muốn xóa không?");
}
//bấm vào giỏ hàng

document.addEventListener("DOMContentLoaded", function () {
  const decreaseButtons = document.querySelectorAll(".quantity-decrease");
  const increaseButtons = document.querySelectorAll(".quantity-increase");
  const quantityInputs = document.querySelectorAll(".quantity-input");

  decreaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.nextElementSibling;
      let value = parseInt(input.value);
      if (value > 1) {
        value--;
        input.value = value;
      }
    });
  });

  increaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.previousElementSibling;
      let value = parseInt(input.value);
      value++;
      input.value = value;
    });
  });

  quantityInputs.forEach((input) => {
    input.addEventListener("change", function () {
      let value = parseInt(this.value);
      if (value < 1) {
        this.value = 1;
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const decreaseButtons = document.querySelectorAll(".quantity-decrease");
  const increaseButtons = document.querySelectorAll(".quantity-increase");
  const quantityInputs = document.querySelectorAll(".quantity-input");

  function updateTotalPrice(row) {
    const priceElement = row.querySelector(".price");
    const totalPriceElement = row.querySelector(".total-price");
    const quantityInput = row.querySelector(".quantity-input");

    const price = parseInt(priceElement.textContent.replace(" VNĐ", ""));
    const quantity = parseInt(quantityInput.value);
    const totalPrice = price * quantity;
    totalPriceElement.textContent = totalPrice + " VNĐ";

    updateSubtotal();
  }

  function updateSubtotal() {
    let subtotal = 0;
    const totalPrices = document.querySelectorAll(".total-price");
    totalPrices.forEach((totalPriceElement) => {
      subtotal += parseInt(totalPriceElement.textContent.replace(" VNĐ", ""));
    });

    document.getElementById("subtotal").textContent = subtotal + " VNĐ";
    document.getElementById("total").textContent = subtotal + " VNĐ";
  }

  decreaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const row = button.closest("tr");
      const input = row.querySelector(".quantity-input");
      let value = parseInt(input.value);
      if (value > 1) {
        value--;
        input.value = value;
        updateTotalPrice(row);
      }
    });
  });

  increaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const row = button.closest("tr");
      const input = row.querySelector(".quantity-input");
      let value = parseInt(input.value);
      value++;
      input.value = value;
      updateTotalPrice(row);
    });
  });

  quantityInputs.forEach((input) => {
    input.addEventListener("change", function () {
      const row = input.closest("tr");
      let value = parseInt(input.value);
      if (value < 1) {
        input.value = 1;
      }
      updateTotalPrice(row);
    });
  });
});
