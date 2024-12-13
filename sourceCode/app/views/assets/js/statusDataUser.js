$(function () {
    const looping = (url, element, input) => {
        const inputs = $(input);
        const elements = document.querySelectorAll(element);

        inputs.each(function () {
            $(this).off().on('focusout', function () {
                const valueI = $(this).val();
                let matchFound = false; 
                let i = 0;
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (rows) {
                        $.each(rows, function (indexInArray, valueR) {
                            if (valueI !== '' && valueI == valueR.username) {
                                elements[0].classList.add('statusA');
                                matchFound = true; 
                            } else if (valueI !== '' && valueI == valueR.email) {
                                elements[1].classList.add('statusA');
                                matchFound = true;
                            }
                        });
                        let form = document.getElementById('fmRegis');
                        if (!matchFound) {
                            elements.forEach(element => {
                                element.classList.remove('statusA');
                            });
                            form.removeEventListener('submit', preventSubmit);
                        } else {
                            form.addEventListener('submit', preventSubmit);
                        }
                    },
                    error: function (err) {
                        console.error("Error saat mengambil data:", err);
                    }
                });
            });
        });
    };

    function preventSubmit(event) {
        event.preventDefault();
    }

    looping('app/views/components/checkUser.php', '.statusUser', '.inputCh');
});
