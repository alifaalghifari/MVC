$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html("Tambah Data Mahasiswa");
        $('.modal-footer button[type=submit]').html("Tambah");

        // set form
        $('#nama').val('');
        $('#NIM').val('');
        $('#kelas').val('')
    });

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html("Ubah Data Mahasiswa");
        $('.modal-footer button[type=submit]').html("Ubah");

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/MVC/public/mahasiswa/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#NIM').val(data.NIM);
                $('#kelas').val(data.kelas);
                $('#id').val(data.id)
            }
        });

        $('.modal-body form').attr('action', 'http://localhost/MVC/public/mahasiswa/ubah');
    });
})