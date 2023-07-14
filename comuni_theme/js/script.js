$ = jQuery
jQuery("html").on("click", "a .contextual button.trigger", (e) => {
  e.stopPropagation()
  e.stopImmediatePropagation()
  e.preventDefault()
})

if(false){ // Primary color Easter Egg

  function calculateContrast(textColor, backgroundColor) {
    var textLuminance = calculateLuminance(textColor);
    var backgroundLuminance = calculateLuminance(backgroundColor);
    var contrast = (Math.max(textLuminance, backgroundLuminance) + 0.05) / (Math.min(textLuminance, backgroundLuminance) + 0.05);
    return contrast;
  }

  function calculateLuminance(color) {
    var normalizedColor = color.map(function(value) {
      var normalizedValue = value / 255;
      return normalizedValue <= 0.03928 ? normalizedValue / 12.92 : Math.pow((normalizedValue + 0.055) / 1.055, 2.4);
    });
    var luminance = 0.2126 * normalizedColor[0] + 0.7152 * normalizedColor[1] + 0.0722 * normalizedColor[2];
    return luminance;
  }

  // Esempio di utilizzo

  while(true){

    var textColor = [255, 255, 255]; // Bianco
    var backgroundColor = [
      Math.floor(Math.random() * 256), // Valore rosso casuale
      Math.floor(Math.random() * 256), // Valore verde casuale
      Math.floor(Math.random() * 256)  // Valore blu casuale
    ];
    var contrast = calculateContrast(textColor, backgroundColor);
    console.log('Contrasto:', contrast);

    // Verifica se il contrasto è maggiore o uguale a 4.5
    if (contrast >= 4.5) {
      document.documentElement.style.setProperty('--bs-primary-red', backgroundColor[0]);
      document.documentElement.style.setProperty('--bs-primary-green', backgroundColor[1]);
      document.documentElement.style.setProperty('--bs-primary-blue', backgroundColor[2]);

      jQuery(`
        <div class="alert alert-success alert-dismissible" role="alert" style="
          position: fixed;
          bottom: 0;
          right: 0;
          z-index: 99999;
          background: white;
          background-repeat: no-repeat;
          padding-right: 3rem;
        ">
          <button onclick="navigator.clipboard.writeText(this.innerHTML); alert('Hai copiato il JSON')">{ "Contrasto": "${Math.floor(contrast*10)/10} (accessibile)", "Rosso": "${backgroundColor[0]}", "Verde": "${backgroundColor[1]}", "Blu": "${backgroundColor[2]}" } </button>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      `).appendTo(jQuery("body"));

      jQuery(".notification").toggle()

      break;
    } else {
      console.log('Il contrasto non soddisfa il requisito.');
    }

  }
}



//Aggiunto link alla Task bar che manda ad una vista che esporta un nodo in CSV
$('.block-local-tasks-block nav ul').append('<li class="mx-0"><a href="/esportazione-download/'+$('.block-local-tasks-block a[href*="node/"][href*="/edit"]').attr('href').split("/")[2]+'" class="px-lg-3 me-lg-3">Esporta CSV</a></li>');


