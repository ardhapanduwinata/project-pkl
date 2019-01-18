<script type="text/javascript">
    $(document).ready(function(){
            var id= document.getElementById("idJurusan").value;
            tampilkan_nilai_form();
        function tampilkan_nilai_form(){
            var id= document.getElementById("idJurusan").value;
            $.ajax({
                url : '<?php echo base_url()."index.php/manageData/dropdown_divisi; "?>',
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].divisi+'</option>';
                    }
                    $('.divisi').html(html);
                },
                error: function(errorThrown){
                    alert(errorThrown);
                    alert("There is an error with AJAX!");
                }
            });
        }
    });
</script>