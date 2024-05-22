const skuInput = document.getElementById('sku');
const skuMessage = document.getElementById('sku-message');
const form = document.getElementById("product_form");


skuInput.addEventListener('input', function() {
  const sku = skuInput.value;
  validateSku(sku);
});







function validateSku(sku) {
    fetch('/sku', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'sku=' + encodeURIComponent(sku)
    })
    .then(function(response) {
      return response.text();
    })
    .then(function(responseText) {
        console.log(responseText);
      handleSkuValidation(responseText);
    })
    .catch(function(error) {
      console.error(error);
    });
  }

  form.addEventListener('submit', (e)=>{
    if (!skuMessage.classList.contains('hidden')){
        e.preventDefault();
    }
  })


  function handleSkuValidation(responseText) {
    if (responseText === 'false') {
      skuMessage.classList.add('hidden');
    } else {
      skuMessage.classList.remove('hidden');
    }
  }