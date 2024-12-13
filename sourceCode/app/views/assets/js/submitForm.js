$(function () {
    let form = $('#formPem');
    let btnNext = $('#btnPemNext');
    let btnSubmit = $('#btnSubmit');
    let requiredInputs = $('#formPem [required]');
    let allowSubmit = false;
  
    form.on('submit', function(event) {
        if (!allowSubmit) {
            event.preventDefault();
        }
    });
  
    btnNext.on('click', function() {
        let requredValid = true
  
        requiredInputs.each(function(){
            if(!this.checkValidity()){
                requredValid = false
            }
        });
        if(requredValid){
            $('.div3Jari').css({
                visibility: 'visible',
                opacity: 1,
            });
        }
        });
    btnSubmit.on('click', function() {
        allowSubmit = true; 
        form.submit(); 
    });
})