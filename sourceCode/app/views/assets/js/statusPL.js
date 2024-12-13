$(function () {
    const looping = (url) => {
        const checkStatus = () => {
            const alertShown = localStorage.getItem('alertShown');
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    const status = JSON.parse(data).status;
                    if (status === 'PLA' && alertShown !== 'true') {
                        localStorage.setItem('alertShown', 'true')
                        alertSuksessH(
                            'Selamat!',
                            'Laporan anda sudah ditanggapi oleh admin dan kesalahan pada data anda sudah diperbaiki.',
                            'index.php?action=hasil'
                        );
                    } else if (status === 'PL') {
                        localStorage.setItem('alertShown', 'false');
                    }
                },
                error: function () {
                    console.log('Kesalahan saat mengambil data');
                }
            });
        };
        setInterval(checkStatus, 1000);
    };

    looping('app/views/components/checkLaporan.php');
});
