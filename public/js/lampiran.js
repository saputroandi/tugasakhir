$(document).ready(function() {

  $('.tambah-lampiran').click(function(){

    const newInputElement = `
      <li class="my-1">
        <input type="text" name="lampiran[]" class="input-lampiran w-full p-2 border-2 border-buatborder bg-buatbody rounded" placeholder="Masukan Nama Lampiran">
      </li>
    `;

    $(".list-decimal").append(newInputElement);
    
    $('.tambah-lampiran').preventDefault;

  });

});
