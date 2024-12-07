const looping = (url,Sname, element) => {
    let elements = document.querySelectorAll(element);
    const checkStatus = ()=> {
        $.ajax({
            url: url, 
            type: 'GET',
            success: function(data) {
                const status = JSON.parse(data).status;
                
                elements.forEach(element => {
                    element.classList.remove('statusActive');
                });
                if (status === Sname) {
                    elements[0].classList.add('statusActive');
                } else if (status === Sname + "C") {
                    elements[1].classList.add('statusActive'); 
                } else if (status === Sname + "A") {
                    elements[2].classList.add('statusActive'); 
                }
            }
        });
    }
    const statusInterval = setInterval(checkStatus, 5000);  
};
looping('app/views/components/cekStatusPengajuan.php', 'PJ', '.ps');