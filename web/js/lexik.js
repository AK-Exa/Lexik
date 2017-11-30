$(document).ready(function () {
    $('#checkAll').on("click", function () {
        $('.sub_chk').not(this).prop('checked', this.checked);
    });

    $('#delAll').on('click', function(e) {
        e.preventDefault();
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length > 0)
        {
            if(confirm("Voulez-vous vraiment effacer ?")){
                var join_selected_values = allVals.join(",");
                $.ajax({
                    type: 'post',
                    url: 'app.php',
                    data: 'ids='+join_selected_values,
                    cache:false,
                    success: function(data){
                        console.log('ici: '+data);
                        alert('La suppression a été faite avec succès. ');
                        document.location.href="app.php";
                    },
                    error: function(data){
                        console.log("error: "+data);
                    }
                });
            }else{
                $('#checkAll').prop('checked',false);
                $('.sub_chk').prop('checked',false);
            }
        }

    });

    $("#search").keyup(function(){
        _this = this;
        $.each($("#luser tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });

    $('#annuleSearch').on("click", function(e){
        e.preventDefault();
        $("#search").val("");
        $("#luser tbody tr").show();
    });

    $('#nibble_form_date').mask('99/99/9999',{placeholder:"JJ/MM/AAAA"});
});