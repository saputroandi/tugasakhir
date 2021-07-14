const button           = document.querySelector('.button-print');
const elementNamaOrder = document.querySelector('.namaOrder');
const namaOrder        = elementNamaOrder.innerHTML;
const element          = document.querySelector('.layout-surat');

let opt = {
  filename   : `${namaOrder}`,
  // margin     : 1,
  image      : { type: 'jpeg', quality: 0.98 },
  html2canvas: { scale: 1, logging: true, dpi: 192, letterRendering: true },
  jsPDF      : { unit: 'in', format: 'a4', orientation: 'portrait' }
};

button.addEventListener('click', function(){
  // alert('ok');
  html2pdf(element, opt);
});