const button           = document.querySelector('.button-print');
const elementNamaOrder = document.querySelector('.namaOrder');
const namaOrder        = elementNamaOrder.innerHTML;
const element          = document.querySelector('.layout-surat');

let opt = {
  filename   : `${namaOrder}`,
  image      : { type: 'jpeg', quality: 0.98 },
  html2canvas: { scale: 1, logging: true, dpi: 192, letterRendering: true },
  jsPDF      : { unit: 'in', format: 'A4', orientation: 'portrait' }
};

button.addEventListener('click', function(){
  html2pdf(element, opt);

  setTimeout(()=>{
    location.reload();
  }, 2000);

});