<script>
    var table = $('#t_depreciation').DataTable({
        ajax: "{{ route('depreciations.index') }}",
        processing: true,
        serverSide: true,
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'name',name: 'name'},
            {data: 'cost',name: 'cost'},
            {data: 'periode',name: 'periode'},
            {data: 'category',name: 'category'},
            {data: 'asset_value',name: 'asset_value'},
            {data: 'action',name: 'action'},
        ],
    })

    // Memberikan attribute id pada form general
    function giveIdForm(type) {
        $('#m_depreciation form').attr('id', `f_${type}_depreciation`)
    }

    // Mengecek dan menambahkan input hidden
    function checkInputId(res = null) {
        if ($('#m_depreciation form input[name="id"]').length > 0) {
            $('#m_depreciation form input[name="id"]').remove()
        }

        if (res !== null) {
            $('#m_depreciation form').prepend(`<input type="hidden" name="id" value=${res.id}>`)
        }
    }

    function checkMethodPost(type = 'edit') {
        const postMethod = $('#m_depreciation form input[value="PATCH"]')

        if (postMethod.length > 0) {
            $('#m_depreciation form input[value="PATCH"]').remove()
        }

        if (type === 'edit') {
            $('#m_depreciation form').prepend('<input type="hidden" name="_method" value="PATCH">')
        }

    }

    // Menghapus pesan error
    function netralMsg() {
        var errTag = $('#m_depreciation .err')

        for (let i = 0; i < errTag.length; i++) {
            $(errTag[i]).find('span').text('')
        }
    }

    $('#m_depreciation form select[name="category"]').change(function(e) {
        let type = $(this).val()
        const categoryId = $('#m_depreciation form select#category_id');

        categoryId.attr('name', type + '_id')

        $.ajax({
            url: "{{ url('depreciations/type') }}/" + type,
            success: (res) => {
                category = type === 'asset' ? 'Aset' : 'Komponen';

                if (type !== '') {
                    $('#m_depreciation #category_id').html(res)
                    $('#m_depreciation #type_category').show()
                    $('#m_depreciation #labelCategory').html(category+'<span class="text-danger">*</span>')
                } else {
                    $('#m_depreciation #category_id').html('<option value=""></option>')
                }
            }
        })
    })

    /**
     * ==============================================
     * |---------------- ADD DATA ------------------|
     * ==============================================
     */
     function addDepreciation() {
        giveIdForm('add')
        $('#m_depreciation .modal-body .title').text('Tambah Depreciation')
        $("#f_add_depreciation select#category_id").removeAttr('disabled')
        $("#f_add_depreciation select#category_id").parent().hide()
        $('#m_depreciation #category').parent().show()

        $('#m_depreciation form')[0].reset() // Mengkosongkan form sebelum menambahkan data baru
        $('#m_depreciation').modal('show')
    } // ================= END =================


    /**
     * ==============================================
     * |---------------- UPDATE DATA ---------------|
     * ==============================================
     */
    function edit(id) {
        giveIdForm('edit')
        $('#m_depreciation .modal-body .title').text('Edit Karyawan')

        $.ajax({
            url: "{{ url('depreciations') }}/" + id + "/edit",
            success: (res) => {
                let depreciationable = res[0].depreciationable
                let type = res[0].depreciation_type;
                let category = type === 'App\Models\Asset' ? 'Aset' : 'Komponen';

                type = type === 'App\Models\Asset' ? 'asset_id' : 'component_id';

                console.log(res);
                checkInputId(res)
                checkMethodPost('edit')

                $('#depreciation_submit').text('Kirim Data')
                $('#m_depreciation').modal('show')

                $('#m_depreciation #category').parent().hide()
                // Select type category
                $('#m_depreciation #type_category').show()
                $("#f_edit_depreciation select#category_id").attr('name', type)
                $("#f_edit_depreciation select#category_id").attr('value', depreciationable.id)
                $("#f_edit_depreciation select#category_id").attr('disabled', '')
                $("#f_edit_depreciation select#category_id").html(`<option selected value=${depreciationable.id}>${depreciationable.name}</option>`)
                $("#f_edit_depreciation #labelCategory").html(category + '<span class="text-danger">*</span>')
                // end select type category

                $("#f_edit_depreciation input[name='id']").val(res[0].id)
                $("#f_edit_depreciation input[name='periode']").val(res[0].periode)
                $("#f_edit_depreciation input[name='asset_value']").val(res[0].asset_value)
            }
        })
    }
    // ============ END ==============

    /**
     * ==============================================
     * |---------------- DELETE DATA ---------------|
     * ==============================================
     */
    function remove(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda yakin akan menghapus?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: `Tidak`,
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: "{{ url('depreciations') }}/" + id,
                    success: (res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            timer: 2000
                        })

                        table.ajax.reload()
                    }
                })

            }
        })
    } // ============== END ===============


    /**
     * ==============================================
     * |----------- PROSES MEMASUKKAN DATA ---------|
     * ==============================================
     */

    // Menghapus input id jika formnya tambah
    // Menghapus input method post jika formnya tambah
    $('#m_depreciation').on('show.bs.modal', function(e) {
        netralMsg()
        var formAdd = $('#f_add_depreciation')

        if (formAdd.length > 0 ) {
            checkMethodPost('add')
            checkInputId()
        }
    })

    // Saat form disubmit
    $('#m_depreciation form').submit(function(e) {
        e.preventDefault()

        const form = $(this)
        const methodPatch = $(this).find('input[value="PATCH"]')

        let id = ""
        let method = "POST"
        let category_id = $('#category_id').val();

        if (methodPatch.length) {
            id = $('#f_edit_depreciation input[name="id"]').val();
            method = "PATCH"
            console.log();
        }

        let data = form.serialize()
            data += `&category_id=${category_id}`

        // Proses pengiriman data ke server
        $.ajax({
            data,
            method,
            url: "{{ url('depreciations') }}/" + id,
            success: (res) => {
                $('#m_depreciation').modal('hide')
                table.ajax.reload()
                form[0].reset()
            },
            error: (err) => {
                const error = err.responseJSON.errors
                const keys = Object.keys(err.responseJSON.errors);

                for (const i in keys) {
                    let msg = error[keys[i]]

                    $(`#m_depreciation form .err_${keys[i]} span`).text(msg[0])
                }
            }
        })
    })

</script>
