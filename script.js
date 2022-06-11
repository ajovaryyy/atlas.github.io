$(document).ready(function () {

    $(".tujuan").on('change', '.provinsi', function () {

        // ajax request buat manggil kota dari provinsi yang dipilih

        let option = $(this).find('option:selected').val();

        let data = option.split('|');  // split id | nama provinsi to array [id , namaprov] 
        let namaprov = data.length > 1 ? data[1] : '';
        let idprov = data[0];

        $.ajax({
            type: "GET",
            url: "kota.php",
            dataType: "html",
            data: {
                'idprov': idprov,
                'namaprov': namaprov
            },
            success: response => update(response)

        });
    });



    $(".tujuan").on('change', '.kota', function () {

        // ajax request buat manggil kecamatan dari kota yang dipilih

        var option = $(this).find('option:selected').val();

        var data = option.split('|'); // split id | nama kota to array [id , namakota]

        let namakota = data.length > 1 ? data[1] : '';
        let idkota = data[0];

        $.ajax({
            type: "GET",
            url: "kecamatan.php",
            dataType: "html",
            data: {
                'idkota': idkota,
                'namakota': namakota
            },
            success: response => update(response)

        });
    });

    $(".tujuan").on('change', '.kecamatan', function () {

        // ajax request ketika membalikkan dari dropdown kecamatan ke dropdown kota

        var option = $(this).find('option:selected').val();

        var data = option.split('|'); // split id | nama kota to array [id , namakota]

        let namakecamatan = data.length > 1 ? data[1] : '';
        let idkecamatan = data[0];

        if (namakecamatan === '') {

            $.ajax({
                type: "GET",
                url: "kecamatan.php",
                dataType: "html",
                data: {
                    'idkecamatan': idkecamatan,
                    'namakecamatan': namakecamatan
                },
                success: response => update(response)

            });
        }
    });


    function update(data) {
        $(".tujuan").html(data);
    }

});






