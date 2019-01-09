<script>
    $(document).ready(function() {
        var max_fields      = 5; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = '#add_field_button'; //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append(' <div> <div class="form-group row">\n' +
                    '                                    <label for="nim" class="col-4 col-form-label">NIM</label>\n' +
                    '                                    <div class="col-8"><input type="text" name="nim'+x+'" class="form-control here" placeholder="NIM Mahasiswa '+x+'"> </div>\n' +
                    '                                </div>\n' +
                    '                                <div class="form-group row">\n' +
                    '                                    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>\n' +
                    '                                    <div class="col-8"><input type="text" name="nama'+x+'" class="form-control here"  placeholder="Nama Lengkap Mahasiswa '+x+' "> </div>\n' +
                    '                                </div><button id="remove_field" class=" offset-10 col-2 btn btn-outline-danger">Hapus</button>\n' +
                    '                            <br><br></div>'); //add input box
            }else{
                alert('Maksimal hanya boleh 5 Mahasiswa');
            }
        });

        $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>