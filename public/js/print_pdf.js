const button = document.querySelector('.button-gw');
const element = document.querySelector('.layout-surat');

let opt = {
  filename:     'myfile.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
};

button.addEventListener('click', function(){
  html2pdf(element, opt);
});