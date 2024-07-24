const total = document.querySelector(".total");
const quantityInput = document.querySelector(".quantity");
const priceInput = document.querySelector(".price-input");

total.innerText = "Total: " + priceInput.value + " ks";

quantityInput.addEventListener("change", (e) => {
  updateTotal(e.target.value);
});
function updateTotal(quantity) {
  const price = priceInput.value;
  totalPrice = price * quantity;
  total.innerText = "Total: " + totalPrice + " Ks";
}
